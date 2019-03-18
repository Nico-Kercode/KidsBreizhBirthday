<!DOCTYPE html>
<html lang="fr">

<head>

    <meta name="Content-Type" content="UTF-8">
    <meta name="Content-Language" content="fr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="sélection de lieux où fêter un anniversaire pour son enfant en Bretagne .
    Idées de lieux où fêter l'anniversaire de son enfant en Bretagne , Morbihan , Vannes , Lorients.">
    <meta name="Keywords"
        content="anniversaire enfant Bretagne - Vannes Morbihan Lorient idée fête anniversaire où fêter un l'anniversaire de son enfant  ">
    <meta name="Subject" content="anniversaire enfant bretagne">
    <meta name="Author" content="nicolas hubert">
    <meta name="Publisher" content="nicolas hubert">
    <meta name="Identifier-Url" content="hhtp://www.kidsbreizhbirthday.fr">
    <meta name="Reply-To" content="contact@kidsbreizhbirthday.fr">
    <meta name="Revisit-After" content="15 days">
    <meta name="Robots" content="all">
    <meta name="Rating" content="general">
    <meta name="Distribution" content="global">
    <meta name="Geography" content="Vannes, France, 56000">
    <meta name="Category" content="family">
    <title><?= $title ?></title>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
    <!-- CSS + BOOTSTRAP + GOOGLE FONTS -->
    <link rel="stylesheet" type="text/css"
    href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navBarstyle.css">
    <link rel="stylesheet" href="assets/css/anim.css">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Neucha" rel="stylesheet">
</head>

<body>

    <!-- Include Nav Bar + Sidebar -->
    <?php include('elements/nav.php');?>



    <?= $content ?>



    <!-- Scripts -->

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/jquery.slider.js"></script>
    <script src="assets/js/menuResponsive.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
    $.validate({
        lang: 'fr',
        modules: 'file'
    }); -->
    <!-- </script> -->
    <!-- COOKIES -->
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script>
    window.addEventListener("load", function() {
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#ffdb5c",
                    "text": "#2e4eec"
                },
                "button": {
                    "background": "#ffe15c",
                    "text": "#2e4eec"
                }
            },
            "position": "bottom-right",
            "content": {
                "message": "En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de Cookies .",
                "dismiss": "Acceptez !",
                "link": ""
            }
        })
    });
    </script>

    <!-- FOOTER -->
    <?php include('elements/footer.php');?>

</body>

</html>