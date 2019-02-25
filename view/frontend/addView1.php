<?php $title = 'Vannes'; ?>
<?php ob_start(); ?>
<?php include('view\elements\nav.php')?>



<h1 class="text-center my-4">VANNES</h1>


<?php
while ($data = $annonces->fetch())
{
?>


<div class="container">


    <div class="col-sm-12" id="mainAnnonces">

        <!-- <a class="down scroll" href="#"> <img src="assets\images\bas.png" alt="bas" width="30px"> Bas de page </a> -->

        <!-- boucle affichage des annonces -->

        <div class=" row d-flex" id="annonceHaut">

            <div class="col-sm-12 col-lg-4 ">

                <img class="img-fluid" id="logoA" src="<?= $data['logo']?>" alt="logo">
            </div>

            <div class="col-sm-12 col-lg-8" id="titreAnnonce">
                <h2 class="font-weight-bold">
                    <?= htmlspecialchars($data['titre']) ?>
                </h2>

            </div>
        </div>

        <div class="row my-4">

            <div class="offset-lg-2">

                <img class="img-fluid photosadd" src="<?= $data['photo1']?>" alt="Photo1">

            </div>

        </div>



        <div class=" row ">

            <a class="my-2" id="plusdinfos" href="#">Plus d'infos ... </a>


                <!-- <p class="p-4 text-center">
                    <?= nl2br(htmlspecialchars($data['contenu'])) ?>
                </p> -->


        </div>




    </div>











</div> <!-- annonces -->



</div> <!--  CONTAINER -->

<?php
}  
?>


























<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>