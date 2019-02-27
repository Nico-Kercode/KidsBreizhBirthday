<?php $title = "Enregistrement d'un Utilisateur"; ?>

<?php ob_start(); ?>

<?php include('view\elements\nav.php')?>



<div class="news container ">
    <h1>ENREGISTREZ VOUS !</h1>

    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
        action="index.php?action=register">
        <?php include('view\errorView.php'); ?>
        <div class="form-group">
            <label for="username" class="col-sm-3 control-label">Pseudo</label>
            <div class="col-sm-9">
                <input type="text" name="pseudo" class="form-control" required>

            </div>
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input type="text" name="email" class="form-control" pattern="regex" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Mot de passe</label>
            <div class="col-sm-9">
                <input type="password" name="password_1" class="form-control" required minlength="6" maxlength="10">
            </div>
        </div>
        <div class="form-group">
            <label for="confirm_password" class="col-sm-3 control-label">Confirmation</label>
            <div class="col-sm-9">
                <input type="password" name="password_2" class="form-control" required minlength="6" maxlength="10">
            </div>
        </div>
        <div class="form-group">

            <!-- image -->

            <label for="formControl" class="col-sm-510">Selectionnez un fichier</label>
            <input type="file" name="image" class="form-control-file my-2">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-dark" name="reg_user" >Envoyer</button>
            <div class="col-sm-9">
            </div>
        </div> <!-- /.form-group -->

        <div class="row">

            <div class="container">
                <p class="butform">
                    <span>Déja enregistré ? :</span> <a href="index.php?action=formLogin" id="co">Connexion</a>
                </p>
            </div>
    </form>


</div> <!-- ./container -->










<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>