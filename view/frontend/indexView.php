<?php $title = "Accueil"; ?>
<?php ob_start(); ?>
<div class="container-fluid ">
    <div class="row ">
        <div class="col-lg-2 d-none d-lg-block ">
            <img class="img-fluid my-auto mx-4 " src="assets/img/artworkIMG/used/ballon3.png" alt="BallonRose">
        </div>
        <div class="col-lg-8">
            <div id="vhmin" class="my-4">
                <div class="col-sm-8 offset-sm-2" id="pacc">
                    <p id="texteAccueil" class="my-auto"> <span class="tabulation">Un</span> anniversaire à fêter ? <br>
                        Kid's Breizh Birthday à reférencé pour vous de nombreux lieux dans le Morbihan.<br>
                        Le site est toujours en developpement, donc soyez indulgents si vous trouvez quelques erreurs :)
                        <br>
                        Si vous souhaitez laisser un avis sur une des prestations que nous avons référencé ...
                        Enregistrez vous ! <br>
                        Vous êtes professionnel dans le Morbihan et vous souhaitez publier une annonce, enregistrez vous
                        ! <br>
                    </p>                
                </div>
            </div>         
        </div> <!-- end lg8 -->
        <div class="col-lg-2 d-none d-lg-block  my-auto ">
            <img class="img-fluid " src="assets/img/artworkIMG/cadeauJaune.png" alt="cadeauJaune">
        </div>
        <!-- row -->
    </div>
    <div class="row">
        <div class="col-sm-12 mt-4" id="sliderAccueil">
            <ul id="slider" class="d-sm-none d-md-block">
                <li><img src="assets/img/artworkIMG/logos/kingoland.png" alt="kingoland" /></li>
                <li><img src="assets/img/artworkIMG/logos/jumpSession.png" alt="jumpsession" /></li>
                <li><img src="assets/img/artworkIMG/logos/laserkid.png" alt="laserkid" /></li>
                <li><img src="assets/img/artworkIMG/logos/minigolf.png" alt="minigolf" /></li>
                <li><img src="assets/img/artworkIMG/logos/yakapark.png" alt="yakapark" /></li>
                <li><img src="assets/img/artworkIMG/logos/logo-vannes.png" alt="logoVannes" /></li>
                <li><img src="assets/img/artworkIMG/logos/vincin.png" alt="vincin" /></li>
                <li><img src="assets/img/artworkIMG/logos/foretAdrenaline.png" alt="foret-adrenaline" /></li>
            </ul>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>