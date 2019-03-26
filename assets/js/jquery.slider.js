(function ($) {

    $.fn.slider = function (options) {

        let defaults = $.extend({
            visibleItems: 6,
            itemsToScroll: 3,
            animationSpeed: 400,
            infinite: true,
            navigationTargetSelector: null,
            autoPlay: {
                enable: false,
                interval: 5000,
                pauseOnHover: true
            },
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1,
                    itemsToScroll: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2,
                    itemsToScroll: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 5,
                    itemsToScroll: 3
                }
            },
            loaded: function () { },
            before: function () { },
            after: function () { },
            resize: function () { }
        }, options);

        /******************************
        Private Variables
        *******************************/

        let object = $(this);
        let settings = $.extend(defaults, options);
        let itemsWidth;
        let canNavigate = true;
        let itemCount;
        let itemsVisible = settings.visibleItems;
        let itemsToScroll = settings.itemsToScroll;
        let responsivePoints = [];
        let resizeTimeout;
        let autoPlayInterval;

        /******************************
        Public Methods
        *******************************/

        let methods = {

            init: function () {
                return this.each(function () {
                    methods.appendHTML();
                    methods.setEventHandlers();
                    methods.initializeItems();
                });
            },

            /******************************
            Initialize Items
            *******************************/

            initializeItems: function () {

                let obj = settings.responsiveBreakpoints;
                for (let i in obj) { responsivePoints.push(obj[i]); }
                responsivePoints.sort(function (a, b) { return a.changePoint - b.changePoint; });
                let childSet = object.children();
                childSet.first().addClass("index");
                itemsWidth = methods.getCurrentItemWidth();
                itemCount = childSet.length;
                childSet.width(itemsWidth);
                if (settings.infinite) {
                    methods.offsetItemsToBeginning(Math.floor(childSet.length / 2));
                    object.css({
                        'left': -itemsWidth * Math.floor(childSet.length / 2)
                    });
                }
                $(window).trigger('resize');
                object.fadeIn();
                settings.loaded.call(this, object);

            },

            /******************************
            Append HTML
            *******************************/

            appendHTML: function () {

                object.addClass("nbs-slider-ul");
                object.wrap("<div class='nbs-slider-container'><div class='nbs-slider-inner'></div></div>");
                object.find("li").addClass("nbs-slider-item");

                if (settings.navigationTargetSelector && $(settings.navigationTargetSelector).length > 0) {
                    $("<div class='nbs-slider-nav-left'></div><div class='nbs-slider-nav-right'></div>").appendTo(settings.navigationTargetSelector);
                } else {
                    settings.navigationTargetSelector = object.parent();
                    $("<div class='nbs-slider-nav-left'></div><div class='nbs-slider-nav-right'></div>").insertAfter(object);
                }

                if (settings.infinite) {
                    let childSet = object.children();
                    let cloneContentBefore = childSet.clone();
                    let cloneContentAfter = childSet.clone();
                    object.prepend(cloneContentBefore);
                    object.append(cloneContentAfter);
                }

            },


            /******************************
            Set Event Handlers
            *******************************/
            setEventHandlers: function () {
                let self = this;
                let childSet = object.children();

                $(window).on("resize", function (event) {
                    canNavigate = false;
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(function () {
                        canNavigate = true;
                        methods.calculateDisplay();
                        itemsWidth = methods.getCurrentItemWidth();
                        childSet.width(itemsWidth);

                        if (settings.infinite) {
                            object.css({
                                'left': -itemsWidth * Math.floor(childSet.length / 2)
                            });
                        } else {
                            methods.clearDisabled();
                            $(settings.navigationTargetSelector).find(".nbs-slider-nav-left").addClass('disabled');
                            object.css({
                                'left': 0
                            });
                        }

                        settings.resize.call(self, object);

                    }, 100);

                });

                $(settings.navigationTargetSelector).find(".nbs-slider-nav-left").on("click", function (event) {
                    methods.scroll(true);
                });

                $(settings.navigationTargetSelector).find(".nbs-slider-nav-right").on("click", function (event) {
                    methods.scroll(false);
                });

                if (settings.autoPlay.enable) {

                    methods.setAutoplayInterval();

                    if (settings.autoPlay.pauseOnHover === true) {
                        object.on({
                            mouseenter: function () {
                                canNavigate = false;
                            },
                            mouseleave: function () {
                                canNavigate = true;
                            }
                        });
                    }

                }

                object[0].addEventListener('touchstart', methods.touchHandler.handleTouchStart, false);
                object[0].addEventListener('touchmove', methods.touchHandler.handleTouchMove, false);

            },

            /******************************
            Calculate Display
            *******************************/

            calculateDisplay: function () {
                let contentWidth = $('html').width();
                let largestCustom = responsivePoints[responsivePoints.length - 1].changePoint; // sorted array 

                for (let i in responsivePoints) {

                    if (contentWidth >= largestCustom) { // set to default if width greater than largest custom responsiveBreakpoint 
                        itemsVisible = settings.visibleItems;
                        itemsToScroll = settings.itemsToScroll;
                        break;
                    }
                    else { // determine custom responsiveBreakpoint to use

                        if (contentWidth < responsivePoints[i].changePoint) {
                            itemsVisible = responsivePoints[i].visibleItems;
                            itemsToScroll = responsivePoints[i].itemsToScroll;
                            break;
                        }
                        else {
                            continue;
                        }
                    }
                }

            },

            /******************************
            Scroll
            *******************************/

            scroll: function (reverse) {

                if (typeof reverse === 'undefined') { reverse = true }

                if (canNavigate == true) {
                    canNavigate = false;
                    settings.before.call(this, object);
                    itemsWidth = methods.getCurrentItemWidth();

                    if (settings.autoPlay.enable) {
                        clearInterval(autoPlayInterval);
                    }

                    if (!settings.infinite) {

                        let scrollDistance = itemsWidth * itemsToScroll;

                        if (reverse) {
                            object.animate({
                                'left': methods.calculateNonInfiniteLeftScroll(scrollDistance)
                            }, settings.animationSpeed, function () {
                                settings.after.call(this, object);
                                canNavigate = true;
                            });

                        } else {
                            object.animate({
                                'left': methods.calculateNonInfiniteRightScroll(scrollDistance)
                            }, settings.animationSpeed, function () {
                                settings.after.call(this, object);
                                canNavigate = true;
                            });
                        }



                    } else {
                        object.animate({
                            'left': reverse ? "+=" + itemsWidth * itemsToScroll : "-=" + itemsWidth * itemsToScroll
                        }, settings.animationSpeed, function () {
                            settings.after.call(this, object);
                            canNavigate = true;

                            if (reverse) {
                                methods.offsetItemsToBeginning(itemsToScroll);
                            } else {
                                methods.offsetItemsToEnd(itemsToScroll);
                            }
                            methods.offsetSliderPosition(reverse);

                        });
                    }

                    if (settings.autoPlay.enable) {
                        methods.setAutoplayInterval();
                    }

                }
            },

            touchHandler: {

                xDown: null,
                yDown: null,
                handleTouchStart: function (evt) {
                    this.xDown = evt.touches[0].clientX;
                    this.yDown = evt.touches[0].clientY;
                },
                handleTouchMove: function (evt) {
                    if (!this.xDown || !this.yDown) {
                        return;
                    }

                    let xUp = evt.touches[0].clientX;
                    let yUp = evt.touches[0].clientY;

                    let xDiff = this.xDown - xUp;
                    let yDiff = this.yDown - yUp;

                    // only comparing xDiff
                    // compare which is greater against yDiff to determine whether left/right or up/down  e.g. if (Math.abs( xDiff ) > Math.abs( yDiff ))
                    if (Math.abs(xDiff) > 0) {
                        if (xDiff > 0) {
                            // swipe left
                            methods.scroll(false);
                        } else {
                            //swipe right
                            methods.scroll(true);
                        }
                    }

                    /* reset values */
                    this.xDown = null;
                    this.yDown = null;
                    canNavigate = true;
                }
            },

            /******************************
            Utility Functions
            *******************************/

            getCurrentItemWidth: function () {
                return (object.parent().width()) / itemsVisible;
            },

            offsetItemsToBeginning: function (number) {
                if (typeof number === 'undefined') { number = 1 }
                for (let i = 0; i < number; i++) {
                    object.children().last().insertBefore(object.children().first());
                }
            },

            offsetItemsToEnd: function (number) {
                if (typeof number === 'undefined') { number = 1 }
                for (let i = 0; i < number; i++) {
                    object.children().first().insertAfter(object.children().last());
                }
            },

            offsetSliderPosition: function (reverse) {
                let left = parseInt(object.css('left').replace('px', ''));
                if (reverse) {
                    left = left - itemsWidth * itemsToScroll;
                } else {
                    left = left + itemsWidth * itemsToScroll;
                }
                object.css({
                    'left': left
                });
            },

            getOffsetPosition: function () {
                return parseInt(object.css('left').replace('px', ''));
            },

            calculateNonInfiniteLeftScroll: function (toScroll) {

                methods.clearDisabled();
                if (methods.getOffsetPosition() + toScroll >= 0) {
                    $(settings.navigationTargetSelector).find(".nbs-slider-nav-left").addClass('disabled');
                    return 0;
                } else {
                    return methods.getOffsetPosition() + toScroll;
                }
            },

            calculateNonInfiniteRightScroll: function (toScroll) {

                methods.clearDisabled();
                let negativeOffsetLimit = (itemCount * itemsWidth) - (itemsVisible * itemsWidth);

                if (methods.getOffsetPosition() - toScroll <= -negativeOffsetLimit) {
                    $(settings.navigationTargetSelector).find(".nbs-slider-nav-right").addClass('disabled');
                    return -negativeOffsetLimit;
                } else {
                    return methods.getOffsetPosition() - toScroll;
                }
            },

            setAutoplayInterval: function () {
                autoPlayInterval = setInterval(function () {
                    if (canNavigate) {
                        methods.scroll(false);
                    }
                }, settings.autoPlay.interval);
            },

            clearDisabled: function () {
                let parent = $(settings.navigationTargetSelector);
                parent.find(".nbs-slider-nav-left").removeClass('disabled');
                parent.find(".nbs-slider-nav-right").removeClass('disabled');
            }

        };

        if (methods[options]) {     // $("#element").pluginName('methodName', 'arg1', 'arg2');
            return methods[options].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof options === 'object' || !options) {     // $("#element").pluginName({ option: 1, option:2 });
            return methods.init.apply(this);
        } else {
            $.error('Method "' + method + '" does not exist in slider plugin!');
        }
    };

})(jQuery);


$(function() {
    $(window).load(function() {
       
        $("#slider").slider({
            visibleItems: 7,
            itemsToScroll: 1,         
            autoPlay: {
                enable: true,
                interval: 1500,
                pauseOnHover: true,

            }        
        });
      
        
    });
    });
  
  