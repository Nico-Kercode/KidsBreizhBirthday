<?php $title = 'Vannes'; ?>
<?php ob_start(); ?>


<a class="article" href="index.php?action=vannes">Retour aux annonces</a>
<div class="container">



    <div class="col-sm-12" id="mainAnnonces">

        <div class=" row d-flex" id="annonceHaut">

            <div class=" col d-none d-lg-block ">

                <img class=" img-fluid logoA" src="<?= $annonce['logo']?>" alt="logo">

            </div>

            <div class="col-lg-8 titreAnnonce">
                <h2 class="font-weight-bold">
                    <?= htmlspecialchars($annonce['titre']) ?>
                </h2>
                <p class="text-right mb-2"> <em> publié par <span> <?= ucfirst(htmlspecialchars($annonce['pseudo'])) ?>
                        </span> </em> </p>


            </div>
        </div>

        <div class="row my-4">

            <div class="offset-lg-2">

                <img class="img-fluid  img-thumbnail " src="<?= $annonce['photo1']?>" alt="Photo1">

            </div>

        </div>

        <div class="row">

            <p class="p-4 text-center" id="annonceContent">
                <?= nl2br(ucfirst(htmlspecialchars($annonce['contenu']))) ?>
            </p>

        </div>
        <div class="row text-center d-flex" id="basAdd">

            <div class="col-sm-12 col-lg-4 offset-lg-1 " id="contact">

                <h6 class="text-center">CONTACT :</h6>

                <p class="text-center p-2">
                    <?= nl2br(ucfirst(htmlspecialchars($annonce['contact']))) ?>

                </p>

            </div>
            <div class="col-lg-4 offset-lg-2">
                <?php if(!empty($_SESSION['pseudo'])) { ?>

                <h6 class="m-4"> <em>Utilisez le formulaire pour laisser un commentaire ! </em></h6>

                <form action="index.php?action=addComment&id=<?= $annonce['id'] ?>&id_MEMBRES=<?= $_SESSION['id'] ?>"
                    method="post">
                    <div>
                        <textarea id="comment" name="comment" rows="5" cols="50"></textarea>
                    </div>
                    <div>
                        <input type="submit" />
                    </div>
                </form>

                <?php } ?>



            </div>



        </div>

    </div>



    <div class="row">

        <!-- COMMENTAIRES -->


        <div class="col-sm-12 my-4">

            <h4> <em>Les dernieres avis :</em></h4>

            <!-- foreach va recuperer toutes le contenu du tableau $comments -> controller -->

            <?php foreach ($allComments as $comment) { ?>

            <div class="col-sm-12 result p-2">

                <h6 class="text-left">commentaire de : <strong> <em> <?= htmlspecialchars($comment['pseudo']) ?>
                            <em></strong> le
                    <?= $comment['date_commentaire'] ?> 

                <span id="report">Signaler le commentaire :   
                    <span id="<?= $comment['id']?>" class="p-2 js-dislike-comment far fa-bell "></span>
                </span></h6>
                <br><br>
                <p> <?= nl2br(htmlspecialchars($comment['contenu'])) ?>



                </p>

            </div>




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