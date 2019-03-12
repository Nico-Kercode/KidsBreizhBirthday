<?php $title = 'New annonce'; ?>
<?php ob_start(); ?>



<div class="container">

    <div class="row">

        <div class="col-sm-12">

            <form class="form-horizontal" role="form" method="POST" action="index.php?action=addannonce"
                enctype="multipart/form-data" id="postannonce">

                <h3>Deposez votre annonce</h3>
                <div class="form-group col-md-2">
                    <label for="commune">Ville</label>
                    <select name="commune" class="form-control">
                        <option selected value="vannes">Vannes</option>
                        <option value="lorient">Lorient</option>
                        <option value="Ploemel">Ploemel</option>
                        <option>#</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="formControl" class="col-sm-510">LOGO (max. 1 Mo)</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                    <input type="file" name="logo" required class="form-control-file my-2">
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Titre</label>
                    <div class="col-sm-9">
                        <input type="text" name="titreA" value="" required class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contenu">Presentation du lieu (maxi 500 caracters) </label>
                    <textarea class="form-control" rows="5"  maxlength="600"required name="contentA"></textarea>
                </div>
                <div class="form-group">
                    <label for="contenu">Descriptif des activités proposées (maxi 500 caracters)</label>
                    <textarea class="form-control" rows="5" maxlength="600" required name="contentC"></textarea>
                </div>
                <div class="form-group">
                    <label for="contenu">Contact / adresses </label>
                    <textarea class="form-control" rows="5" required name="contentB"></textarea>
                </div>
                <div class="form-group">

                    <label for="formControl" class="col-sm-510">Photo 1 (max. 1 Mo)</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                    <input type="file" name="photo1" required class="form-control-file my-2">
                </div>
                <div class="form-group">
                    <label for="formControl" class="col-sm-510">Photo 2 (max. 1 Mo)</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                    <input type="file" name="photo2" required class="form-control-file my-2">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark" name="ajoutAnnonce">Envoyer</button>

                </div>
            </form>
            <!-- /.form-group -->
            <!-- <a href="index.php?action=retourChapitre">Retour aux chapitres</a> -->

        </div>

    </div>
    <div class="baspost">


    </div>
</div> <!-- ./container -->





<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>