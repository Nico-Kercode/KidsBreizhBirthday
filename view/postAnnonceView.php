<?php $title = 'New annonce'; ?>
<?php ob_start(); ?>
<?php include('view\elements\nav.php')?>


<div class="container">

    <div class="row">

        <div class="col-sm-12">

            <form class="form-horizontal" role="form" method="POST" action="index.php?action=addannonce"
                enctype="multipart/form-data">

                <h3>Deposez votre annonce</h3>
                <div class="form-group col-md-2">
                    <label for="commune">Ville</label>
                    <select name="commune" class="form-control">
                        <option selected value="vannes">Vannes</option>
                        <option value="lorient">Lorient</option>
                        <option>#</option>
                        <option>#</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="formControl" class="col-sm-510">LOGO</label>
                    <input type="file" name="logo" class="form-control-file my-2">
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Titre</label>
                    <div class="col-sm-9">
                        <input type="text" name="titreA" value="" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contenu">Descriptif</label>
                    <textarea class="form-control" rows="5" name="contentA"></textarea>
                </div>
                <div class="form-group">
                    <label for="formControl" class="col-sm-510">Photo 1</label>
                    <input type="file" name="photo1" class="form-control-file my-2">
                </div>
                <div class="form-group">
                    <label for="formControl" class="col-sm-510">Photo 2</label>
                    <input type="file" name="photo2" class="form-control-file my-2">
                </div>
               
                <div class="form-group">
                    <label for="formControl" class="col-sm-510">Photo 3</label>
                    <input type="file" name="photo3" class="form-control-file my-2">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark" name="ajoutAnnonce">Envoyer</button>

                </div>
            </form>
            <!-- /.form-group -->
            <!-- <a href="index.php?action=retourChapitre">Retour aux chapitres</a> -->

        </div>

    </div>
</div> <!-- ./container -->



<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>