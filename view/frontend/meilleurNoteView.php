<?php $title = 'Vannes'; ?>
<?php ob_start(); ?>




<h1 class="text-center my-4 h1annonces"> <span>L</span>es mieux notés</h1>





<div class="container" id="best">
    <div class="row">

        <?php
foreach ($bestAnnonces as $data) { ?>

        <div class="col-sm-5 offset-sm-1 mainAnnonces">
            <!-- boucle affichage des annonces -->
            <div class="row annonceHaut" >


                <div class="col-xs-8 text-center">
                    Recommandé par : <?=$data['nbrlike'] ?>  personne(s)

                </div> 
                
                <div class="col-xs-8 col-sm-8 col-lg-8 titreAnnonce">
                    <a class=" text-left  p-4 w-75"
                        href="index.php?action=annonce&id=<?= $data['id_ANNONCES'] ?>&id_MEMBRES=<?= $data['id_MEMBRES']?>">
                        <h2 class="text-center h2annonces">
                            <?= htmlspecialchars($data['titre']) ?>
                        </h2>
                    </a>

                </div>
                <div class="d-none d-sm-block col-sm-4 col-lg-4 ">

                    <img class="img-fluid " src="<?= $data['logo']?>" alt="logo">
                </div>
            </div>
            <!--  -->

            <div class="row my-4">

                <div class="mx-auto ">

                    <img class="img-fluid  img-thumbnail" src="<?= $data['photo1']?>" alt="Photo1">

                </div>
            </div>
        </div>


        <!-- END FOREACH -->
        <?php
}
?>
    </div>
</div>
<!--  -->
<div class="baspost">


</div>


<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>