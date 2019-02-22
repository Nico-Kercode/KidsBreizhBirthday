<!-- 
<div class="container-fluid"> -->
<nav class="navbar navbar-expand-lg navbar-fixed-top" id="nav">
    <a class="navbar-brand" href="index.php?action=accueil">KidsBreizhBirthday</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars "></i></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Menu 1 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
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