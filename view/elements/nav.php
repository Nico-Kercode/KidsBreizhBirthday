<header>
    <a href="index.php?action=accueil" id="logo">Kid's Breizh <br> Birthday</a>
    <div id="hamburger">
        <div id="hamburger-content">
            <nav>
                <ul>
                    <li><a href="#">menu1</a></li>
                    <li><a href="#">menu2</a></li>
                    <li><a href="#">menu3</a></li>
                    <li><a href="#">menu4</a></li>
                </ul>
            </nav>
            <?php if(isset($_SESSION['pseudo'])) { ?>

            <p class="button"> Bienvenue <em> <span ><?= $_SESSION['pseudo']?></span> </em>  <a href="index.php?action=deco">DECONNEXION</a></p>

            

                


            <?php } ?>


            <?php if(empty($_SESSION)) { ?>

            <a href="index.php?action=formRegister" class="button button-sign-up">S'inscrire</a>
            <a href="index.php?action=formLogin" class="button button-sign-in">Se connecter</a>
            <?php } ?>
        </div>
        <button id="hamburger-button">&#9776;</button>
        <div id="hamburger-sidebar">
            <div id="hamburger-sidebar-header"></div>
            <div id="hamburger-sidebar-body"></div>
        </div>
        <div id="hamburger-overlay"></div>
    </div>
</header>