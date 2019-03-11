  <div class="col-sm-12 header d-flex">
      <div class="mx-auto my-auto">
          <a href="index.php?action=home"><img class="img-fluid" src="assets\img\artworkIMG\lettrage3.png"
                  alt="backHome"></a>
      </div>
  </div>


  <nav class="response--main-navigation">
      <ul class="response--site-menu">

          <li><a href="index.php?action=home">Accueil</a></li>

          <?php if (isset($_SESSION['rang']) && $_SESSION['rang'] == '2') { ?>
          <li><a href="index.php?action=admin&page=1">Menu d'administration</a></li>
          <?php } ?>

          <?php if(isset($_SESSION['pseudo'])){?>
          <li><a href="index.php?action=moncompte">Mon compte</a></li>
          <?php }?>


          <li><a href="index.php?action=ajoutAnnonce">Ajouter une annonce</a></li>


          <?php if(empty($_SESSION)) { ?>
          <li><a href="index.php?action=formLogin">Connexion</a></li>
          <?php } ?>
          <?php if(isset($_SESSION['pseudo'])) { ?>
          <li><a href="index.php?action=deco">Deconnexion</a></li>
          <?php } ?>

      </ul>
  </nav>

  <div class="row">
      <div class="col-sm-8 offset-sm-2 my-4">

      </div>
  </div>

  <div class="row">
      <!-- BARRE DE RECHERCHE  -->

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

  <div class="row">

      <div class="d-flex mx-auto" id="choixAccueil">
          <a class="ml-4" href="index.php?action=vannes&page=1">Secteur de Vannes</a>
          <a class="ml-4" href="index.php?action=lorient&page=1">Secteur de Lorient</a>
          <a class="ml-4" href="index.php?action=meilleurNote">Les 10 mieux notés</a>


          <a class="ml-4" href="index.php?action=monPanier&id_MEMBRES=<?= $_SESSION['id'] ?>">Ma selection</a>

      </div>

  </div>