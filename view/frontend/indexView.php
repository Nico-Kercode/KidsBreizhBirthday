<?php $title = "Kid's Breizh Birthday"; ?>

<?php ob_start(); ?>



<div class="container-fluid">

    <div class="row d-flex">

        <div class="col-lg-2 d-none d-lg-block  ">

            <img class="img-fluid my-auto mx-4 " src="assets\img\artworkIMG\used\ballon3.png" alt="BallonRose">
        </div>

        <div class="col-lg-8">

            <div class="d-sm-none d-md-block" id="anim">
                <div class="text"></div>
            </div>


            <div id="indexView">

                <div class="col-sm-12 col-lg-10 mx-auto " id="accueil">


                    <p id="texteAccueil" class="my-auto"> <span class="tabulation">Nous</span> avons regroupé pour vous
                        tous les
                        professionnels
                        du
                        Morbihan
                        qui proposent des presations, afin que votre enfant puisse passer une journée d'anniversaire
                        inoubliable.
                        Parc, restaurant, circuit de karting, piscine ou cinéma ... <br>

                        Il existe une multitude d'endroits qui propose ce genre de service ...
                    </p>


                </div>

            </div>

        </div> <!-- end lg8 -->

        <div class="col-lg-2 d-none d-lg-block  my-auto ">
            <img class="img-fluid " src="assets\img\artworkIMG\cadeauJaune.png" alt="cadeauJaune">
        </div>


        <!-- row -->


    </div>

</div><!-- container -->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>