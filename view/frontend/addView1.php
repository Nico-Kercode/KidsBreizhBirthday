<?php $title = 'Vannes'; ?>
<?php ob_start(); ?>
<?php include('view\elements\nav.php')?>



<h1 class="text-center">VANNES</h1>
<div class="container-fluid">
    <div class="row">
        <!-- <a class="down scroll" href="#"> <img src="assets\images\bas.png" alt="bas" width="30px"> Bas de page </a> -->
        <div class="col-sm-12 ">

            <?php
    while ($data = $annonces->fetch())
    {
    ?>  


            <p>
                <?= htmlspecialchars($data['ville']) ?>
            </p>

            

            <h2>
                <?= htmlspecialchars($data['titre']) ?>
            </h2>

            <img src="<?=$data['logo'] ?>" alt="logo">

        
            <p>
                <?= nl2br(htmlspecialchars($data['contenu'])) ?>
            </p>





        </div>


        <?php

    }  

    ?>

    </div>

</div>



















<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>