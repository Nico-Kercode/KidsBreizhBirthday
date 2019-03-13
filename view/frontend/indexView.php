<?php $title = "Kid's Breizh Birthday"; ?>

<?php ob_start(); ?>



<div class="container-fluid ">

    <div class="row d-flex" id="accueil">


        <?php include('view\frontend\meteo.php')?>

        <div class="col-lg-2 d-none d-lg-block ">

            <img class="img-fluid my-auto mx-4 " src="assets\img\artworkIMG\used\ballon3.png" alt="BallonRose">
        </div>

        <div class="col-lg-8">

            <div class="d-sm-none d-md-block" id="anim">
                <div class="text"></div>
            </div>


            <div id="indexView">

                <div class="col-sm-12 col-lg-10 mx-auto " id="accueil">


                    <p id="texteAccueil" class="my-auto"> <span class="tabulation">Nous</span> Lorem ipsum dolor sit
                        amet,
                        consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien.
                        Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a,
                        pharetra eu eros. Etiam facilisis placerat euismod.
                        Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices
                        ligula.
                        Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris,
                        tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet
                        hendrerit.
                        Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi.
                        Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis
                        sed.

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

<div class="row">

    <div class="container-fluid" id="sliderAccueil">

        <ul id="slider">
            <li><img src="assets\img\artworkIMG\logos\kingoland.png" /></li>
            <li><img src="assets\img\artworkIMG\logos\jumpSession.png" /></li>
            <li><img src="assets\img\artworkIMG\logos\laserkid.png" /></li>
            <li><img src="assets\img\artworkIMG\logos\minigolf.png" /></li>
            <li><img src="assets\img\artworkIMG\logos\yakapark.png" /></li>
            <li><img src="assets\img\artworkIMG\logos\logo-vannes.png" /></li>
            <li><img src="assets\img\artworkIMG\logos\vincin.png" /></li>
            <li><img src="assets\img\artworkIMG\logos\foretAdrenaline.png" /></li>
        </ul>


    </div>

</div>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>