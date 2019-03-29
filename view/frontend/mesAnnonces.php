<?php $title = 'Gestion Annonces publiées'; ?>
<?php ob_start(); ?>
<div class="container my-4 vue">
    <div class="row d-flex">
        <div class="col-sm-12 col-lg-4 my-4">
            <a class="btn btn-light btn-sm " href="index.php?action=vannes&page=1">RETOUR</a>
        </div>
        <?php foreach ($myAnnonces  as $data) : ?>
        <div class="col-sm-10 offset-sm-1 selection border border-light">
            <div class="col-sm-8 ">
                <div class="col-sm-6 offset-sm-6">
                    <a class="p-4 "
                        href="index.php?action=annonce&id=<?= $data['id'] ?>&id_MEMBRES=<?=$data['id_MEMBRES']?>">
                        <h3 class="text-center h3annonce ">
                            <?= htmlspecialchars($data['titre']) ?>
                        </h3>
                    </a>
                </div>
                <a class="btn btn-warning btn-sm  "
                    href="index.php?action=editerAnnonce&id_ANNONCES=<?= $data['id'] ?>&id_MEMBRES=<?=$data['id_MEMBRES']?>">Editer
                </a>

                <button type="button" class="btn btn-danger btn-sm text-light" data-toggle="modal"
                    data-target="#suppressionAnnonceModal">
                    Supprimer
                </button>

                <!-- Modal -->
                <div class="modal fade" id="suppressionAnnonceModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Etes vous sur de vouloir
                                    supprimer votre annonce ? </h5>


                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <a class="btn btn-danger btn-sm text-light"
                                    href="index.php?action=supprAnnonce&id_ANNONCES=<?= $data['id'] ?>">OUI SUPPRIMER
                                </a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">NON RETOUR
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>