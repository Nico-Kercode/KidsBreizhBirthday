<?php $title = "Kid's Breizh Birthday"; ?>

<?php ob_start(); ?>

<?php include('view\elements\nav.php');?>




<div class="container">
    <div class="row my-5">
        <div class="col-sm-4 col-md-4 col-lg-4 ">


            <h4>
                Bienvenue <em> <span><?= $_SESSION['pseudo']?></span> </em>
            </h4>

            <?php if(isset($_SESSION['pseudo'])) { ?>

            <img class="img-fluid" id="avatar" src="assets/img/<?= $_SESSION['avatar']?>"
                alt="<?= $_SESSION['avatar']?>">

            <?php } ?>


            <div class="form-group my-2">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="index.php?action=upload">
                    <p> <label for="formControl" class="col-sm-510">Selectionnez un fichier</label>
                        <input type="file" name="fichier" size="40" class="form-control-file my-2">
                        <input type="submit" name="upload" value="Envoyer">
                    </p>
                </form>

            </div>



        </div>


        <!-- FORMULAIRE -->



        <div class="col-sm-8 col-md-8 col-lg-8">

            <form class="form-horizontal" role="form" method="POST" action="index.php?action=update">
                <?php include('view\errorView.php'); ?>
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Pseudo</label>
                    <div class="col-sm-9">
                        <input type="text" name="pseudo" class="form-control" placeholder="<?= $_SESSION['pseudo']?>">

                    </div>
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" class="form-control" placeholder="<?= $_SESSION['email']?>">
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