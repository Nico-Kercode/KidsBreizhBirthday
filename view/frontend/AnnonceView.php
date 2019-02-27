<?php $title = 'Vannes'; ?>
<?php ob_start(); ?>
<?php include('view\elements\nav.php')?>


<div class="container">

    <a href="index.php?action=vannes">Retour aux annonces</a>

    <div class="col-sm-12" id="mainAnnonces">

        <div class=" row d-flex" id="annonceHaut">

            <div class="col-sm-12 col-lg-4 ">

                <img class="img-fluid logoA" src="<?= $annonce['logo']?>" alt="logo">

            </div>

            <div class="col-sm-12 col-lg-8 titreAnnonce">
                <h2 class="font-weight-bold">
                    <?= htmlspecialchars($annonce['titre']) ?>
                </h2>
                <p> <em> publié par <span> <?= ucfirst(htmlspecialchars($annonce['pseudo'])) ?> </span> </em> </p>


            </div>
        </div>

        <div class="row my-4">

            <div class="offset-lg-2">

                <img class="img-fluid photosadd" src="<?= $annonce['photo1']?>" alt="Photo1">

            </div>

        </div>

        <div class="row">

            <p class="p-4 text-center" id="annonceContent">
                <?= nl2br(ucfirst(htmlspecialchars($annonce['contenu']))) ?>
            </p>


        </div>

    </div>



    <div class="row">

        <!-- COMMENTAIRES -->
        <?php if(!empty($_SESSION['pseudo'])) { ?>
        <div class="col-sm-12">
            <h2> <em>Utilisez le formulaire pour laisser un commentaire ! </em></h2>

            <form action="index.php?action=addComment&id=<?= $annonce['id'] ?>&id_MEMBRES=<?= $_SESSION['id'] ?>"
                method="post">
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment" rows="5" cols="50"></textarea>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
        </div>
        <?php } ?>


        <div class="news">
            <h2> <em>Les dernieres commentaires :</em></h2>
            <?php
            // foreach va recuperer toutes le contenu du tableau $comments -> controller
foreach ($allComments as $comment)

{

    ?>
            <p id="commentaire"><strong>Commentaire de <?= htmlspecialchars($comment['pseudo']) ?></strong> le
                <?= $comment['creation_date'] ?>
                <br><br>
                <?= nl2br(htmlspecialchars($comment['content'])) ?>

                <?php if(!empty($_SESSION['pseudo'])) { ?>

                <form method="post" id="formABC"
                    action="index.php?action=click&id=<?= $comment['id']?>&id_chapter=<?= $_GET['id']?>">
                    <button type="submit" id="btnSubmit">Signaler</button>

                </form>

                <?php }?>

            </p>

            <p id="edition">


                <?php if(isset($_SESSION['rang']) && $_SESSION['rang'] ==  '1') { ?>

                <a href="index.php?action=editForm&id=<?= $comment['id'] ?>&id_chapter=<?= $_GET['id']?>"
                    class="btn-dark">EDITER</a>

                <a href="index.php?action=deleteC&id=<?= $comment['id'] ?>&id_chapter=<?= $_GET['id']?>"
                    class="btn-dark">SUPPRIMER</a> </h3>
            </p>
            <?php
    }
}
?>
        </div>

    </div>

</div> <!-- annonces -->
<?php
// }  
?>















<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>