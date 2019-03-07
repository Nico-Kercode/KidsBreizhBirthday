
<?php $title = 'edition commentaire'; ?>
<?php ob_start(); ?>




<h1>Edition du commentaire de <?= $editCommentaire['pseudo'] ?></h1> 

 <div class="news">
    <form action="index.php?action=editComment&id=<?= $_GET['id'] ?>&id_ANNONCES=<?= $_GET['id_ANNONCES']?>"
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

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>