<?php $title = "Kid's Breizh Birthday"; ?>

<?php ob_start(); ?>

<?php include('view\elements\nav.php');?>

<div class="container">
    <div class="row">


        <div class=" d-sm-none d-md-block col-lg-10 " id="anim" >
            <div class="text"></div>

        </div>

    </div>

</div>


<div class="container" id="indexView">
    <div class="row">
        <div id="accueil">
            <h1 class="my-4" id="degemer">Kid's Breizh birthday</h1>


            <p id="texteAccueil"> <span class="tabulation">Nous</span> avons regroupé pour vous tous les professionnels
                du
                Morbihan
                qui proposent des presations, afin que votre enfant puisse passer une journée d'anniversaire
                inoubliable.
                Parc, restaurant, circuit de karting, piscine ou cinéma ... <br>
                <span class="tabulation">Il</span> existe une multitude d'endroits qui propose ce genre de service ...

            </p>

        </div>
    </div>
</div>





























<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>