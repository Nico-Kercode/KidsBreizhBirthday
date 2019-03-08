<?php $title = "Enregistrement d'un Utilisateur"; ?>

<?php ob_start(); ?>




<div class="news container">
    <a class=" down scroll" href="#"> <img src="assets\images\bas.png" alt="bas" width="30px"> Bas de page </a>
    <h1>Gestion de vos annonces </h1>


    <?php
    while ($data = $annonces->fetch())
    {
    ?>

    <h3>
        <?= htmlspecialchars($data['title']) ?>
        <em>le <?= $data['creation_date'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($data['content'])) ?>
    </p>

    <div class="row">

        <div class="col-md-6">

            <form class="form-control p-1" role="form" id="commBtn" method="POST"
                action="index.php?action=comment&id=<?= $data['id'] ?>">
                <button id="comBtn" name="comm">Commentaires</button>

            </form>

        </div>



        <div class="col-md-6">
            <form class="form-control p-1" role="form" id="suppButon" method="POST"
                action="index.php?action=supp&id=<?= $data['id']?>">
                <!-- masque bouton supprimer si non admin -->

                <?php if(isset($_SESSION['rang']) && $_SESSION['rang'] ==  '1') { ?>

                <button id="myBtn" name="supp">supprimer</button>
                <?php } ?>
            </form>


        </div>

    </div>


    <?php

    }  

    ?>

    <a class=" up scroll" href="#"> <img src="assets\images\haut.png" alt="haut" width="30px"> Haut de page </a>

</div>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>