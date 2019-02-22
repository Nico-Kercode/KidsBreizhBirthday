<?php $title = "Kid's Breizh Birthday"; ?>

<?php ob_start(); ?>

<?php include('view\elements\nav.php');?>




<div class="container">

<h4>
    Bienvenue <em> <span><?= $_SESSION['pseudo']?></span>  </em>
</h4>

<?php if(isset($_SESSION['pseudo'])) { ?>

<img class="img-fluid" id="avatar" src="assets/img/<?= htmlspecialchars($_SESSION['avatar'])?>" alt="<?= htmlspecialchars($_SESSION['avatar'])?>">




<?php } ?>




</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>