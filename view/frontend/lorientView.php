<?php $title = 'Lorient'; ?>
<?php ob_start(); ?>




<h1 class="text-center my-4 h1annonces"> <span>L</span>ORIENT</h1>


<div class="container">
    <div class="row">

        <?php foreach ($annonces as $data) { ?>


        <div class="col-sm-6 " id="mainAnnonces">
            <!-- boucle affichage des annonces -->
            <div class="row" id="annonceHaut">



                <div class="col-xs-8 col-sm-8 col-lg-8 titreAnnonce">
                    <a class=" text-left font-weight-bold p-4 "
                        href="index.php?action=annonce&id=<?= $data['id'] ?>&id_MEMBRES=<?= $data['id_MEMBRES']?>">
                        <h2 class="text-center h2annonces">
                            <?= htmlspecialchars($data['titre']) ?>
                        </h2>
                    </a>

                </div>
                <div class="d-none d-sm-block col-sm-4 col-lg-4 ">

                    <img class="img-fluid  my-2" src="assets\img\artworkIMG\garcon.png" alt="logo">
                </div>
            </div>
            <!-- <?= $data['logo']?> -->

            <div class="row my-4">

                <div class="mx-auto ">

                    <img class="img-fluid  img-thumbnail" src="<?= $data['photo1']?>" alt="Photo1">

                </div>
            </div>
        </div>


        <!-- END FOREACH -->
        <?php
}
?>
    </div>
</div>
<!--  -->


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

                    echo'<li class="page-item"><a class="page-link" href="index.php?action=lorient&page='.$i.'">'.$i."</a></li>";
                }else{
                    echo '<li class="page-item"><a class="page-link" href="index.php?action=lorient&page='.$i.'">'.$i."</a></li>";
                }

                } // END FOR PAGINATION              
                ?>
            </ul>
        </nav>

    </div>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>