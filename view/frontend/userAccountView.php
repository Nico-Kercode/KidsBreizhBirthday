<?php $title = "Gestion du compte"; ?>

<?php ob_start(); ?>

<div class="container vue">
    <div class="row my-5 border border-warning">
        <div class="col-sm-4 col-md-4 col-lg-4 p-4 ">
            <h4 class="my-4">
                Bienvenue <em> <span><?= $_SESSION['pseudo']?></span> </em>
            </h4>
            <?php if(isset($_SESSION['pseudo'])) { ?>
            <img class="img-fluid" src="<?= $_SESSION['avatar']?>" alt="<?= $_SESSION['avatar']?>">
            <?php } ?>
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                action="index.php?action=updavatar">

                <div class="form-group">
                    <label for="formControl" class="col-sm-10 ">Ajoutez ou modifiez votre Avatar</label>
                    <input type="file" name="imageProfil" class="form-control-file my-2">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark text-light" name="updateAvatar">Envoyer</button>
                    <div class="col-sm-9 my-4">
                    </div>
                </div> <!-- /.form-group -->
            </form>
        </div>
        <!-- FORMULAIRE -->
        <div class="col-sm-8 col-md-8 col-lg-8">
            <form class="form-horizontal my-4" role="form" method="POST" action="index.php?action=update">
                <div class="form-group">
                    <label for="email" class="col-sm-6 control-label">Saisissez votre nouvel Email </label>
                    <div class="col-sm-9">
                        <input type="text" name="email" class="form-control" placeholder="<?= $_SESSION['email']?>"
                            value="<?= $_SESSION['email']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Nouveau mot de passe</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_1" class="form-control"
                            placeholder="saisissez votre nouveau mot de passe">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="col-sm-5 control-label">Confirmation du mot de passe</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_2" class="form-control">
                    </div>
                </div>
                <div class="form-group ml-3">
                    <button type="submit" class="btn btn-dark text-light" name="update_user"
                        id="button">Envoyer</button>
                    <div class="col-sm-9">
                    </div>
                </div> <!-- /.form-group -->


                <div class="form-group ml-3">

                    <button type="button" class="btn btn-danger text-light" data-toggle="modal"
                        data-target="#suppressionCompteModal">
                        Supprimer mon compte
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="suppressionCompteModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Etes vous sur de vouloir
                                        supprimer votre compte ? </h5>


                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <a href="index.php?action=supprimerMonCompte"
                                        class="btn btn-dark text-danger border border-danger">OUI SUPPRIMER</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">NON RETOUR
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                    </div>
                </div> <!-- /.form-group -->

            </form>

        </div>
    </div> <!-- row-->
</div><!-- container -->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>