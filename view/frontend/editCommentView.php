<?php $title = 'edition commentaire'; ?>
<?php ob_start(); ?>
<div class="container">

    <a class="btn btn-light btn-sm" href="index.php?action=admin&page=1">Retour</a>
    <h2 class="text-center my-4">Edition du commentaire de <?= $editCommentaire['pseudo'] ?></h2>
    <div class="col-sm-8 mx-auto border border-light">
        <form class="col-sm-5 offset-lg-3"
            action="index.php?action=editComment&id=<?= $_GET['id'] ?>&id_ANNONCES=<?= $_GET['id_ANNONCES']?>"
            method="post">
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment" rows="5" cols="50"><?= $editCommentaire['contenu'] ?></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>