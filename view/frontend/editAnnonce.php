<?php $title = 'Edit Annonce'; ?>
<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" role="form" method="POST"
                action="index.php?action=editThisAnnonce&id_ANNONCES=<?=$ann['id']?>" enctype="multipart/form-data"
                id="editannonce">


                <h3>Editez votre annonce</h3>
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


                    <img class="img-fluid w-25" src="<?=$ann['logo']?>" alt="logo">

                    <label for="formControl" class="col-sm-510">LOGO (max. 1 Mo)</label>
                    <input type="file" name="newlogo" class="form-control-file my-2" data-validation="size"
                        data-validation-max-size="1M">


                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Titre</label>
                    <div class="col-sm-9">
                        <input type="text" name="titre" value="<?= $ann['titre']?>" required class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contenu">Presentation du lieu (maxi 500 caracters) </label>
                    <textarea class="form-control" rows="5" maxlength="600" required
                        name="presentation"><?= $ann['presentation']?></textarea>
                </div>
                <div class="form-group">
                    <label for="contenu">Descriptif des activités proposées (maxi 500 caracters)</label>
                    <textarea class="form-control" rows="5" maxlength="600" required
                        name="descriptif"><?=$ann['descriptif']?></textarea>
                </div>
                <div class="form-group">
                    <label for="contenu">Contact / adresses </label>
                    <textarea class="form-control" rows="5" name="contact"><?=$ann['contact']?></textarea>
                </div>
                <div class="form-group">

                    <img class="img-fluid w-25" src="<?=$ann['photo1']?>" alt="photo1">

                    <label for="formControl" class="col-sm-510">Photo 1 (max. 1 Mo)</label>
                    <input type="file" name="newphoto1" class="form-control-file my-2" data-validation="size"
                        data-validation-max-size="1M">

                </div>

                <div class="form-group">
                    <img class="img-fluid w-25" src="<?=$ann['photo2']?>" alt="photo2">

                    <label for="formControl" class="col-sm-510">Photo 2 (max. 1 Mo)</label>
                    <input type="file" name="newphoto2" class="form-control-file my-2" data-validation="size"
                        data-validation-max-size="1M">

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark" name="editionAnnonce">Envoyer</button>

                </div>
            </form>
        </div>
    </div>
    <div class="baspost">
    </div>
</div> <!-- ./container -->


<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>