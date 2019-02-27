<?php $title = "Login"; ?>

<?php ob_start(); ?>

<?php include('view\elements\nav.php')?>


<div class="container ">
    <h1>Connexion</h1>
    <div class="col-sm-12 col-md-12">
        <form class="form-horizontal" method="post" action="index.php?action=login" role="form">

            <?php include('errors.php'); ?>

            <div class="form-group">
                <label for="Pseudo" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <input id="pseudo" placeholder="Pseudo" name="username" value="<?php echo $username; ?>"
                        class="form-control" autofocus>
                </div>
            </div>
            <div class="form-group">

                <label for="password" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <input type="password" id="password" name="password" placeholder="Mot de passe"
                        class="form-control">
                </div>
            </div>
            <div class="input-group">
                <button type="submit" class="btn btn-light " name="login_user" id="button">Connexion</button>
            </div>



            <div id="deja2">
                <p class="butform">
                    Pas encore inscrit ? <a href="index.php?action=formRegister"
                        id="reg" ">S'enregistrer</a>

                </p>
            </div>
        </form>

    </div>
</div>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>