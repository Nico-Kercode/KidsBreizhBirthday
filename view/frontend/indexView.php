<?php $title = "Kid's Breizh Birthday"; ?>

<?php ob_start(); ?>



<div class="container">
    <!-- <div class="row">
        <div class="d-flex mx-auto" id="choixAccueil">
            <a class="ml-4" href="index.php?action=vannes&page=1">Secteur de Vannes</a>
            <a class="ml-4" href="index.php?action=lorient&page=1">Secteur de Lorient</a>
            <a class="ml-4" href="index.php?action=lorient&page=1">Les mieux notés</a>
        </div>
    </div> -->
    <div class="row">
        <div class="mx-auto" id="gateau">
            <img class="img-fluid" src="assets\img\artworkIMG\logoGateau.png" alt="">
        </div>


        <div class=" d-sm-none d-md-block col-lg-10 " id="anim">
            <div class="text"></div>
        </div>
    </div>
    <div class="row">
        <div id="indexView">

            <div class="col-sm-12 col-lg-10 offset-lg-2 " id="accueil">


                <p id="texteAccueil"> <span class="tabulation">Nous</span> avons regroupé pour vous tous les
                    professionnels
                    du
                    Morbihan
                    qui proposent des presations, afin que votre enfant puisse passer une journée d'anniversaire
                    inoubliable.
                    Parc, restaurant, circuit de karting, piscine ou cinéma ... <br>

                    Il existe une multitude d'endroits qui propose ce genre de service ...


                </p>

            </div>

        </div><!-- row -->


    </div> 

</div><!-- container -->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>