<?php $title = 'Vannes'; ?>
<?php ob_start(); ?>
<?php include('view\elements\nav.php')?>


<div class="container">

<a href="index.php?action=vannes">Retour aux annonces</a>

    <div class="col-sm-12" id="mainAnnonces">

        <div class=" row d-flex" id="annonceHaut">

            <div class="col-sm-12 col-lg-4 ">

                <img class="img-fluid logoA"  src="<?= $annonce['logo']?>" alt="logo">

            </div>

            <div class="col-sm-12 col-lg-8 titreAnnonce">
                <h2 class="font-weight-bold" >
                    <?= htmlspecialchars($annonce['titre']) ?>
                </h2>
                <p> <em>  publié par <span> <?= ucfirst(htmlspecialchars($annonce['pseudo'])) ?> </span> </em> </p>
              

            </div>
        </div>

        <div class="row my-4">

            <div class="offset-lg-2">

                <img class="img-fluid photosadd" src="<?= $annonce['photo1']?>" alt="Photo1">

            </div>

        </div>

        <div class="row">

            <p class="p-4 text-center" id="annonceContent">
                <?= nl2br(ucfirst(htmlspecialchars($annonce['contenu']))) ?>
            </p>


        </div>

    </div>


</div> <!-- annonces -->


<?php
// }  
?>

















<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>