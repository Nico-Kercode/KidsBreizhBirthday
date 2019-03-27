<?php $title = 'Gestion Annonces publiées'; ?>
<?php ob_start(); ?>
<div class="container my-4 vue">

    <div class="row d-flex">

        <div class="col-sm-12 col-lg-4 my-4">
            <a class="btn btn-light btn-sm " href="index.php?action=vannes&page=1">RETOUR</a>

        </div>

        <?php foreach ($myAnnonces  as $data) : ?>

        <div  class="col-sm-10 offset-sm-1 selection border border-light" >
            
            <div class="col-sm-8" id="titreAnn">
                <a class="p-4" 
                    href="index.php?action=annonce&id=<?= $data['id'] ?>&id_MEMBRES=<?=$data['id_MEMBRES']?>">
                    <h2 class="text-center h2annonces">
                        <?= htmlspecialchars($data['titre']) ?>
                    </h2>
                </a>

                <a  class="btn btn-light btn-sm  "
                href="index.php?action=editerAnnonce&id_ANNONCES=<?= $data['id'] ?>&id_MEMBRES=<?=$data['id_MEMBRES']?>">Editer
            </a>
            <a class="btn btn-light btn-sm"
                href="index.php?action=supprAnnonce&id_ANNONCES=<?= $data['id'] ?>">Supprimer
            </a>

            </div>
            <div class="d-none d-sm-block ">
                <img class="img-fluid " src="<?= $data['logo'] ?>" alt="logo">
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>