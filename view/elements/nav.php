<div id="wrapper" class="animate">
    <form class="form-inline" method="post" action="" />
    <button class="btn btn-outline-dark " type="submit">Rechercher</button>
    <input class="form-control search w-25" type="search" placeholder="Rechercher" aria-label="Search">

    

    </form>
    <nav class="navbar header-top fixed-top navbar-expand-lg id=" navbar" ">
        <span class=" navbar-toggler-icon
        leftmenutrigger"></span>
        <a class="navbar-brand" href="#">LOGO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav animate side-nav">

                <?php if(isset($_SESSION['pseudo'])) { ?>

                <h4> Bienvenue <em> <span><?= $_SESSION['pseudo']?></span> </em></h4>

                <?php } ?>


                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=accueil">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Side Menu Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>

            <!-- MENU PRINCIPAL -->

            <ul class="navbar-nav ml-md-auto d-md-flex">
                <?php if(empty($_SESSION)) { ?>
                <li class="nav-item">

                    <a class="nav-link" href="index.php?action=formLogin">CONNEXION</a>

                    <?php } ?>
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php if(isset($_SESSION['pseudo'])) { ?>
                <p class="p-2"> Bienvenue <em> <span><?= $_SESSION['pseudo']?></span> </em></p>
                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="#"> menu
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Top Menu Items</a>
                </li>
                <?php if(isset($_SESSION['pseudo'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=deco">Deconnexion</a>
                </li>
                <!-- Fin php session -->
                <?php } ?>
            </ul>
        </div>
    </nav>
</div>