<?php $title = 'Vannes'; ?>
<?php ob_start(); ?>
<div class="container-fluid my-4">
    <div class="row d-flex">
        <div class="col-sm-2 ">
            <!-- sidebar left -->
            <a class="btn btn-light btn-sm border-dark" href="index.php?action=vannes&page=1"> RETOUR </a>
            <img class="img-fluid my-4 d-none d-lg-block " src="assets\img\artworkIMG\cadeauJaune.png" alt="cadeau">
        </div> <!-- sidebar left -->
        <div class="col-sm-8">
            <!-- main -->
            <div class="col-sm-12 " id="mainAnnonceContent">
                <div class="row my-2">
                    <?php if(isset($_SESSION['pseudo'])): ?>
                    <div class="col-sm-8 p-2">
                        <a class="btn btn-light border-dark"
                            href="index.php?action=panier&id=<?= $annonce['id'] ?>&id_MEMBRES=<?= $_SESSION['id'] ?>">Ajouter
                            a ma selection</a>
                    </div>
                    <div class="col-sm-4 text-right p-2">

                        <?php if ($totalLike['vote'] == 0 && $totalDisLike['vote'] == 0 ) { ?>
                        <a class="btn btn-light btn-sm border-dark"
                            href="index.php?action=like&id=<?= $annonce['id']?>&id_MEMBRES=<?= $_SESSION['id'] ?>&type=1">
                            <i class="far fa-thumbs-up like"></i></a>

                        <?= $like?>
                        <?php } elseif($like < 2){ 
                                echo $like ?> personne aime <br>
                        <?php } elseif ($like > 1) { ?>
                        <?= $like?> personnes aiment <br> <?php }?>


                        <?php if ($totalDisLike['vote'] == 0 && $totalLike['vote'] == 0) { ?>
                        <a class="btn btn-light btn-sm border-dark"
                            href="index.php?action=like&id=<?= $annonce['id']?>&id_MEMBRES=<?= $_SESSION['id'] ?>&type=2"><i
                                class="far fa-thumbs-down dislike"></i></a> <?=$disLike?>
                        <?php } elseif($disLike < 2){ 
                                echo $disLike ?> personne n'aime pas<br>
                        <?php } elseif ($disLike > 1) { ?>
                        <?= $disLike?> personnes n'aiment pas<br> <?php }?>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- HEADER ANNONCE -->
                <div class=" row d-flex" class="annonceHaut">
                    <div class="col-lg-2 d-none d-md-block ">
                        <img class="img-fluid " src="<?= $annonce['logo']?>" alt="logo">
                    </div>
                    <div class="col-lg-7">
                        <h2 class="text-center p-4 h2annonce">
                            <?= htmlspecialchars($annonce['titre']) ?>
                        </h2>
                    </div>
                </div>
                <!-- END HEADER -->
                <!-- annonce haut -->
                <div class="row my-4 d-flex">
                    <div class="col-sm-12 col-lg-6">
                        <p class="p-4  annonceContent bg-light">
                            <?= nl2br(ucfirst(htmlspecialchars($annonce['presentation']))) ?>
                        </p>
                    </div>
                    <div class="col-lg-6 mx-auto">
                        <img class="img-fluid rounded" src="<?= $annonce['photo1']?>" alt="Photo1">
                    </div>
                </div>
                <!-- END annonce haut -->
                <!-- annonce bas -->
                <div class="row d-flex">
                    <div class="col-sm-12 col-lg-6 mx-auto">
                        <img class="img-fluid rounded" src="<?= $annonce['photo2']?>" alt="Photo2">
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <p class="p-4  annonceContent  bg-light">
                            <?= nl2br(ucfirst(htmlspecialchars($annonce['descriptif']))) ?>
                        </p>
                    </div>
                </div>
                <!-- END annonce bas -->
                <!-- Contact + formulaire commentaire -->
                <div class="row " id="basAdd">
                    <div class="col-sm-12 col-lg-6 bg-light" id="contact">
                        <h6 class="mt-4">CONTACT :</h6>
                        <p class="p-2">
                            <?= nl2br(ucfirst(htmlspecialchars($annonce['contact']))) ?>
                        </p>
                    </div>
                    <div class="col-lg-6 ">
                        <?php if(!empty($_SESSION['pseudo'])) : ?>
                        <!-- autorise les comm si enregistré -->
                        <h6 class="my-4 "> <em>Utilisez le formulaire pour laisser un commentaire !
                            </em>
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
                        <?php endif; ?>
                        <!-- fin autorisation -->
                    </div>
                </div>
                <!-- Fin contact + formulaire -->
            </div>
        </div> <!-- main -->
        <!-- sidebar right -->
        <div class="col-sm-2">
            <!-- widget API meteo -->
            <div class="d-none d-lg-block " id="widget_4f2fdfad140809744f0aeb691f2d709c">
                <span id="t_4f2fdfad140809744f0aeb691f2d709c">Météo Vannes</span>
                <span id="l_4f2fdfad140809744f0aeb691f2d709c"><a
                        href="http://www.mymeteo.info/r/vannes_j">M&eacute;t&eacute;o &agrave; Vannes</a></span>
                <script type="text/javascript">
                (function() {
                    var my = document.createElement("script");
                    my.type = "text/javascript";
                    my.async = true;
                    my.src =
                        "https://services.my-meteo.com/widget/js?ville=20854&format=vertical&nb_jours=5&temps&icones&vent&coins&c1=393939&c2=a9a9a9&c3=e6e6e6&c4=ffdb5c&c5=00d2ff&c6=d21515&police=1&t_icones=1&x=160&y=537.5&d=0&id=4f2fdfad140809744f0aeb691f2d709c";
                    var z = document.getElementsByTagName("script")[0];
                    z.parentNode.insertBefore(my, z);
                })();
                </script>
            </div>
            <!-- widget meteo -->
        </div> <!-- sidebar right -->
        <!-- END Bloc principal annonce -->
    </div> <!-- row -->
    <!-- HEADER COMMENTAIRES -->
    <div class="col-sm-8 offset-sm-2">
        <!-- bloc commentaires -->
        <div class="row d-flex CommContent">
            <div class="col-sm-12 my-4">
                <h4 class="text-left my-2  border-bottom border-warning  "> <em>Les derniers avis :</em></h4>
                <!-- COMMENTAIRES -->
                <?php foreach ($allComments as $comment): ?>

                <div class="col-sm-12 ">
                    <p class="text-right border-bottom border-dark p-2 ">commentaire de : &nbsp;<strong> <em>
                                <?= htmlspecialchars($comment['pseudo']) ?>
                            </em></strong>&nbsp; le
                        <?= $comment['date_commentaire'] ?> &nbsp;

                        <?php if($comment['nbreReport'] != 0 ) :?>
                        Ce message à déja été signalé <?= $comment['nbreReport']?> fois &nbsp; <?php endif; ?>
                        <a id="alertBtn"
                            href="index.php?action=alert&id=<?= $annonce['id']?>&id_MEMBRES=<?= $_SESSION['id']?>&id_COMMENTAIRE=<?= $comment['id']?>"><i
                                class="fas fa-exclamation-triangle"></i></a>
                    </p>
                    <p class="CommContent p-4"> <?= nl2br(htmlspecialchars($comment['contenu'])) ?>
                    </p>
                </div>
                <?php endforeach ;?>
            </div>
        </div>
    </div>
</div> <!-- container fluid -->
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>