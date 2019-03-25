<?php $title = 'Annonce par ville : Lorient'; ?>
<?php ob_start(); ?>
<h1 class="text-center  h1annonces"> <span>L</span>ORIENT</h1>
<div class="container-fluid d-flex">
    <div class="row">
        <div class=" d-none d-md-block col-md-2">
        </div>
        <div class="col-sm-12 col-lg-8">
            <div class="row">
                <?php foreach ($annonces as $data) : ?>
                <div class="col-sm-5 offset-sm-1 mainAnnonces">
                    <!-- boucle affichage des annonces -->
                    <div class="row annonceHaut">
                        <div class="col-xs-8 col-sm-8 col-lg-8 titreAnnonce">
                            <a class=" text-left font-weight-bold p-4 "
                                href="index.php?action=annonce&id=<?= $data['id'] ?>&id_MEMBRES=<?= $data['id_MEMBRES']?>">
                                <h2 class="text-center h2annonces">
                                    <?= htmlspecialchars($data['titre']) ?>
                                </h2>
                            </a>
                        </div>
                        <div class="d-none d-sm-block col-sm-4 col-lg-4 ">
                            <img class="img-fluid  my-2" src="<?= $data['logo'] ?>" alt="logo">
                        </div>
                    </div>
                    <div class="row my-4">

                        <div class="mx-auto ">

                            <img class="img-fluid  img-thumbnail" src="<?= $data['photo1']?>" alt="Photo1">

                        </div>
                    </div>
                </div>
                <!-- END FOREACH -->
                <?php endforeach;?>


            </div>
        </div>
        <div class=" d-none d-md-block col-sm-2 ">
            <!-- widget meteo -->
            <div class="d-none d-sm-block mx-auto" id="widget_0d51ba51f3af50ac240bf89b2f00adbb">
                <span id="t_0d51ba51f3af50ac240bf89b2f00adbb">Météo Lorient</span>
                <span id="l_0d51ba51f3af50ac240bf89b2f00adbb"><a href="http://www.mymeteo.info/r/lorient_h">quel
                        temps
                        &agrave; Lorient</a></span>
                <script>
                (function() {
                    var my = document.createElement("script");
                    my.type = "text/javascript";
                    my.async = true;
                    my.src =
                        "https://services.my-meteo.com/widget/js?ville=20731&format=vertical&nb_jours=5&temps&icones&vent&coins&c1=393939&c2=a9a9a9&c3=e6e6e6&c4=ffdb5c&c5=00d2ff&c6=d21515&police=1&t_icones=1&x=160&y=537.5&d=0&id=0d51ba51f3af50ac240bf89b2f00adbb";
                    var z = document.getElementsByTagName("script")[0];
                    z.parentNode.insertBefore(my, z);
                })();
                </script>
            </div>
            <!-- widget meteo -->
        </div>
    </div>
    <!--  PAGINATION -->
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php 
                for($i=1; $i <= $nbDePage; $i++){
                    if( $_GET['page'] ==$i){

                    echo'<li class="page"><a class="page-link activePagination" href="index.php?action=lorient&page='.$i.'">'.$i."</a></li>";
                }else{
                    echo '<li class="page"><a class="page-link" href="index.php?action=lorient&page='.$i.'">'.$i."</a></li>";
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