<?php $title = "Login"; ?>

<?php ob_start(); ?>

<div class="container">
    <div class="row">


        <div class="col-sm-12 col-lg-10 offset-lg-2 my-4">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                action="index.php?action=register">
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Pseudo</label>
                    <div class="col-sm-9">
                        <input type="text" name="pseudo" class="form-control" required minlength="4" maxlength="20">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9">
                        <label for="inputEmail" class="control-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="" required>

                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Mot de passe</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_1" class="form-control" required minlength="6"
                            maxlength="10">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="col-sm-3 control-label">Confirmation</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_2" class="form-control" required minlength="6"
                            maxlength="10">
                    </div>
                </div>
                <div class="form-group">

                    <!-- image -->

                    <label for="formControl" class="col-sm-510">Selectionnez un fichier</label>
                    <input type="file" name="image" class="form-control-file my-2">
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-dark" name="reg_user">Envoyer</button>
                    <div class="col-sm-9">
                    </div>
                </div> <!-- /.form-group -->
            </form>
            <div class="row">

                <div class="container">
                    <p class="butform">
                        <span>Déja enregistré ? :</span> <a href="index.php?action=formLogin" id="co">Connexion</a>
                    </p>
                </div>


            </div>
            <!-- </div> ./container -->


        </div>


    </div>
</div>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>