<?php $title = 'Error View'; ?>
<?php ob_start(); ?>



<div class="container">
    <div class="row">
        <div class="col-sm-12 my-4 ">
        <h1 class="bg-danger text-center p-2"><?php echo $errors;?></h1>
        <img class="img-fluid w-25 mx-auto my-auto" src="assets\img\artworkIMG\alert.png" alt="Alert">
            
        </div>
    </div>
</div>








<?php $content = ob_get_clean(); ?>


<?php require("view\\frontend\\template.php"); ?>