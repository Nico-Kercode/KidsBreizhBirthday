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
        content="anniversaire enfant Bretagne Vannes Morbihan Lorient idée fête anniversaire où fêter un l'anniversaire de son enfant  ">
    <meta name="Subject" content="anniversaire enfant">
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
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- CSS + BOOTSTRAP + GOOGLE FONTS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Neucha" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navBarstyle.css">
    <link rel="stylesheet" href="assets/css/anim.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    
    <script src="assets\js\menuResponsive.js"></script>

    <script>
    $(function() {
        $('.response--main-navigation').basicResponsiveMenu({
            browserWidth: 960,
            slideDir: 'left',
            slideSpeed: 400
        });
    });
    </script>
</head>

<body>
    <!-- Include Nav Bar + Sidebar -->
    <?php include('view\elements\nav.php');?>

    <?= $content ?>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- Scripts -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/alert&like.js"></script>


    <!-- FOOTER -->
    <?php include('view\elements\footer.php');?>

</body>

</html>