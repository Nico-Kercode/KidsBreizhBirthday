-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 25 mars 2019 à 09:03
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kbb_v1`
--

-- --------------------------------------------------------

--
-- Structure de la table `alert`
--

CREATE TABLE `alert` (
  `id` int(11) NOT NULL,
  `id_MEMBRES` int(11) NOT NULL,
  `id_ANNONCES` int(11) NOT NULL,
  `id_COMMENTAIRES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alert`
--

INSERT INTO `alert` (`id`, `id_MEMBRES`, `id_ANNONCES`, `id_COMMENTAIRES`) VALUES
(23, 1, 146, 33);

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `presentation` text NOT NULL,
  `descriptif` text NOT NULL,
  `contact` text NOT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `id_MEMBRES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `ville`, `logo`, `titre`, `presentation`, `descriptif`, `contact`, `photo1`, `photo2`, `id_MEMBRES`) VALUES
(1, 'vannes', 'assets/img/webFiles/3885166logo.png', 'YAKAPARK', 'Le YakaPark est un parc de jeux couvert climatisé accueillant les enfants de 1 à 12 ans.\r\nLe Parc est constitué de 2 structures de jeux où les enfants peuvent s\'amuser en toute sécurité.\r\nPour le plaisirs de vos enfants et de leurs amis, nous organisons également leurs anniversaires. ', '3 Formules au choix \r\n Nos formules intègrent la réservation et la décoration de la table, un accès aux espaces de jeux, les boissons.\r\nVous apportez seulement le gâteau et les bonbons !!!\r\nNous mettons à disposition un animateur et ou animatrice au moment de fêter l\'anniversaire de votre enfant.\r\nDroit d\'entrée à partir du 3ème adultes de 1,70 €\r\n( minimum 6 enfants )\r\n\r\n', 'Comment faire pour réserver un anniversaire ?\r\nPar tél : 02 97 63 80 68 au heures d\'ouvertures du Parc\r\nou\r\nau 06 08 91 15 22 du mardi au vendredi de 10h00 à 18h00\r\nmartine@domainedeyaka.com\r\n', 'assets/img/webFiles/9926493photoyka.PNG', 'assets/img/webFiles/4815439yaka.PNG', 1),
(119, 'vannes', 'assets\\img\\artworkIMG\\logos\\foretAdrenaline.png', 'Foret Adrenaline', 'Forêt Adrénaline vous propose de 1h30 à 3h30 d’activité.  Dès 2 ans, profitez de 15 parcours aventures et 1 parcours filet à 17m de haut.\r\nMise à disposition d’un espace pour organiser vous-même goûter ou pique-nique. \r\n', 'Envie d’un anniversaire unique ? Notre équipe vous propose des prestations personnalisées !\r\no	3 à 4 parcours aventure avec baudrier pendant 2h30.\r\n(habillage et briefing inclus).\r\nAventure ESCALADE\r\n30 min sur le bloc d’escalade animé par un membre de l’équipe Forêt Adrénaline.\r\nAventure DUEL\r\n30 min de Challenge animé sur le parcours Duel : deux équipes s’affrontent en course relais sur deux parcours identiques en parallèle. Chaque équipe peut déstabiliser son adversaire.\r\n\r\n', 'Adresse : Fontainebleau, 56340 Carnac\r\nTéléphone : 02 90 84 00 20', 'assets/img/webFiles/8540843foret.PNG', 'assets/img/webFiles/2754420foret2.PNG', 1),
(120, 'vannes', 'assets\\img\\artworkIMG\\logos\\jumpSession.png', 'Jump Session 56', 'Venez jumper et vous amuser, chez Jump Session, le trampoline parc intérieur à Vannes. Profitez des activités sur trampolines et de l\'espace restauration.', 'Souffler ses bougies chez Jump’ Session\r\nPlus besoin de se torturer l’esprit pour trouver une idée originale pour fêter l’anniversaire de votre enfant, Jump’ Session s’occupe de tout ! Nous préparons une journée pleine de rebondissements pour votre enfant et tous ses amis. Une manière ludique et atypique de fêter son anniversaire, tout en variant les activités : balle au prisonniers, basket, ou encore baby-foot. Le trampoline parc est à eux !\r\n', ' Ouverture\r\nDe 7 à 77 ans\r\nLundi 12h – 20h\r\nMardi Fermé\r\nMercredi 12h – 20h\r\nJeudi 12h – 22h\r\nVendredi 12h – 22h\r\nSamedi 10h – 22h\r\nDimanche 10h – 20h\r\nVacances scolaires :\r\nTOUS les jours dès 10h\r\n18 r. aristide Boucicaut 56000 VANNES 02 90 73 55 26', 'assets/img/webFiles/3946949tof1.jpg', 'assets/img/webFiles/4248728tof2.jpg', 1),
(121, 'vannes', 'assets/img/webFiles/6366836logoPatinoire.png', 'Patinoire de Vannes', 'Patinoire de VANNES \r\nPremière option : dans la cafétéria\r\n- Vous pouvez faire votre réservation directement à la patinoire, par mail direction@patinium.com ou nous téléphoner au 0297409123.\r\nVous pouvez choisir :\r\n- un ou plusieurs gâteaux (gâteaux chocolat, crumble pommes...)\r\n- choisir une décoration (nappe, gobelets, ballons…) \r\n- choisir des boissons individuelles, grandes bouteilles (coca, Fanta,... selon disponibilité) et carafes\r\n', 'Deuxième option : espace chalet en bord de piste\r\n- Vous pouvez faire votre réservation directement à la patinoire, par téléphone au 0297409123 ou par mail direction@patinium.com\r\n- Vous apportez vos consommations et vos décorations (bougies et alcool interdits).\r\n9,70€ par personne (avec location de patins)\r\n', 'Patinoire de Vannes,\r\n 6 rue Georges CALDRAY, \r\n56000 Vannes \r\n0297409123 \r\ndirection@patinium.com', 'assets/img/webFiles/9418418anniv.jpg', 'assets/img/webFiles/6641098patin.PNG', 1),
(122, 'vannes', 'assets\\img\\artworkIMG\\logos\\kart.png', 'KART 56', '\r\nUn anniversaire inoubliable au Karting de Ploemel\r\n \r\nAge requis : à partir de 3 ans\r\nNotre équipe organise pour vos enfants des goûters d\'anniversaire (ou autres occasions)le mercredi après-midi.\r\n', '\r\nCet après-midi comporte:\r\n- Des séances de kart de 10 minutes. Encadrement et Sécurité assurés par nos moniteurs diplômés BP JEPS.\r\n- Mise à disposition d\'un barnum pour le goûter. Vous pouvez apporter gâteaux, friandises et boissons.\r\nTarif:  14 € TTC par enfant avec un minimum de 5 enfants (gratuité totale pour l\'enfant qui fête son anniversaire).\r\nPour les 3-6 ans : session habituelle et possibilité de goûter dans le barnum si disponible.', 'Contactez-nous au 02 97 56 71 71 ou par mail : info@kart56.fr\r\n\r\nZA, La Madeleine, \r\n56400 Ploemel', 'assets/img/webFiles/6251685photo0.jpg', 'assets/img/webFiles/71577photo1.jpg', 1),
(123, 'vannes', 'assets\\img\\artworkIMG\\logos\\kingoland.png', 'KINGOLAND', '\r\nKingoland est un parc d\'attractions français situé à Plumelin, en bord de la RN24 dans le Morbihan, ouvert le 19 avril 2014.', 'Conditions de réservation:\r\n•	L’offre est strictement réservée aux enfants jusqu’à 14 ans\r\n•	Les anniversaires ne sont pas fêtés les dimanches et les jours fériés\r\n•	Un minimum de 5 enfants payants est demandé\r\n•	Les enfants sont sous la responsabilité des accompagnateurs durant l’anniversaire\r\n•	Offre non cumulable avec les offres en cours, offres partenaires, offres groupes, Carte Pass,…\r\n', 'Lieu dit, Locminé, \r\nPondigo, \r\n56500 Plumelin', 'assets/img/webFiles/3139482tof3.jpg', 'assets/img/webFiles/4933878tof2.jpg', 1),
(124, 'vannes', 'assets/img/webFiles/1664709logo.png', 'Land aux Lutins', '\r\nIdéalement situé entre Vannes et Lorient, le parc de loisirs Land aux Lutins propose un parcours acrobatique dans les arbres - en toute sécurité - grâce à des filets tendus ! \r\nEntre ciel et terre, les aventuriers vont adorer flâner au-dessous de la canopée !', 'Tu as envie de fêter ton anniversaire ? Viens t\'amuser avec tes ami(e)s dans nos filets, jouer les aventuriers dans nos villages de cabanes, et partez ensemble à la recherche du trésor...\r\n Nous offrons l\'entrée au parc à l\'enfant qui fête son anniversaire à partir de 5 entrées payantes.\r\n Des tables de pique nique sont à votre disposition dans le parc, libre à vous d\'organiser le goûter comme vous le souhaitez (nous vous mettons un tampon à l\'entrée du parc afin de pouvoir faire des aller-retour ', 'Land aux Lutins\r\nBranzeho\r\n56690 LANDAUL\r\n', 'assets/img/webFiles/48874tof1.jpg', 'assets/img/webFiles/5603587tof2.jpg', 1),
(125, 'vannes', 'assets/img/webFiles/8283565logo.png', 'Piscine Aquagolfe', '\r\nOuvert en 2010, AQUAGOLFE, réalisation de la Communauté d’Agglomération de Vannes, est un centre aquatique de nouvelle génération, et un véritable espace  de vie dédié toute l’année au sport, à la détente et aux loisirs pour toute la famille. L’été, c’est aussi, grâce à ses vastes espaces extérieurs, une destination plaisir pour les touristes et les amoureux de la détente en plein air, en quête des joies de la baignade, quelle que soit la météo, dans une eau à température idéale .', 'VIENS FÊTER TON ANNIVERSAIRE À LA PISCINE !\r\nTu as entre 4 et 12 ans …\r\n… viens fêter ton anniversaire avec tes meilleurs amis et nos animateurs !\r\nJeux, goûter, cadeau… tout est prévu !\r\nCette prestation comprend : l’accueil des enfants, l’organisation d’un goûter avec un délicieux gâteau, une salle décorée pour l’occasion, un cadeau, 3/4 d’heure d’animations dans l’eau encadrés par un maître-nageur, et une heure de baignade libre.\r\nUn minimum de 8 enfants par anniversaire est demandé.\r\n', 'Aquagolfe - Centre Aquatique Vannes Agglo\r\nMotten Graetal \r\n56450 Surzur\r\n02 97 42 05 33\r\n', 'assets/img/webFiles/7553048piscine.jpg', 'assets/img/webFiles/935360piscine2.jpg', 1),
(126, 'vannes', 'assets/img/webFiles/6031156logo.jpg', 'Escape Game Hotel Evasion ', 'Venez percer les mystères de l\'Escape Game Hotel Evasion : 1h d\'aventure entre amis, collègues ou en famille. Ouvert 7j/7 .\r\n\r\nIl n\'y a pas que les grands qui peuvent résoudre les énigmes d\'un escape-game. La preuve... Pour les anniversaires, l\'hôtel Évasion, rue de Saint-Tropez, à Vannes, adapte l\'une de ses salles aux enfants à partir de 10 ans (l\'idéal est d\'avoir un accompagnateur).', 'A eux de remonter l\'histoire de Vannes, de relever les défis pour pouvoir sortir... « Ensuite, généralement, ils enchaînent avec une session de jeux en réalité virtuelle (dès 8 ans) avant de se retrouver autour d\'un verre de grenadine offert. Les parents peuvent apporter le gâteau. » Compter une dizaine d\'euros par enfant (six maximum) pour une heure environ d\'escape-game. ', '10 Rue Saint-Tropez, \r\n56000 Vannes\r\nTél. 07 68 55 51 44.', 'assets/img/webFiles/56454tof1.jpg', 'assets/img/webFiles/8880985tof2.jpg', 1),
(127, 'vannes', 'assets\\img\\artworkIMG\\logos\\logo-vannes.png', 'Patrimoine de Vannes', 'Pour ton anniversaire, invite tes ami(e)s pour une activité ludique, insolite et historique dans la ville de Vannes.\r\n\r\nDevenez détectives du patrimoine et menez une enquête dans la ville pour trouver la surprise finale ! Serez-vous assez forts pour résoudre toutes les énigmes et surmonter les épreuves ? Un guide-conférencier vous aidera dans votre aventure…\r\n', 'Modalités :\r\nLes mercredis et samedis sur réservation, sous réserve de disponibilité.\r\nLe mercredi jusqu’à 17h30, une salle est à disposition pour le goûter. Le gâteau d’anniversaire, les boissons, la décoration et la vaisselle (de préférence jetable) sont à la charge des parents.\r\nLa salle doit être rendue dans l’état initial.\r\n\r\nDurée de l’atelier (hors goûter) : 2h\r\nLa présence d’au moins un adulte accompagnateur est indispensable durant l’atelier pédagogique et le goûter.\r\n\r\n', 'Renseignements et réservations :\r\nService musées-patrimoine \r\nLes Lavoirs\r\n02.97.01.64.00\r\npatrimoine@mairie-vannes.fr\r\n', 'assets/img/webFiles/80156321.jpg', 'assets/img/webFiles/900118photo2.jpg', 1),
(128, 'vannes', 'assets\\img\\artworkIMG\\logos\\lasergame.png', 'LASER GAME EVOLUTION', 'Le Laser Game Evolution est une simulation de tir où plusieurs joueurs s\'affrontent pour gagner le maximum de points en touchant le plus possible les autres participants !\r\nVenez défier vos amis dans un environnement à la fois obscur et déroutant, constitué de cloisons, de zones réfléchissantes, d\'obstacles en tous genres. ', 'Le pack anniversaire comprend :\r\n\r\n- 3 parties de 20 minutes dans un labyrinthe privatisé\r\n- 1 table dressée\r\n- Boissons à volonté\r\n- Un gâteau (Brownie)\r\n- Bonbons\r\n- Carton d\'invitation (à venir chercher sur place)', '1 Rue Simone de Beauvoir, \r\n56890 Plescop', 'assets/img/webFiles/2319409tof1.jpg', 'assets/img/webFiles/5512133image1.jpg', 1),
(129, 'vannes', 'assets\\img\\artworkIMG\\logos\\minigolf.png', 'Mini-golf de l’aquarium', 'Vos enfants ont entre 4 et 12 ans et vous souhaitez leur offrir un anniversaire original ?\r\nVenez le fêter au mini-golf de l’aquarium !\r\nAu programme : une activité de plein air avec les copains, une crêpe–party et des cadeaux !\r\n', 'La formule anniversaire\r\nCette formule comprend :\r\n•	les cartons d’invitation personnalisés pour venir fêter l’anniversaire au Mini-Golf de l’Aquarium\r\n•	l’accès pour une partie sur le parcours du Mini-Golf\r\n•	un cadeau offert par l’Aquarium à l’enfant dont c’est l’anniversaire\r\n•	les brochettes de bonbons, crêpe-party à volonté et les boissons, le tout servi au Croc’n’Golf , incluant tout le nécessaire pour accueillir au mieux ses invités : assiettes, couverts, verres et serviettes\r\n', 'Vous souhaitez davantage d’informations,\r\n faire une réservation,\r\n contactez-nous :\r\n02 97 40 22 08 \r\nou\r\n contact@aquariumdevannes.fr\r\n', 'assets/img/webFiles/3105336golf1.jpg', 'assets/img/webFiles/7891910golf2.jpg', 1),
(130, 'vannes', 'assets\\img\\artworkIMG\\logos\\speedpark-vannes.png', 'SPEED PARK ', 'SpeedPark est un complexe de loisirs offrant un concept unique en France : une multitude d\'activités indoor. Bowling, Karting, Laser, Billard, Jeux vidéo et Bar ...', 'Fêtez l\'anniversaire de vos enfants au SpeedPark de Vannes. 3 formules au choix à partir de 12 euros par personnes.\r\n', ' ZAC de Parc Lann, \r\n4 Rue Aristide Boucicaut, \r\n56000 Vannes', 'assets/img/webFiles/9411756tof1.jpg', 'assets/img/webFiles/629803photo2.jpg', 1),
(131, 'vannes', 'assets\\img\\artworkIMG\\logos\\cinema.png', 'Cineville de Vannes', 'CINEVILLE Anniversaire Ciné-goûter \r\nLe ciné + le goûter + la visite des cabines \r\nFilm selon la programmation et horaire de la semaine, à consulter le lundi précédent l’anniversaire\r\nsur www.cineville.fr à partir de 18H)\r\nPossibilité de diffuser un visuel « Joyeux anniversaire » avec la photo de votre enfant avant le film\r\n', 'En fonction de la séance à laquelle vous assistez, le goûter peut être pris avant ou après le film et dure 1h (Présence d\'un adulte obligatoire pendant le film et le goûter)\r\nCartons d’invitations fournis\r\nNombre de participants minimum 6 et maximum 14 (adultes compris) \r\nTarif : 11 euros par personne\r\n', 'Cinéville Parc Lann\r\nRue Aristide Boucicaut\r\n02 97 42 51 81\r\n', 'assets/img/webFiles/3849231tof1.jpg', 'assets/img/webFiles/186783tof2.jpg', 1),
(132, 'vannes', 'assets\\img\\artworkIMG\\logos\\vincin.png', 'LA FERME DU VINCIN', 'La ferme du Vincin est une ferme pédagogique, proposant de la vente directe de viande d\'agneau, une chambre d\'hôtes au coeur du Golfe du Morbihan, et des goûters d\'anniversaire.', 'La visite de la ferme se déroulera de 14h30 à 16h sans les parents : \r\nDécouverte de tous les animaux de la ferme, et les enfants pourront les nourrir, caresser, brosser, porter, promener…\r\nPar la suite, un gouter aura lieu de 16h à 16h30 avec les parents, s’ils le souhaitent.\r\nVous avez à disposition une salle dans laquelle se trouve : Tables, chaises, assiettes, verres, couverts, bols et serviettes. A vous de prévoir la nourriture, boisson, bougies…ainsi qu’une petite décoration si besoin. \r\n', 'La ferme de Vincin La ferme se situe au 6 rue de l’ile d’Arz à VANNES\r\nContact : Zoé Tourquetil\r\n06 08 32 05 61\r\nfermeduvincin@gmail.com\r\n\r\n\r\n', 'assets/img/webFiles/7424383image1.png', 'assets/img/webFiles/7170649ferme 1.JPG', 1),
(133, 'lorient', 'assets\\img\\artworkIMG\\logos\\cinema.png', 'Cinema CGR LANESTER', 'Projection pour les enfants, visite du cinéma, cadeaux et gâteaux pour un anniversaire au Cinéma CGR Lanester.', '11.90 euros par personne \r\n1 place de cinéma\r\n2 jetons pour les jeux\r\n1 sachet de bonbons\r\n1 gâteau et 1 boisson\r\n1 cadeau surprise \r\n', 'Méga CGR Lorient - Lanester 11 salles – 1900 fauteuils. Salles de 77 à 667 places. \r\nZA du Manebos Rue Gustave Zédé\r\n56600 Lanester \r\n02 97 89 21 00', 'assets/img/webFiles/3814488cgr2.jpg', 'assets/img/webFiles/8251106CGR.jpg', 1),
(134, 'lorient', 'assets/img/webFiles/279446logo.png', 'KidyJeu', 'Parc de jeux couvert avec trampolines, toboggans, pistes de luge, etc. Inclut un espace café.', 'Formule en salle anniversaire, avec animation\r\ncomprenant :\r\n•	Cartons d’invitations\r\n•	Chasubles\r\n•	Table réservée 2h30 en salle anniversaire décorée\r\n•	Gâteau d’anniversaire (chocolat ou fraisier) ou American Cakes (mini donuts, mini beignets, mini muffins) ou Crep’Party + 2 parts accompagnants offertes\r\n•	Boissons (eau et sirop à volonté)\r\n•	La boîte à bonbons de 500 g\r\n•	1 cadeau offert au « fêté » (limité à un par anniversaire.) Si 2 enfants fêtent leur anniversaire sur la même réservation, 1 supp\r\n', 'Adresse : Z .I. de, 260 Rue Daniel Trudaine, 56600 Lanester\r\nHoraires : Ouvert ⋅ Ferme à 19:00\r\nTéléphone : 02 97 86 53 93', 'assets/img/webFiles/9728665tof1.jpg', 'assets/img/webFiles/8905340tof2.png', 1),
(135, 'lorient', 'assets/img/webFiles/6436371logo.png', 'La Tyrolienne', 'Parc de loisirs en forêt à découvrir sur 4 ha, et proche de la ville. \r\nBalade d\'arbre en arbre par des passerelles, ponts de singe, murs d\'escalade et tyroliennes.', 'Profitez de cette offre pour organiser l’anniversaire de votre enfant sur le parc. Durant toute une demi-journée vous aurez accès aux différents parcours proposés ! De plus, des tables de pique-nique sont à votre disposition pour organiser le fameux goûter d’anniversaire (non fourni par le parc). \r\nL’offre est disponible à partir de 5 personnes.\r\n', 'Parc aventure La tyrolienne\r\nRue Gustave Zédé, 56600 Lanester\r\n\r\n', 'assets/img/webFiles/3558633tof1.jpg', 'assets/img/webFiles/7917355tof2.jpg', 1),
(136, 'lorient', 'assets\\img\\artworkIMG\\logos\\laserkid.png', 'LASER KID ', 'FÊTEZ VOTRE ANNIVERSAIRE AU LASER KID (minimum 6 enfants)', '1 - Vous réservez pour le matin, l\'après midi ou le soir (Samedi midi pour la formule Pizz\'Party)\r\n2 - Nous réservons une table pour votre groupe\r\n3 - Nous fournissons le goûter (gâteaux, boissons, bonbons) dans la formule ! (pizzas, boissons et bonbons pour la formule Pizz\'Party)\r\n4 - Nos animateurs appellent vos enfants pour les jeux et vous laissent des temps morts pour le goûter\r\n', 'Rue Gustave Zédé\r\n56600 Laester\r\n02 97 88 34 84', 'assets/img/webFiles/9503352tof1.jpg', 'assets/img/webFiles/6324605tof2.jpg', 1),
(137, 'lorient', 'assets/img/webFiles/3229344logo.png', 'Le Poisson Volant', 'Parc aventure de Ploemeur\r\nsur le thème de la mer\r\n\r\nLe Poisson Volant est un parc aventure sur le thème de la mer situé à Ploemeur dans le Morbihan. On peut aussi y fêter un anniversaire d\'enfant.\r\n', 'Les 6 - 10 ans : parcours vert, vert+ et bleu à partir de 6ans, bleu tyros à partir de de 8ans, bleu+à partir de de 9 ans, rouges à partir de de 10 ans. \r\nEn toute sérénité grâce aux mousquetons intelligents ! Ce système d\'assurage évite le décrochage accidentel des 2 connecteurs à la fois !\r\nAprès les consignes d\'utilisation du matériel et explications de début de séance, le groupe effectue un petit parcours test pour ensuite, évoluer progressivement, en autonomie, surveillé par des Opérateurs en', 'Douar Gwen, \r\n56270 Ploemeur', 'assets/img/webFiles/3386471tof 1.jpg', 'assets/img/webFiles/3347482tof 2.jpg', 1),
(138, 'lorient', 'assets/img/webFiles/3997269logo.png', 'MAYAPARK', 'MAYAPARK est un parc d\'attractions et de loisirs couvert et climatisé pour enfants sur le thème du peuple Maya : un espace entièrement sécurisé pour les enfants', 'Anniversaires 2h, (minimum 8 enfants)\r\nFormule de base : 8€50/enfant + 5€50 de frais de décoration (comprend table décorée, personnalisée, assiettes, gobelets, serviettes, cartons d\'invitations)\r\nEn option :\r\n•	Option 1 - gâteau d\'anniversaire avec bougies : 2€/enfant\r\n•	Option 2 - boissons comprises (jus d\'oranges, coca-cola, eau de source : 2€/enfant)\r\n•	Option 3 - bonbons, friandises : 2€/enfant\r\n', 'Zone Artisanale Manebos, \r\nRue Jean Marie Djibaou, \r\n56600 Lanester', 'assets/img/webFiles/5209420tof 1.jpg', 'assets/img/webFiles/3788664photo1.PNG', 1),
(139, 'lorient', 'assets/img/webFiles/5650358logo.PNG', 'Metropolis Bowling Laser ', 'Bowling, Laser Blade, Jeux d\'arcade, Bar, votre centre Metropolis vous offre un lieu de bonne humeur pour sortir en famille ou entre amis ! ', 'Métropolis est un complexe multi-loisirs pour les familles, qui accueillent ... Les enfants, jusqu\'à 13 ans, peuvent venir fêter leur anniversaire à Métropolis avec leurs ... Formule &quot;simple&quot; (bowling ou laser) avec 1 boisson : 8 euros par enfant.', 'rue Gustave Zede, \r\nZa de Manebos,\r\n 56600 Lanester', 'assets/img/webFiles/1918890tof1.PNG', 'assets/img/webFiles/2259098tof2.PNG', 1),
(140, 'lorient', 'assets/img/webFiles/7250946logo.PNG', 'Zoo de Pont Scorff', 'Zoo de Pont Scorff  de Lorient', '5heures de visites et spectacles\r\nGouter dans l\'espace restauration \r\nGateau \r\nBoissons ...', ' ZOO DE PONT-SCORFF - \r\nKeruisseau  \r\n56620 Pont-Scorff \r\n-02 97 32 60 86\r\nFax : 02 97 32 57 06 ', 'assets/img/webFiles/2490300tof1.PNG', 'assets/img/webFiles/2490300tof1.PNG', 1),
(143, 'vannes', 'assets/img/webFiles/1553422576logo.png', 'titre Test update image une a une ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, temp', 'blablbalbalbalabla', 'assets/img/webFiles/1553422555Aquagolfe-.jpg', 'assets/img/webFiles/1553422556piscine2.jpg', 1),
(144, 'vannes', 'assets/img/webFiles/3986323logo.png', 'ytetz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, temp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, temp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..', 'assets/img/webFiles/2152596tof2.jpg', 'assets/img/webFiles/1553422503piscine.jpg', 1),
(145, 'vannes', 'assets/img/webFiles/8509040foret.jpg', 'atest', 'tetzetz', 'zetzet', 'tezzet', 'assets/img/webFiles/7485212foret.jpg', 'assets/img/webFiles/88453868540843foret.PNG', 2),
(146, 'vannes', 'assets/img/webFiles/6103742drapeau-bretagne.jpg', 'atesssttt', 'azeraeaeze', 'edaedaede', 'aededaedae', 'assets/img/webFiles/7032131Gwenn_ha_Du_(1923).svg.png', 'assets/img/webFiles/9525896lol.jpg', 63),
(147, 'vannes', 'assets/img/webFiles/1553422413myAvatar.png', 'TIME test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, temp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..', 'assets/img/webFiles/15534224668540843foret.PNG', 'assets/img/webFiles/1553499357Gwenn_ha_Du_(1923).svg.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_ANNONCES` int(11) NOT NULL,
  `id_MEMBRES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `contenu`, `date_commentaire`, `id_parent`, `id_ANNONCES`, `id_MEMBRES`) VALUES
(1, 'Les montagnes russe sont trés sympa\r\n', '2019-03-15 09:02:15', 0, 123, 1),
(33, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', '2019-03-24 13:02:16', 0, 146, 1),
(34, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', '2019-03-24 13:30:58', 0, 146, 1);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `rang` int(11) NOT NULL DEFAULT '0',
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `email`, `password`, `avatar`, `rang`, `date_inscription`) VALUES
(1, 'admin', 'admin@kidsbreizhBirthday.fr', '$2y$10$aAKag5gKEkUGdN5ceijkK.5nXigHs2yUA/m4DomOCjvKEPcqII6xC', 'assets/img/webFiles/1553499317Gwenn_ha_Du_(1923).svg.png', 2, '2019-02-21 16:06:23'),
(2, 'soan', 'soan@free.fr', '$2y$10$hNFPW7Uu/b74PAS85iB2huvvgq01RS67mRyeG2lRRuul2mnCieUR6', 'assets/img/webFiles/219322carte bzh.jpg', 1, '2019-02-24 17:53:16'),
(41, 'koni', 'koni@mail.com', '$2y$10$8RMW/5IBM8PEIxLnLgRPreerW8ksHe3.W577Pc29Dk3SdBV9xFTwy', 'assets/img/webFiles/test4129569myAvatar.png', 1, '2019-03-13 17:24:54'),
(42, 'testVente', 'test2@test.fr', '$2y$10$jSQC2pgoL5UXr10lzkGaAeWeWdSPBFR4BKnwJlvEKHqbyWeGQSiX.', 'assets/img/webFiles/test4187852myAvatar.png', 1, '2019-03-17 12:13:39'),
(55, 'test connexion', 'azerty@free.fr', '$2y$10$WWIDs9PfKVKCbGROc8pRGOixyC5o9uunmlUG2XfBr4h6yK2bTW7M2', 'assets/img/webFiles/test4533980carte bzh.jpg', 0, '2019-03-18 10:54:06'),
(56, 'aaaaaaaaaaaa', 'aaaaaaaa@aaa.de', '$2y$10$hTv73.jIvl3dF3RefW8d3.gD09nK0JU0Wu.WADrlkQCuYm4t1iM/q', 'assets/img/webFiles/test1836008carte bzh.jpg', 0, '2019-03-18 10:55:08'),
(57, 'treretrt', 'ttttt@tr.tr', '$2y$10$4wPRyGIJnQnGGDi/3A625uPndtYj8vJwwh9y5bL5tkSNY3nJp2Ybm', 'assets/img/webFiles/test6145132carte bzh.jpg', 0, '2019-03-18 10:56:55'),
(58, 'test565', 'aaaa@fr.fr', '$2y$10$bnSjIiG.T/85LRTGU0iZD.wdrz7XpqmRu7VTrJ.djyfdL56IJUJNO', 'assets/img/webFiles/test3747184carte bzh.jpg', 0, '2019-03-18 10:59:10'),
(59, 'derpp', 'testt@tttt.fr', '$2y$10$5A9i7ZcbAHHQjCCM2DlPY.qjS9pYAnVqV.ZL5.xHqN5MH3gOcOdV.', 'assets/img/webFiles/test3118741carte bzh.jpg', 0, '2019-03-18 11:29:44'),
(60, 'test 6999', 'rerer@rer.fr', '$2y$10$2UPNrHi6wU5sM9eQyUj9yejqlZ6h.jKN5rGUMKbpIQOy0SMJEoPzi', 'assets/img/webFiles/test6411508carte bzh.jpg', 0, '2019-03-18 11:40:29'),
(61, 'jean michel', 'aaaaaa@mail.de', '$2y$10$.wOJC2q2.9kcTnghKfFyfOF7ajVoKcqHMp109/INLqWf2jr9e/jTC', 'assets/img/webFiles/9168336logo.png', 1, '2019-03-18 13:35:11'),
(62, 'Oulan', 'lediableenpersonne@prata.com', '$2y$10$HiIRJC93.AZukip6MxgrXuXdF3KDw39XVEB2DZhy97DzeS6jFFr4a', 'assets/img/webFiles/1987343tof2.jpg', 0, '2019-03-21 09:38:41'),
(63, 'gerard', 'jean@free.fr', '$2y$10$EbDNyQG6tTU6bAT8dFAe8uqvPsHkk.vQV6tCaW1aDYKeWtfklTwVK', 'assets/img/webFiles/9230738drapeau-bretagne.jpg', 1, '2019-03-23 16:22:42');

-- --------------------------------------------------------

--
-- Structure de la table `selection`
--

CREATE TABLE `selection` (
  `id` int(11) NOT NULL,
  `id_MEMBRES` int(11) NOT NULL,
  `id_ANNONCES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `selection`
--

INSERT INTO `selection` (`id`, `id_MEMBRES`, `id_ANNONCES`) VALUES
(1, 1, 131),
(2, 62, 120),
(3, 62, 139),
(4, 1, 143);

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `id_MEMBRES` int(11) NOT NULL,
  `id_ANNONCES` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `votes`
--

INSERT INTO `votes` (`id`, `id_MEMBRES`, `id_ANNONCES`, `type`) VALUES
(154, 2, 131, 2),
(161, 1, 131, 1),
(162, 42, 145, 1),
(164, 42, 131, 1),
(165, 42, 131, 2),
(166, 42, 134, 1),
(167, 42, 135, 1),
(168, 42, 129, 2),
(169, 42, 126, 1),
(170, 42, 136, 2),
(171, 42, 136, 1),
(172, 42, 137, 2),
(173, 42, 137, 1),
(174, 42, 125, 2),
(175, 42, 129, 2),
(176, 1, 145, 1),
(178, 2, 137, 1),
(179, 1, 135, 1),
(180, 1, 126, 1),
(181, 62, 139, 1),
(182, 63, 144, 1),
(183, 1, 143, 1),
(184, 1, 147, 1),
(185, 1, 144, 1),
(186, 1, 146, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ALERT_MEMBRES_FK` (`id_MEMBRES`),
  ADD KEY `ALERT_ANNONCES_FK` (`id_ANNONCES`),
  ADD KEY `ALERT_COMMENTAIRES_FK` (`id_COMMENTAIRES`);

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ANNONCES_MEMBRES_FK` (`id_MEMBRES`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `COMMENTAIRES_ANNONCES_FK` (`id_ANNONCES`),
  ADD KEY `COMMENTAIRES_MEMBRES0_FK` (`id_MEMBRES`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `selection`
--
ALTER TABLE `selection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SELECTION_MEMBRES_FK` (`id_MEMBRES`),
  ADD KEY `SELECTION_ANNONCE_FK` (`id_ANNONCES`);

--
-- Index pour la table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `VOTE_MEMBRES_FK` (`id_MEMBRES`),
  ADD KEY `VOTE_ANNONCES_FK` (`id_ANNONCES`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alert`
--
ALTER TABLE `alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `selection`
--
ALTER TABLE `selection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alert`
--
ALTER TABLE `alert`
  ADD CONSTRAINT `ALERT_ANNONCES_FK` FOREIGN KEY (`id_ANNONCES`) REFERENCES `annonces` (`id`),
  ADD CONSTRAINT `ALERT_COMMENTAIRES_FK` FOREIGN KEY (`id_COMMENTAIRES`) REFERENCES `commentaires` (`id`),
  ADD CONSTRAINT `ALERT_MEMBRES_FK` FOREIGN KEY (`id_MEMBRES`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `ANNONCES_MEMBRES_FK` FOREIGN KEY (`id_MEMBRES`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `COMMENTAIRES_ANNONCES_FK` FOREIGN KEY (`id_ANNONCES`) REFERENCES `annonces` (`id`),
  ADD CONSTRAINT `COMMENTAIRES_MEMBRES0_FK` FOREIGN KEY (`id_MEMBRES`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `selection`
--
ALTER TABLE `selection`
  ADD CONSTRAINT `SELECTION_ANNONCE_FK` FOREIGN KEY (`id_ANNONCES`) REFERENCES `annonces` (`id`),
  ADD CONSTRAINT `SELECTION_MEMBRES_FK` FOREIGN KEY (`id_MEMBRES`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `VOTE_ANNONCES_FK` FOREIGN KEY (`id_ANNONCES`) REFERENCES `annonces` (`id`),
  ADD CONSTRAINT `VOTE_MEMBRES_FK` FOREIGN KEY (`id_MEMBRES`) REFERENCES `membres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
