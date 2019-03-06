<?php $title = 'Administration'; ?>
<?php ob_start(); ?>



<div class="container">
    <h1 class="text-center my-4 h1annonces"> <span>A</span>dministration</h1>
<a href="index.php?action=admin&page=1">Retour</a>
    <div class="col-sm-12 admin">

        <h2 class="text-center">Liste des Membres Inscrits</h2>
        <div class="row">
            <?php
foreach ($getMembres as $data) { ?>
            <div class="col-sm-6">

                <?php if($data['rang'] == '0') {
            $rang='Membre';
        }
        elseif($data['rang'] == '1') {
            $rang='Prestataire';

        }
        elseif($data['rang'] == '2') {
            $rang='ADMINISTRATEUR';

        } ?>


                <p class="list"> Pseudo :
                    <?= $data['pseudo'].'<br>  Email  : '.$data['email'].'<br>   Date d\'inscription :  '.$data['date_inscription']?>
                    <br>Rang : <?= $rang ?> <br>
                    <br> </p>
            </div>

            <!-- END FOREACH -->
            <?php
}
?>

        </div>
    </div>
    <!--  -->


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
                for($i=1; $i <= $nbDePageMembre; $i++){
                    if( $page ==$i){

                    echo'<li class="page-item"><a class="page-link" href="index.php?action=adminmembres&page='.$i.'">'.$i."</a></li>";
                }else{
                    echo '<li class="page-item"><a class="page-link" href="index.php?action=adminmembres&page='.$i.'">'.$i."</a></li>";
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