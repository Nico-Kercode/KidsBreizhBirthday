<?php $title = 'Vannes'; ?>
<?php ob_start(); ?>



<div class="container-fluid mb-2">
    <div class="row d-flex">
        <div class="col-sm-12 col-lg-4" id="retourAnnonce">
            <a class="Back" href="index.php?action=vannes&page=1"> RETOUR </a>

        </div>

    </div>

</div>
<div class="row d-flex">
    <div class="col-sm-2 col-lg-2 my-auto"> <img class="d-none d-sm-block img-fluid "
            src="assets\img\artworkIMG\imageCadeau1.png" alt=""></div>
    <div class="col-sm-8 col-lg-8 ">

        <!-- Bloc principal annonce -->

        <div class="row">

            <div class="col-sm-12" id="mainAnnonces">

                <!-- HEADER ANNONCE -->

                <div class=" row d-flex" id="annonceHaut">

                    <div class="col-lg-2 col d-none d-lg-block ">

                        <img class="img-fluid " src="<?= $annonce['logo']?>" alt="logo">

                    </div>

                    <div class="col-lg-6 ">
                        <h2 class="text-center p-4 h2annonces">
                            <?= htmlspecialchars($annonce['titre']) ?>
                        </h2>

                    </div>
                    <div class="col-lg-4 p-4">
                        <a class="p-2 select"
                            href="index.php?action=panier&id=<?= $annonce['id'] ?>&id_MEMBRES=<?= $_SESSION['id'] ?>">Ajouter
                            a ma selection</a>
                    </div>
                </div>
                <!-- END HEADER -->

                <!-- annonce haut -->

                <div class="row my-4 d-flex">

                    <div class="col-sm-12 col-lg-6">
                        <p class="p-4  annonceContent">
                            <?= nl2br(ucfirst(htmlspecialchars($annonce['presentation']))) ?>
                        </p>
                    </div>

                    <div class="col-lg-6 mx-auto">

                        <img class="img-fluid img-thumbnail" src="<?= $annonce['photo1']?>" alt="Photo1">

                    </div>
                </div>


                <!-- END annonce haut -->

                <!-- annonce bas -->
                <div class="row d-flex">

                    <div class="col-sm-12 col-lg-6 mx-auto">

                        <img class="img-fluid img-thumbnail" src="<?= $annonce['photo2']?>" alt="Photo2">

                    </div>

                    <div class="col-sm-12 col-lg-6">
                        <p class="p-4  annonceContent">
                            <?= nl2br(ucfirst(htmlspecialchars($annonce['descriptif']))) ?>
                        </p>
                    </div>


                </div>

                <!-- END annonce bas -->

                <!-- Contact + formulaire commentaire -->

                <div class="row text-center d-flex" id="basAdd">

                    <div class="col-sm-12 col-lg-6 annonceContent" id="contact">

                        <h6 class="mt-4">CONTACT :</h6>

                        <p class="p-2">
                            <?= nl2br(ucfirst(htmlspecialchars($annonce['contact']))) ?>
                        </p>

                    </div>
                    <div class="col-lg-6 ">
                        <?php if(!empty($_SESSION['pseudo'])) { ?>
                        <!-- autorise les comm si enregistré -->

                        <h6 class="mb-4 annonceContent"> <em>Utilisez le formulaire pour laisser un commentaire ! </em>
                        </h6>

                        <form
                            action="index.php?action=addComment&id=<?= $annonce['id'] ?>&id_MEMBRES=<?= $_SESSION['id'] ?>"
                            method="post">
                            <div>
                                <textarea class="form-control" id="comment" name="comment" rows="5"
                                    cols="50"></textarea>
                            </div>
                            <div>
                                <input class="mt-2" type="submit" />
                            </div>
                        </form>

                        <?php } ?>
                        <!-- fin autorisation -->
                    </div>
                </div>

                <!-- Fin contact + formulaire -->
            </div>

        </div>
        <!-- END Bloc principal annonce -->

        <!-- HEADER COMMENTAIRES -->

        <div class="row d-flex annonceContent">

            <div class="col-sm-12 col-lg-6 my-2">

                <h4 class="text-left"> <em>Les derniers avis :</em></h4>
            </div>

            <div class="col-sm-12 col-lg-6 my-2 ">

                <div class=" text-right">
                    <?php if(isset($_SESSION)){

                     ?>
                    <a
                        href="index.php?action=like&id=<?= $annonce['id']?>&id_MEMBRES=<?= $_SESSION['id'] ?>&type=1">J'aime</a>

                    <a href="index.php?action=like&id=<?= $annonce['id']?>&id_MEMBRES=<?= $_SESSION['id'] ?>&type=2">Je
                        n'aime pas</a>
                    <?php }?>

                </div>
            </div>
        </div>

        <!-- END HEADER COMMENTAIRES -->
        <!-- COMMENTAIRES -->

        <?php foreach ($allComments as $comment) { ?>

        <div class="col-sm-12 col-lg-12 result annonceContent ">

            <h6 class="text-left">commentaire de : <strong> <em> <?= htmlspecialchars($comment['pseudo']) ?>
                        <em></strong> le
                <?= $comment['date_commentaire'] ?>

                <span id="report">Signaler :
                    <span id="<?= $comment['id']?>" class="p-2 js-dislike-comment far fa-bell "></span>
                </span></h6>

            <p> <?= nl2br(htmlspecialchars($comment['contenu'])) ?>
            </p>

        </div>

        <?php
    }

    ?>

    </div>



</div> <!-- annonces -->


<?php
// }  
?>



<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>