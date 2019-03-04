<?php $title = 'Vannes'; ?>
<?php ob_start(); ?>




<h1 class="text-center my-4 h1annonces"> <span>V</span>ANNES</h1>



<?php
foreach ($annonces as $data) { ?>

<div class="container">
    <div class="col-sm-12" id="mainAnnonces">
        <!-- boucle affichage des annonces -->
        <div class="row" id="annonceHaut">

            <div class="d-none d-sm-block col-sm-4 col-lg-4 ">

                <img class="img-fluid img-thumbnail my-2" src="<?= $data['logo']?>" alt="logo">
            </div>

            <div class="col-xs-8 col-sm-8 col-lg-8 titreAnnonce">
                <a class=" text-left font-weight-bold p-4 "
                    href="index.php?action=annonce&id=<?= $data['id'] ?>&id_MEMBRES=<?= $data['id_MEMBRES']?>">
                    <h2>
                        <?= htmlspecialchars($data['titre']) ?>
                    </h2>
                </a>

            </div>
        </div>

        <div class="row my-4">

            <div class="mx-auto ">

                <img class="img-fluid  img-thumbnail" src="<?= $data['photo1']?>" alt="Photo1">

            </div>
        </div>
    </div>
</div>

<!-- END FOREACH -->
<?php
}
?>
<!--  -->


<!--  PAGINATION -->

<div class="row">
    <div class="col-sm-12 fixed-bottom">

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">

                <?php 
                    $page=$_GET['page'];
                    $pagesuivante=($_GET['page']+1);

                        if ($page !=1) { 
                         $pageprecedent = ($_GET['page']-1);

                         } else {
                             $pageprecedent= 1 ;
                             };                            
                             ?>
                <?php 
                for($i=1; $i <= $nbDePage; $i++){
                    if( $page ==$i){

                    echo'<li class="page-item"><a class="page-link" href="index.php?action=vannes&page='.$i.'">'.$i."</a></li>";
                }else{
                    echo '<li class="page-item"><a class="page-link" href="index.php?action=vannes&page='.$i.'">'.$i."</a></li>";
                }

                }                
                ?>
            </ul>
        </nav>

    </div>
</div>


<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>