<?php $title = "Gestion du compte"; ?>

<?php ob_start(); ?>

<div class="container vue">
    <div class="row my-5">
        <div class="col-sm-4 col-md-4 col-lg-4 ">
            <h4 class="my-4">
                Bienvenue <em> <span><?= $_SESSION['pseudo']?></span> </em>
            </h4>
            <?php if(isset($_SESSION['pseudo'])) { ?>
            <img class="img-fluid" src="<?= $_SESSION['avatar']?>" alt="<?= $_SESSION['avatar']?>">
            <?php } ?>
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                action="index.php?action=updavatar">

                <div class="form-group">
                    <label for="formControl" class="col-sm-10 my-2"></label>
                    <input type="file" name="imageProfil" class="form-control-file my-2">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark" name="updateAvatar">Envoyer</button>
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
                <div class="form-group">
                    <button type="submit" class="btn btn-dark" name="update_user" id="button">Envoyer</button>
                    <div class="col-sm-9">
                    </div>
                </div> <!-- /.form-group -->

            </form>

        </div>





















    </div> <!-- row-->


</div><!-- container -->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>