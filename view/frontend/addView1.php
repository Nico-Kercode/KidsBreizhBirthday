<?php $title = 'Vannes'; ?>
<?php ob_start(); ?>




<h1 class="text-center my-4 h1annonces"> <span>V</span>ANNES</h1>








<?php
while ($data = $annonces->fetch())
{
?>


<div class="container">




    <div class="col-sm-12" id="mainAnnonces">
        <!-- boucle affichage des annonces -->
        <div class=" row " id="annonceHaut">

            <div class="col-sm-12 col-lg-4 " >

                <img class="img-fluid logoA" src="<?= $data['logo']?>" alt="logo">
            </div>

            <div class="col-sm-12 col-lg-8 titreAnnonce">
                <h2 class="font-weight-bold ">
                    <?= htmlspecialchars($data['titre']) ?>
                </h2>

            </div>
        </div>

        <div class="row my-4">

            <div class="offset-lg-2 overflow">

                <img class="img-fluid  img-thumbnail" src="<?= $data['photo1']?>" alt="Photo1">

            </div>

        </div>

        <div class=" row ">


            <form class="form-control p-1" id="plusdinfos" role="form" method="POST"
                action="index.php?action=annonce&id=<?= $data['id'] ?>&id_MEMBRES=<?= $data['id_MEMBRES']?>">
                <button id="comBtn" name="comm">Plus d'infos ...</button>

            </form>

        </div>

    </div>


</div>

<?php
}  
?>




<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>