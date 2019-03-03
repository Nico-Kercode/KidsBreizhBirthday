// ALERT //
$('.js-dislike-comment').one('click', function(e) {        
    let span = $(e.currentTarget);        
    let url = "index.php?action=alert&id=" + span.attr('id');

    $.getJSON(url)
    .done((data)=>{
        if(data.alerts === 'ok') {
            span.toggleClass('far fa-bell').toggleClass('fas fa-bell');
        } else {
            console.log(data.alerts);
        }           
    });
});

// LIKE //

$('.js-like-annonce').one('click', function(e) {        
    let span = $(e.currentTarget);        
    let url = "index.php?action=like&id=" + span.attr('id');

    $.getJSON(url)
    .done((data)=>{
        if(data.likes === 'ok') {
            span.toggleClass('far fa-thumbs-up').toggleClass('fas fa-thumbs-up');
        } else {
            console.log(data.likes);
        }           
    });
});

// !LIKE //

$('.js-dontlike-annonce').one('click', function(e) {        
    let span = $(e.currentTarget);        
    let url = "index.php?action=dontlike&id=" + span.attr('id');

    $.getJSON(url)
    .done((data)=>{
        if(data.dontlike === 'ok') {
            span.toggleClass('far fa-thumbs-down').toggleClass('fas fa-thumbs-down');
        } else {
            console.log(data.dontlike);
        }           
    });
});





