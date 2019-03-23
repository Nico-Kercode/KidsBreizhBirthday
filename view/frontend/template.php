<!DOCTYPE html>
<html lang="fr">

<head>

    <meta name="Content-Type" content="UTF-8">
    <meta name="Content-Language" content="fr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description"
        content="Idees de lieux où fêter l'anniversaire de son enfant en Bretagne , Morbihan , Vannes , Lorients.">
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
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS + BOOTSTRAP + GOOGLE FONTS -->
    <link rel="stylesheet" type="text/css"
        href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Neucha" rel="stylesheet">

    <!-- COOKIES -->

    <link rel="stylesheet" type="text/css"
        href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>

    <script>
    window.addEventListener("load", function() {
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#000"
                },
                "button": {
                    "background": "#f1d600"
                }
            },
            "position": "top",
            "static": true,
            "content": {
                "message": "En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de Cookies .",
                "dismiss": "Acceptez !",
                "link": "En savoir plus",
                "href": "https://www.kidsbreizhbirthday.fr/index.php?action=rgpd"
            }
        })
    });
    </script>
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

    <!-- FOOTER -->
    <?php include('elements/footer.php');?>

</body>

</html>