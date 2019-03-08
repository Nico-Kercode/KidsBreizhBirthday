<?php
namespace Kbb\Controller;

session_start();
setcookie( 'id','pseudo', 'email', 'rang', 'avatar', time() + 365*24*3600, null, null, false, true);  

use \Kbb\Controller\Controller;
use \Exception;


class App
{
    private $controller;

    public function __construct() {
        $this->controller = new Controller();
    }

    public function run()
    {
        try {

            if (!isset($_GET['action'])) {
                $this->controller->indexView();
            }

           if (isset($_GET['action'])) {



                            // -------------------------------------//
                            //           VERS INDEX ACCUEIL 
                            // -------------------------------------//

                if($_GET['action'] == 'home') { 
                                        
                    $this->controller->indexView();


        // ******************************************************************************************//

        //                           GESTION DES MEMBRES

        // ******************************************************************************************// 
                  
                
                            // -----------------------------------------//
                            //          VERS FORMULAIRE LOGIN
                            // -----------------------------------------//

                } elseif($_GET['action'] == 'formLogin'){

                    $this->controller->loginView();

                } elseif ($_GET['action'] == 'login'){

                    if (isset($_POST['login_user'])){
                        
                        $pseudo = htmlspecialchars($_POST['username']);
                        $password = htmlspecialchars($_POST['password']);

                        $this->controller->Login($pseudo, $password);
                    }    
                
                            // -----------------------------------------//
                            //           VERS GESTION PROFIL
                            // -----------------------------------------//

                } elseif($_GET['action'] == 'moncompte'){
            

                    if (!empty($_SESSION['pseudo'])) {
                    
                        $this->controller->userAccountmngt();

                    }
                    else {
                        $this->controller->indexView();
                    } 
                
                            // ----------------------------------------//
                            //              DECONNEXION
                            // ----------------------------------------//

                } elseif ($_GET['action'] == 'deco') {    
                    

                    session_unset();
                    session_destroy();
                    $this->controller->indexView();   

                
                            // ----------------------------------------//
                            //        ENREGISTREMENT UTILISATEUR
                            // ----------------------------------------//

                } elseif ($_GET['action'] == 'formRegister'){

                    require('view\frontend\registerView.php');
        
                } elseif ($_GET['action'] == 'register'){

                    if (isset($_POST['reg_user'])) {

                                            
                        $this->controller->addMember();
                    }
                
                            // ----------------------------------------//
                            //          MISE A JOUR PROFIL
                            // ----------------------------------------//

                } elseif ($_GET['action'] == 'update'){

                    if (isset($_POST['update_user'])) {
                        $member_id = $_SESSION['id'];

                        $email= htmlspecialchars($_POST['email']);
                        $password = htmlspecialchars($_POST['password_1']);
                        $password_2 = htmlspecialchars($_POST['password_2']);
        
                        if($password == $password_2) {
                            $password_1 = $password_2;
                        }           
                                else {
                                    throw new Exception('les mots de passe ne correspondent pas');
                                }                         
                        $this->controller->updateMember($member_id,$pseudo, $email, $password_1);
                    }

            
                    
                            // ---------------------------------------//
                            //      MISE A JOUR IMAGE PROFIL
                            // ---------------------------------------//
                        

                } elseif ($_GET['action'] == 'updavatar'){

                    if (isset($_POST['updateAvatar'])) {
                        $member_id = $_SESSION['id'];
                                            
                        $this->controller->updatePicProfile($member_id) ;
                    }
        // ******************************************************************************************//

        //                          FIN GESTION DES MEMBRES

        // ******************************************************************************************// 
                            
                            // ---------------------------------------//
                            //     MENU ADMIN gestion des MEMBRES
                            // ---------------------------------------//

                
                } elseif($_GET['action'] == 'adminmembres') {


                    $numeroPage= $_GET['page'];
                    $membresParPage= 8;

                    $this->controller->getAllMembres($numeroPage,$membresParPage);
 
                            // ---------------------------------------//
                            //     MENU ADMIN gestion des SIGNALEMENTS
                            // ---------------------------------------//


                } elseif($_GET['action'] =='admin'){

                    $numeroPage= $_GET['page'];
                    $alertsParPage = 6;

                    $this->controller->getComReports($numeroPage,$alertsParPage);             


                            // ---------------------------------------//
                            //     AFFICHAGE PAGES PAR VILLES 
                            // ---------------------------------------//
                                
                } elseif($_GET['action'] =='vannes' || $_GET['action'] =='lorient') {

                    if (isset($_GET['page'])){
                        $numeroPage= $_GET['page'];      
                        $annonceParPage =4;
                        

                    $this->controller->listAnnonces($numeroPage,$annonceParPage,$_GET['action']);}
                    else {
                        throw new Exception('Aucun numéro de page récupéré');
                    }

                            // ---------------------------------------//
                            //     AFFICHAGE PAGES PAR CLASSEMENT
                            // ---------------------------------------//

                } elseif($_GET['action'] =='meilleurNote'){

                    $numeroPage= $_GET['page'];      
                    $annonceParPage =4;
                    

                    $this->controller->classementAnnonces($numeroPage,$annonceParPage);

        
                
                            // -------------------------------------//
                            //          AFFICHAGE ANNONCE
                            // -------------------------------------//
                 
                } elseif ($_GET['action'] == 'annonce'){
                  

                    if ((isset($_GET['id'])) && $_GET['id'] > 0 ) {
                  
                        $id = $_GET['id'];
                        
    
                    
                        $this->controller->annonce($id);

                    }
                     else {
                            throw new Exception('Aucun identifiant de billet envoyé');
                    }
        
                            // -----------------------------------//
                            //      FORMULAIRE AJOUT ANNONCE
                            // -----------------------------------// 
                
                } elseif ($_GET['action'] == 'ajoutAnnonce'){

                    
                    require('view\frontend\postAnnonceView.php');

                            // -------------------------------//
                            //          AJOUT ANNONCE
                            // -------------------------------//

                } elseif ($_GET['action'] == 'addannonce'){

                    if (isset($_POST['ajoutAnnonce'])){
                    
                        $this->controller->addAnnonce();
                    }
                            // ---------------------------------//
                            //      AJOUT D UN COMMENTAIRE
                            // ---------------------------------//           
                 
                } elseif ($_GET['action'] == 'addComment') {

                    if (isset($_GET['id']) && $_GET['id'] > 0)
                    {
                            $id_ANNONCES = $_GET['id'];
                                 
                        if (isset($_POST['comment'])){
                                      
                    $id_MEMBRES= $_SESSION['id'];
                    $comment = htmlspecialchars($_POST['comment']);
        
                    $this->controller->postComment($comment,$id_ANNONCES, $id_MEMBRES);
                        }
                    }

                            // ----------------------------------//
                            //       ALERT COMMENTAIRES
                            //      +LIKE + DISLIKE ANNONCE 
                            // ----------------------------------//


                } elseif ($_GET['action'] == 'alert') {
                    // Incrément du nb d'alert sur un commentaire
                    $this->controller->incrementAlert($_GET);

                } elseif ($_GET['action'] == 'like') {
                    // Incrément du nb de like sur une annonce
                    $this->controller->incrementLike($_GET); 
                
                } elseif ($_GET['action'] == 'dontlike') {
                    // Incrément du nb de like sur une annonce
                    $this->controller->incrementdontLike($_GET); 

               

                            // -----------------------------//    
                            //     VERS FORM EDITION COMM
                            // -----------------------------//

                } elseif ($_GET['action'] == 'editForm' && isset($_SESSION['rang']) && $_SESSION['rang'] ==  '2'){

                    if (isset($_GET['id']) && $_GET['id'] > 0) {

                        
                        $commentID = $_GET['id'];
                        $annonceID = $_GET['id_ANNONCES'];
  
                            $this->controller->editForm($commentID, $annonceID);


                    } else {

                        throw new Exception('Erreur aucun id envoyer !');
                    }
                

                            // ----------------------------//    
                            //          EDITION COMM 
                            // ----------------------------//


                } elseif ($_GET['action'] == 'editComment' && isset($_SESSION['rang']) && $_SESSION['rang'] ==  '2'){
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['comment'])) {
                            $this->controller->editComment($_GET['id'], $_POST['comment'], $_GET['id_ANNONCES']);
                        }
                        else {
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                    }
                    else {
                        throw new Exception('Aucun identifiant de commentaire envoyé');
                    }


                            // ---------------------------//    
                            //      SUPPRESSION COMM 
                            // ---------------------------//


                } elseif ($_GET['action'] == 'delete' && isset($_SESSION['rang']) && $_SESSION['rang'] ==  '2'){
                    if (isset($_GET['id']) && $_GET['id'] > 0) {

                        $commentID = $_GET['id']; 
                        
                        $this->controller->delComment($commentID);

                    }else {
                        throw new Exception('Aucun identifiant de commentaire envoyé');
                    }
                        
                            // -------------------------------//    
                            //          SEARCH BAR 
                            // -------------------------------//
      
  
                } elseif ($_GET['action'] == 'search') {
                   

                    if (isset(($_POST ['submitSearch']))) {                       
                        $search=htmlspecialchars($_POST['searchbar']);                    
                        $this->controller->mySearch($search);

                    }

                            // -------------------------------//
                            //          VERS RGPD
                            // -------------------------------// 



                }  elseif($_GET['action'] =='rgpd') {

                    require('view\frontend\mentionsView.php'); 

                
                
                // -------------------------------------------------------------------------------------------------
                // ************************************   FIN INSTRUCTION ROUTEUR **********************************
                // ------------------------------------------------------------------------------------------------- 

                } else {
                    $this->controller->indexView();
                }

            }

        } catch (Exception $e) {
            $errors = $e->getMessage();
            require('view\errorView.php');
        }
    }
}
?>