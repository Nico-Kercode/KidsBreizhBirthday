<?php $title = 'Panier'; ?>
<?php ob_start(); ?>





<div class="container-fluid mb-4 vueAnnonce">

    <div class="row ">
        <div class="col-md-4">

            <div class="col-sm-4 col-lg-2 my-4">
                <a class="btn btn-light" href="index.php?action=home">RETOUR</a>

            </div>
        </div>
        <div class="col-md-4">
            <h1 class="text-center my-auto h1annonces">MA <span>S</span>ELECTION</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-3 ">
            <?php      
        foreach ($getSelection as $data) : ?>

<div  class="col-sm-9 selection border border-light" >
                <a id="supBtn" class="btn btn-light my-2"
                    href="index.php?action=viderSelection&id_MEMBRES=<?=$id_MEMBRES?>&id_ANNONCES=<?= $data['id_ANNONCES'] ?>">supprimer
                </a>
                <div class="col-sm-12 titreAnnonce">
                    <a class=" p-4 "
                        href="index.php?action=annonce&id=<?= $data['id_ANNONCES'] ?>&id_MEMBRES=<?= $data['id_MEMBRES']?>">
                        <h3 class="text-center h3annonce">
                            <?= htmlspecialchars($data['titre']) ?>
                        </h3>
                    </a>

                </div>

            </div>

            <?php endforeach;?>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>