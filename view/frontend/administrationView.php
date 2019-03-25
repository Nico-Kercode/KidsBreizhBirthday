<?php $title = 'Administration'; ?>
<?php ob_start(); ?>



<div class="container">
    <h1 class="text-center my-4 h1annonces"> <span>A</span>dministration</h1>

    <a class="reportBtn" href="index.php?action=adminmembres&page=1">Gestion des membres</a>

    <div class="col-sm-12 admin">
        <h2 class="text-center my-4">Messages Signalés : </h2>
        <div class="row">

            <?php foreach ($getReports as $rep) : ?>

            <div class="col-sm-6">
                <p class="list">
                    id du commentaire : <?= $rep['id_COMMENTAIRES']?> <br>
                    id de l'annonce : <?= $rep['id_ANNONCES']?> <br>
                    Titre de l'annonce : <a
                        href="index.php?action=annonce&id=<?= $rep['id_ANNONCES']?> "><?= $rep['titre']?></a> <br>
                    Auteur : <?= $rep['pseudo']?> <br>
                    Commentaire : <?= $rep['contenu']?> <br>
                    signalé : <?= $rep['report']?> fois
                    <br> <br>

                    <a href="index.php?action=editForm&id=<?= $rep['id_COMMENTAIRES'] ?>&id_ANNONCES=<?= $rep['id_ANNONCES']?>"
                        class="reportBtn mx-4">EDITER</a>

                    <a href="index.php?action=delete&id=<?= $rep['id_COMMENTAIRES'] ?>"
                        class="reportBtn mx-4">SUPPRIMER</a>
                    </h3>

                </p>
            </div>
            <?php endforeach; ?>
            <!-- ROW -->
        </div>
       <!--  -->
    </div>
    <!--  PAGINATION -->
    <div class="row">
        <div class="col-sm-12 mt-4 fixed-bottom">

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

                    echo'<li class="page-item"><a class="page-link" href="index.php?action=admin&page='.$i.'">'.$i."</a></li>";
                }else{
                    echo '<li class="page-item"><a class="page-link" href="index.php?action=admin&page='.$i.'">'.$i."</a></li>";
                }

                } // END FOR PAGINATION              
                ?>
                </ul>
            </nav>

        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>