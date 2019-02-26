<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar" class="active">


        <div class="sidebar-header" id="Mainlogo">

            <a href="index.php?action=home">Kid's Breizh Birthday</a>
        </div>




        <?php if(isset($_SESSION['pseudo'])) { ?>

        <img class="img-fluid " id="avatarMenu" src="<?= htmlspecialchars($_SESSION['avatar'])?>"
            alt="<?= htmlspecialchars($_SESSION['avatar'])?>">


        <h4 class="d-block my-2" id="mbrNav">
            Bienvenue <em> <span><?=  ucfirst($_SESSION['pseudo'])?></span> </em>
        </h4>
        <!-- <li class="d-block"><a href="index.php?action=moncompte">Mon compte</a></li> -->
        <!-- <li class="d-block"><a href="index.php?action=deco">Deconnexion</a></li> -->
        <?php } ?>


        <!-- Affichage gestion des annonces si rang = 1 (professionels) ou 2 (admin)-->

        <ul class="list-unstyled CTAs">
        <?php if (isset($_SESSION['rang']) && $_SESSION['rang'] == '1' || $_SESSION['rang'] == '2' ) { ?>
        <li class="d-block"><a href="index.php?action=ajoutAnnonce" class="article my-2">Ajouter une annonce</a></li>
        <li class="d-block"> <a href="index.php?action=annonce" class="article my-2">Gerer mes annonces</a></li>

        <?php } ?>

        </ul>
        <ul class="list-unstyled components">



            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Villes</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="index.php?action=vannes">Vannes</a>
                    </li>
                    <li>
                        <a href="#">Lorient</a>
                    </li>
                    <li>
                        <a href="#">Autres</a>
                    </li>
                </ul>
            </li>
            <li>
     
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle">Activités</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">A Propos</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>



        <ul class="list-unstyled CTAs">





            <?php if(isset($_SESSION['pseudo'])) { ?>
            <li>
                <a href="index.php?action=moncompte" class="article">Mon compte</a>
                <?php } ?>
            </li>

            <li>

                <?php if(empty($_SESSION)) { ?>
                <a href="index.php?action=formLogin" class="article">CONNEXION</a>
                <?php } ?>
                <!-- deconnection -->

                <?php if(isset($_SESSION['pseudo'])) { ?>

                <a href="index.php?action=deco" class="article">Deconnexion</a>

                <?php } ?>
            </li>

            <a href="index.php?action=rgpd" class=" article my-4" >Protection des données</a>
        </ul>

    </nav>

    <!-- Page Content Holder -->


    <div class="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn active">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>



                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?action=home">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="input-group  my-4">
            <input class="form-control py-2 border-right-0 border" type="search"
                value="Recherchez un lieu , un theme ... " id="search">
            <span class="input-group-append">
                <button class="btn btn-outline-secondary border-left-0 border" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>