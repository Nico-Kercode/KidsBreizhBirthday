<div class="wrapper">
    <!-- fermeture Wrapper -> template -->
    <!-- Sidebar Holder -->

    <nav id="sidebar" class="active">
        <div class="sidebar-header" id="Mainlogo">

            <a href="index.php?action=home"> <img src="assets\img\artworkIMG\logoGateau.png" class="img-fluid"
                    alt="logo Gateau"></a>
        </div>

        <!-- affichage de l avatar et du pseudo si session -->

        <?php if(isset($_SESSION['pseudo'])) { ?>
        <img class="img-fluid img-thumbnail " src="<?= htmlspecialchars($_SESSION['avatar'])?>"
            alt="<?= htmlspecialchars($_SESSION['avatar'])?>">
        <div class="d-block my-2" id="mbrNav">
            <h4> Bienvenue <em> <span><?=  ucfirst($_SESSION['pseudo'])?></span> </em>
            </h4>
        </div>
        <?php } ?>


        <!-- Affichage menu ajout annonce si rang = 1 'professionels' ou 2 'admin' + gestion infos utilisateurs -->

        <ul class="list-unstyled CTAs">
            <?php if (isset($_SESSION['rang']) && $_SESSION['rang'] == '1' || $_SESSION['rang'] == '2' ) { ?>
            <li class="d-block"><a href="index.php?action=ajoutAnnonce" class="article my-2 ">Ajouter une
                    annonce</a></li>
            <li class="d-block">
                <a href="index.php?action=moncompte" class="article">Gérer mes infomations</a>
            </li>
            <?php } ?>

            <!-- Menu administration rang 2 uniquement -->

            <?php if (isset($_SESSION['rang']) && $_SESSION['rang'] == '2') { ?>
            <li class="d-block"> <a href="index.php?action=admin&page=1" class="article my-2">Menu
                    d'administration</a>
            </li>
            <?php } ?>
        </ul>

        <!-- Liste bas sidebar -->


        <ul class="list-unstyled CTAs ">
            <li>
                <a href="#">A Propos</a>
            </li>
            <li>
            <a href="mailto:contact@kidsbreizhbirthday.fr">Contactez nous</A>
            </li>

            <!-- bouton Deconnexion si Session -->

            <li>
                <?php if(isset($_SESSION['pseudo'])) { ?>
                <a href="index.php?action=deco" class="article">Deconnexion</a>
                <?php } ?>
            </li>
        </ul> <!-- fin liste bas -->
    </nav> <!-- fin sidebar -->

    <!-- Page Content Holder \ fin sur template !!!  -->
    <div class="content">
        <!-- menu navbar -->

        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container-fluid">

                <!-- Collapse  bouton active & !active -->

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

                <!-- # fin -->


                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <div class=" mx-auto">
                        <a href="index.php?action=home"><img class="img-fluid  bandeau"
                                src="assets\img\artworkIMG\lettrage.png" alt="backHome"></a>
                        <p></p>
                    </div>
                    <ul class="nav navbar-nav mc-auto">
                        <!-- <li class="nav-item active">
                            <a class="nav-link home" href="index.php?action=home">ACCUEIL</a>
                        </li> -->

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link villes" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                               VILLES
                            </a> -->




                        <div class=" dropdown-menu-left dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?action=vannes&page=1">Vannes</a>
                            <a class="dropdown-item" href="index.php?action=lorient&page=1">Lorient</a>
                        </div>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Activités
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Interieur</a>
                                <a class="dropdown-item" href="#">Exterieur</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Les mieux notés</a>
                            </div>
                        </li> -->
                        <!-- si pas de session : bouton connexion -->

                        <?php if(empty($_SESSION)) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=formLogin"><span id="connexion">Connexion</span></a>
                        </li>
                        <?php } ?>
                        <!-- si session : ouverture side bar "mon compte" + script sur template  -->

                        <?php if(!empty($_SESSION)) { ?>
                        <li class="nav-item" id="menuCompte">
                            <a class="nav-link villes" href="#" id="moncompte"> <span id="onglet">MON</span> COMPTE</a>
                        </li>

                        <?php } ?>
                    </ul>
                </div>

            </div>
        </nav> <!-- # Fin navbar -->

        

        <!-- BARRE DE RECHERCHE  -->

        <form method="POST" action="index.php?action=search" class="input-group  my-2">
            <input class="form-control py-2 border-right-0 border" type="search" value="" name="searchbar" id="search"
                required>
            <span class="input-group-append">
                <button class="btn btn-outline-secondary border-left-0 border" name="submitSearch" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>

        </form>

        <div class="row">
            <div class="d-flex mx-auto" id="choixAccueil">
                <a class="ml-4" href="index.php?action=vannes&page=1">Secteur de Vannes</a>
                <a class="ml-4" href="index.php?action=lorient&page=1">Secteur de Lorient</a>
                <a class="ml-4" href="index.php?action=meilleurNote&page=1">Les mieux notés</a>
            </div>
        </div>