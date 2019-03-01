<div class="wrapper ">
    <!-- Sidebar Holder -->

   
        
        <nav id="sidebar" class="active">
            

            <div class="sidebar-header" id="Mainlogo">

                <a href="index.php?action=home"> <img src="assets\img\artworkIMG\logoGateau.png" class="img-fluid"
                        alt="logo Gateau"></a>

                <!-- <a href="index.php?action=home">Kid's <br> <span class="tabulation2">BreiZH </span>
                    <span class="tabulation">Birthday </span></a> -->
            </div>




            <?php if(isset($_SESSION['pseudo'])) { ?>

            <img class="img-fluid "src="<?= htmlspecialchars($_SESSION['avatar'])?>"
                alt="<?= htmlspecialchars($_SESSION['avatar'])?>">


            <div class="d-block my-2" id="mbrNav">
                <h4> Bienvenue <em> <span><?=  ucfirst($_SESSION['pseudo'])?></span> </em>
                </h4>
            </div>
            <!-- <li class="d-block"><a href="index.php?action=moncompte">Mon compte</a></li> -->
            <!-- <li class="d-block"><a href="index.php?action=deco">Deconnexion</a></li> -->
            <?php } ?>


            <!-- Affichage gestion des annonces si rang = 1 (professionels) ou 2 (admin)-->

            <ul class="list-unstyled CTAs">
                <?php if (isset($_SESSION['rang']) && $_SESSION['rang'] == '1' || $_SESSION['rang'] == '2' ) { ?>
                <li class="d-block"><a href="index.php?action=ajoutAnnonce" class="article my-2 ">Ajouter une
                        annonce</a></li>

                <li class="d-block">
                    <a href="moncompte"  class="article">Mon compte</a>
                    <!-- <H5 >Mon compte</H5> -->
                </li>

                <?php } ?>

                <?php if (isset($_SESSION['rang']) && $_SESSION['rang'] == '2') { ?>

                <li class="d-block"> <a href="index.php?action=admin" class="article my-2">Menu
                        d'administration</a>
                </li>

                <?php } ?>






            </ul>
            <ul class="list-unstyled components">



               
                
                <li>
                    <a href="#">A Propos</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>


            <ul class="list-unstyled CTAs ">


                <li>

                    <?php if(isset($_SESSION['pseudo'])) { ?>

                    <a href="index.php?action=deco" class="article">Deconnexion</a>

                    <?php } ?>
                </li>


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
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>


                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php?action=home">Accueil</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Villes
                                </a>
                                <div class=" dropdown-menu-left dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="index.php?action=vannes">Vannes</a>
                                    <a class="dropdown-item" href="#">Lorient</a>
                                    
                            </li>
                            <li class="nav-item dropdown">
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
                            </li>

                            <?php if(empty($_SESSION)) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=formLogin" class="article">Connexion</a>
                            </li>
                            <?php } ?>

                            <?php if(!empty($_SESSION)) { ?>
                                <li class="nav-item">
                                <a class="nav-link" href="#" class="article" id="moncompte">Mon compte</a>
                            </li>

                            <?php } ?>
                        </ul>
                    </div>

                </div>
            </nav>



            <!-- BARRE DE RECHERCHE  -->
            <form method="POST" action="index.php?action=search" class="input-group  my-2">
                <!-- <div class="input-group  my-2"> -->

                <input class="form-control py-2 border-right-0 border" type="search" value="" name="searchbar"
                    id="search" required>
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary border-left-0 border" name="submitSearch" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>

            </form>
            <!-- </div> -->