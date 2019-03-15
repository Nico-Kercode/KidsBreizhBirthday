<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 header d-flex">
            <div class="mx-auto my-auto">
                <a href="index.php?action=home"><img class="img-fluid" src="assets/img/artworkIMG/lettrage2.png"
                        alt="backHome"></a>
            </div>
        </div>


        <nav class="response--main-navigation col-sm-12 d-flex ">

            <ul class="response--site-menu mx-auto p-2 ">

                <li class="mx-4 "><a class="<?= $_GET['action'] == 'home' ? 'activeMenu' : '' ?>"
                        href="index.php?action=home">ACCUEIL</a></li>

                <?php if (isset($_SESSION['rang']) && $_SESSION['rang'] == '2') { ?>
                <li class="mx-4"><a class="<?= $_GET['action'] == 'admin' ? 'activeMenu' : '' ?>"
                        href="index.php?action=admin&page=1">MENU D'ADMINISTRATION</a></li>
                <?php } ?>

                <?php if(isset($_SESSION['pseudo'])){?>
                <li class="mx-4"><a class="<?= $_GET['action'] == 'moncompte' ? 'activeMenu' : '' ?>"
                        href="index.php?action=moncompte">MON COMPTE</a></li>
                <?php }?>

                <?php if (isset($_SESSION['rang']) && $_SESSION['rang'] == '1' || $_SESSION['rang'] == '2') { ?>
                <li class="mx-4"><a class="<?= $_GET['action'] == 'ajoutAnnonce' ? 'activeMenu' : '' ?>"
                        href="index.php?action=ajoutAnnonce">AJOUTER UNE ANNONCE</a></li>
                <?php } ?>

                <?php if(empty($_SESSION)) { ?>
                <li class="mx-4"><a href="index.php?action=formLogin">CONNEXION</a></li>
                <?php } ?>
                <?php if(isset($_SESSION['pseudo'])) { ?>
                <li class="mx-4"><a href="index.php?action=deco">DECONNEXION</a></li>
                <?php } ?>

            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-2 my-4">

        </div>
    </div>

    <div class="row">
        <!-- BARRE DE RECHERCHE  -->

        <div class="col-sm-8 offset-sm-3 d-flex">


            <?php if(isset($_SESSION['rang']) && $_SESSION['rang'] == '2'){?>
            <h6 id="bienvenue"> <em> Bienvenue chez toi <span><?=  ucfirst($_SESSION['pseudo'])?></span>. Il y a
                    actuellement <?= $total ?> activités référencées, un total de
                    <?= $totalMembres ?> membres enregistrés. Nos membres nous on signalés <?=$nbAlert?> messages </em>
            </h6>
            <?php } ?>

            <?php if(isset($_SESSION['rang']) && $_SESSION['rang'] == '0' || $_SESSION['rang'] =='1'){?>
            <h6 id="bienvenue"> <em> Bienvenue <span><?=  ucfirst($_SESSION['pseudo'])?></span>, merci de vous être
                    connecté(e). Il y a actuellement <?= $total ?> activités référencées et un total de
                    <?= $totalMembres ?> membres enregistrés . </em></h6>
            <?php } ?>

            <?php if(empty($_SESSION)){?>
            <h6 id="bienvenue"> <em> Pour plus de contenu, <a href="index.php?action=formRegister">Enregistrez vous
                        !</a> Il y a actuellement <?= $total ?> activités référencées et un total de
                    <?= $totalMembres ?> membres enregistrés . </em></h6>
            <?php } ?>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-10 offset-sm-1">
            <form method="POST" action="index.php?action=search" class="input-group  input-lg my-2">
                <input class=" form-control " type="search" value="" name="searchbar" id="search" required>
                <span class="input-group-append">
                    <button class="btn border-left-0 border" name="submitSearch" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>

            </form>
        </div>
    </div> <!-- row -->

    <div class="row <?= $_GET['action'] == 'rgpd' 
    || $_GET['action'] == 'moncompte'
    || $_GET['action'] == 'ajoutAnnonce' ? 'none' : '' ?>">

        <div class="d-flex mx-auto" id="choixAccueil">
            <a class="ml-4 <?= $_GET['action'] == 'vannes' ? 'active' : '' ?>"
                href="index.php?action=vannes&page=1">Secteur de Vannes</a>
            <a class="ml-4 <?= $_GET['action'] == 'lorient' ? 'active' : '' ?>"
                href="index.php?action=lorient&page=1">Secteur de Lorient</a>
            <a class="ml-4 <?= $_GET['action'] == 'meilleurNote' ? 'active' : '' ?>"
                href="index.php?action=meilleurNote">Les 10 mieux notés</a>


            <a class="ml-4 <?= $_GET['action'] == 'monPanier' ? 'active' : '' ?>"
                href="index.php?action=monPanier&id_MEMBRES=<?= $_SESSION['id']?>">Ma selection</a>

        </div>




    </div>
</div>