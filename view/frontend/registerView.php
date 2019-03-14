<?php $title = "Login"; ?>

<?php ob_start(); ?>

<div class="container">
    <div class="row">


        <div class="col-sm-12 col-lg-10 offset-lg-2 my-4">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                action="index.php?action=register" id="formulaireEnregistrement">

                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Pseudo</label>
                    <div class="col-sm-9">
                        <input type="text" name="pseudo" class="form-control" required 
                         data-validation-length="min4"
                         data-validation="alphanumeric" data-validation-allowing="-_"
                         data-validation-error-msg="Vous ne pouvez utiliser que des caractères alphanumériques, des chiffres et le tiret du 6(-) ou du 8(_)">
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
                            maxlength="10" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="col-sm-3 control-label">Confirmation</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_2" class="form-control" required minlength="6"
                            maxlength="10">
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="rang">Rang</label>
                    <select name="rang" class="form-control">
                        <option selected value="0">Particulier</option>
                        <option value="1">Professionnel</option>
                    </select>
                </div>


                <div class="form-group">

                    <!-- image -->

                    <label for="formControl" class="col-sm-510">Selectionnez un fichier</label>
                    <input type="file" name="image" required class="form-control-file my-2"
                    data-validation="size" data-validation-max-size="1M"
                    >
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