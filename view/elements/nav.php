<!-- 
<div class="container-fluid"> -->
<nav class="navbar navbar-expand-lg navbar-fixed-top" id="nav">
    <a class="navbar-brand" id="logo" href="index.php?action=home"><img class="img-fluid w-75" src="assets\img\logo.png"
            alt="Banniere1"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars "></i></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Themes
                </a>
                <div class="dropdown-menu" id="menuDeroulant" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Activités</a>
                    <a class="dropdown-item" href="#">Restaurants</a>
                    <a class="dropdown-item" href="#">Parc</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Autres </a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Villes
                </a>
                <div class="dropdown-menu" id="menuDeroulant" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Vannes</a>
                    <a class="dropdown-item" href="#">Lorient</a>
                    <a class="dropdown-item" href="#">#</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Autres</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Classement
                </a>
                <div class="dropdown-menu" id="menuDeroulant" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Dompteurs</a>
                    <a class="dropdown-item" href="#">Zoos</a>
                    <a class="dropdown-item" href="#">Chasseurs</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Autres témoignages</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item ">
                <?php if(empty($_SESSION)) { ?>
                <a class="nav-link" href="index.php?action=formLogin">CONNEXION</a>
                <?php } ?>
                <?php if(isset($_SESSION['pseudo'])) { ?>
                <a class="nav-link" href="index.php?action=deco">Deconnexion</a>
                <?php } ?>
            </li>
        </ul>

    </div>
</nav>

</div>