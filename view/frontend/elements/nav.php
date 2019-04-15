<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 header d-flex">
            <div class="mx-auto my-auto ">
                <a class="d-none d-sm-block" href="index.php?action=home"><img class="img-fluid"
                        src="assets/img/artworkIMG/lettrage4.png" alt="backHome"></a>

                <a class="d-block d-sm-none" href="index.php?action=home"><img class="img-fluid"
                        src="assets/img/artworkIMG/lettrage.png" alt="backHome"></a>
            </div>
        </div>
        <nav class="response--main-navigation col-sm-12 d-flex ">
            <ul class="response--site-menu mx-auto p-2 ">

                <li class="mx-4"><a class="<?= $_GET['action'] == 'home' ? 'activeMenu' : '' ?>"
                        href="index.php?action=home">ACCUEIL</a></li>

                <?php if (isset($_SESSION['rang']) && $_SESSION['rang'] == '2') : ?>
                <li class="mx-4"><a class="<?= $_GET['action'] == 'admin' ? 'activeMenu' : '' ?>"
                        href="index.php?action=admin&page=1">MENU D'ADMINISTRATION</a></li>
                <?php endif; ?>

                <?php if(isset($_SESSION['pseudo'])):?>
                <li class="mx-4"><a class="<?= $_GET['action'] == 'moncompte' ? 'activeMenu' : '' ?>"
                        href="index.php?action=moncompte">MON COMPTE</a></li>
                <?php endif; ?>

                <?php if (isset($_SESSION['rang']) && $_SESSION['rang'] == '1' || $_SESSION['rang'] == '2') : ?>
                <ul>
                    <li class="mx-4"> <a href="#" id="clic">MES ANNONCES</a>
                        <ul id="navMain" class="none ">
                            <li class="mx-4"><a class="<?= $_GET['action'] == 'ajoutAnnonce' ? 'activeMenu' : '' ?>"
                                    href="index.php?action=ajoutAnnonce">AJOUTER UNE ANNONCE</a></li>
                            <li class="mx-4"><a class="<?= $_GET['action'] == 'gererAnnonce' ? 'activeMenu' : '' ?>"
                                    href="index.php?action=gererAnnonces">GERER MES ANNONCES</a></li>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>
                <?php if(empty($_SESSION)) : ?>
                <li class="mx-4 border-dark ">
                    <a class="btn" id="connexionBtn" data-toggle="modal" data-target="#connexionModal">
                        CONNEXION
                    </a>
                </li>
                <?php endif; ?>
                <?php if(isset($_SESSION['pseudo'])) : ?>
                <li class="mx-4  "><a href="index.php?action=deco">DECONNEXION</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- Modal -->
        <div class="modal fade" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="connexionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header myModal">
                        <h4 class="mx-auto"> Connexion </h4>
                        <!-- FORMULAIRE -->
                        <form class="form-horizontal" method="post" action="index.php?action=login" role="form">
                            <div class="form-group">
                                <label for="Pseudo" class="col-sm-6 control-label"></label>
                                <div class="col-sm-12">
                                    <input id="pseudo" required placeholder="Pseudo" name="username"
                                        value="<?php echo $username; ?>" class="form-control" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-6 control-label"></label>
                                <div class="col-sm-12">
                                    <input type="password" id="password" name="password" placeholder="Mot de passe"
                                        class="form-control mb-4">
                                </div>
                            </div>
                            <div class="input-group ">
                                <button type="submit" class="btn btn-warning border border-dark ml-3 " name="login_user"
                                    id="button">Connexion</button>
                            </div>

                        </form>
                        <button type=" button" class="close" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12">
                            <h6>Pas encore enregistré ? </h6>
                            <a class="btn btn-warning" href="index.php?action=formRegister">S'enregistrer</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class=" row">
        <div class="col-sm-8 offset-sm-2 my-4">
        </div>
    </div>
    <div class="row ">
        <!-- BARRE DE RECHERCHE  -->
        <div class="col-sm-8 offset-sm-3 d-flex ">

            <?php if(isset($_SESSION['rang']) && $_SESSION['rang'] == '2'):?>
            <h6 class="bienvenue"> <em> Bienvenue chez toi
                    <span><?=  ucfirst($_SESSION['pseudo'])?></span>. Il y a
                    actuellement <?= $total ?> activités référencées, un total de
                    <?= $totalMembres ?> membres enregistrés. Nos membres nous on signalés
                    <?=$nbAlert['nbreAlerts']?>
                    messages </em>
            </h6>
            <?php endif; ?>

            <?php if(isset($_SESSION['rang']) && $_SESSION['rang'] == '0' || $_SESSION['rang'] =='1'):?>
            <h6 class="bienvenue"> <em> Bienvenue <span><?=  ucfirst($_SESSION['pseudo'])?></span>,
                    merci de vous
                    être
                    connecté(e). Il y a actuellement <?= $total ?> activités référencées et un total
                    de
                    <?= $totalMembres ?> membres enregistrés . </em></h6>
            <?php endif; ?>

            <div class="row <?= $_GET['action'] == 'rgpd' 
    || $_GET['action'] == 'moncompte'
    || $_GET['action'] == 'formRegister'
     ? 'none' : '' ?>">
                <?php if(empty($_SESSION)):?>
                <h6 class="bienvenue"> <em> Pour plus de contenu :</em>
                    <a href="index.php?action=formRegister">Enregistrez vous !</a>




                    </a> <em> &nbsp; Il y a actuellement <?= $total ?> activités référencées et un total
                        de
                        <?= $totalMembres ?> membres enregistrés .</em> </h6>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row <?= $_GET['action'] == 'rgpd' 
    || $_GET['action'] == 'moncompte'
    || $_GET['action'] == 'formRegister'
    || $_GET['action'] == 'ajoutAnnonce' ? 'none' : '' ?>">

        <div class="col-sm-6 offset-sm-3 border-dark ">
            <form method="POST" action="index.php?action=search" class="input-group  input-lg my-2">
                <input class=" form-control border-dark  " type="search" value="" name="searchbar" id="search" required>
                <span class="input-group-append">
                    <button class="btn border-left-2 border border-dark " name="submitSearch" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>

            </form>
        </div>
    </div> <!-- row -->

    <div class="row <?= $_GET['action'] == 'rgpd' 
    || $_GET['action'] == 'moncompte'
    || $_GET['action'] == 'formRegister'
    || $_GET['action'] == 'ajoutAnnonce' ? 'none' : '' ?>">

        <div class="d-inline-flex col-sm-12 col-md-10 offset-md-2" id="choixAccueil">
            <div class="row">
                <div class="col-sm-12 col-md-6 mx-auto ">
                    <a class="btn btn-warning  border-dark   <?= $_GET['action'] == 'vannes' ? 'active' : '' ?>"
                        href="index.php?action=vannes&page=1">Secteur de Vannes</a>

                    <a class="btn btn-warning border-dark   <?= $_GET['action'] == 'lorient' ? 'active' : '' ?>"
                        href="index.php?action=lorient&page=1">Secteur de Lorient</a>

                    <a class="btn btn-warning border-dark <?= $_GET['action'] == 'meilleurNote' ? 'active' : '' ?>"
                        href="index.php?action=meilleurNote">Les 10 mieux notés</a>

                    <?php if(!empty($getSelection)):?>

                    <a class="btn btn-warning  border-dark  <?= $_GET['action'] == 'monPanier' ? 'active' : '' ?>"
                        href="index.php?action=monPanier&id_MEMBRES=<?= $_SESSION['id']?>">Ma
                        selection</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- important ne pas suppr les 2 </div> (include) -->
</div>
</div>