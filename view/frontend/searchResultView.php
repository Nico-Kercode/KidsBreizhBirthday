<?php $title = "Login"; ?>

<?php ob_start(); ?>


<div class="container">
    <div class="row">
        <div class="col-sm-12 my-2 result">
            <h1 class="text-center my-4"> <em>Resultat de votre recherche :</em></h1>
            <?php
            // foreach va recuperer toutes le contenu du tableau $comments -> controller
foreach ($result as $liste)

{

    ?>
            <div class="col-sm-12 d-flex my-2 bg-info result ">
                <div class="col-lg-2">
                    <img class=" img-fluid logoA" src="<?= htmlspecialchars($liste['logo']) ?>" alt="Logo">
                </div>

                <div class="col-lg-8 offset-lg-2 p-4">

                    <h4 class="articles"> <a
                            href="index.php?action=annonce&id=<?= $liste['id'] ?>"><?= htmlspecialchars($liste['titre']) ?>
                            </strong></a> </h4>

                    <p>
                        <strong>Contact :  <?= htmlspecialchars($liste['contact']) ?></strong>
                    </p>

                </div>




            </div>



            <?php
    }

?>


        </div>
    </div>

</div>





<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>