<?php $title = 'Panier'; ?>
<?php ob_start(); ?>


<div class="container-fluid mb-4">
    
<h1 class="text-center my-4 h1annonces">MA  <span>S</span>ELECTION</h1>
    <div class="row d-flex">


        <div class="col-sm-12 col-lg-4 my-4">
            <a class="Back" href="index.php?action=vannes&page=1">RETOUR</a>

        </div>
        <div class="col-sm-8 offset-sm-2">
            <?php
       
foreach ($getSelection as $data) { ?>

            <div class="col-sm-12 border border-secondary"">
                <!-- boucle affichage des annonces -->
                <div class="row" ">

                    <div class="col-xs-8 col-sm-8 col-lg-8 ">

                        <a class=" text-left  p-4 w-75"
                            href="index.php?action=annonce&id=<?= $data['id_ANNONCES'] ?>&id_MEMBRES=<?= $data['id_MEMBRES']?>">
                            <h2 class=" p-2 text-center ">
                                <?= htmlspecialchars($data['titre']) ?>

                                <a class="btn btn-info  " href="index.php?action=viderSelection&id_MEMBRES=<?=$id_MEMBRES?>&id_ANNONCES=<?= $data['id_ANNONCES'] ?>">supprimer
                            </a>
                            </h2>
                        </a>

                    </div>
                    <div class="d-none d-sm-block col-sm-4 col-lg-4  p-4 ">

                        
                        
                    </div>
                </div>


            </div>




            <!-- END FOREACH -->
            <?php
}
?>

        </div>
    </div>
</div>










<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>