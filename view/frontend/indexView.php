<?php $title = "Kid's Breizh Birthday"; ?>

<?php ob_start(); ?>



<div class="container">
    <div class="row">
        <div class=" d-sm-none d-md-block col-lg-10 " id="anim">
            <div class="text"></div>
        </div>
    </div>
</div>


<div class="container" id="indexView">
    <div class="row">
        <div class="col-sm-12 col-lg-10 offset-lg-2 " id="accueil">
            <div class="d-flex mx-auto">
                <img class="img-fluid" src="assets\img\artworkIMG\logoGateau.png" alt="logo Gateaux">
                <h1 id="degemer">Kid's Breizh birthday</h1>
            </div>

            <p id="texteAccueil"> <span class="tabulation">Nous</span> avons regroupé pour vous tous les professionnels
                du
                Morbihan
                qui proposent des presations, afin que votre enfant puisse passer une journée d'anniversaire
                inoubliable.
                Parc, restaurant, circuit de karting, piscine ou cinéma ... <br>

                Il existe une multitude d'endroits qui propose ce genre de service ...


            </p>

        </div>

    </div><!-- row -->

    <!-- <a href="index.php?action=count" class=" article ml-4">
        il y a déja <span><?= $total ?> </span> annonces repertoriées
            dans notre base de donnée
    </a>
    </li> -->

</div> <!-- container -->



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>