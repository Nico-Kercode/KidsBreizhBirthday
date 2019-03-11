<?php $title = "Login"; ?>

<?php ob_start(); ?>


<div class="container">
    <div class="row">
        <div class="col-sm-12 my-2">
            <h1 class="text-center my-4"> <em>Resultat de votre recherche :</em></h1>
            <h5 class="text-center">
                
                <?php if ($result > 0) { 
                echo  'il y a    '.count($result).' resultat(s) correspondant(s) àvotre recherche'; } 
                else { echo 'il n\'y a aucun resultat correspondant à votre recherche'; } ?> </h5>


            <?php
            // foreach va recuperer toutes le contenu du tableau $comments -> controller
foreach ($result as $liste)

{

    ?>
            <div class="col-sm-12 d-flex my-2 result ">
                <div class="col-lg-2">
                    <img class=" img-fluid " src="<?= htmlspecialchars($liste['logo']) ?>" alt="Logo">
                </div>

                <div class="col-lg-8 offset-lg-2 p-4">

                    <h4 >
                        <a href="index.php?action=annonce&id=<?= $liste['id'] ?>">
                            <?= htmlspecialchars($liste['titre']) ?>
                            </strong></a> </h4>

                    <p>
                        <strong>Contact : <?= htmlspecialchars($liste['contact']) ?></strong>
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