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

        //           VERS INDEX ACCUEIL 

                if($_GET['action'] == 'home') { 
                                        
                    $this->controller->indexView();
        // ******************************************************************************************//
        //                           GESTION DES MEMBRES
        // ******************************************************************************************// 


                } elseif($_GET['action'] == 'formLogin'){      // ->  Vers formulaire login

                    $this->controller->loginView();

                } elseif ($_GET['action'] == 'login'){         //  ->  Fonction login

                    if (isset($_POST['login_user'])){
                        
                     
                        $this->controller->Login();
                    }    

                } elseif($_GET['action'] == 'moncompte'){       // ->  Gestion du compte
            
                    if (!empty($_SESSION['pseudo'])) {                   
                        $this->controller->userAccountmngt();
                    }
                    else {
                        $this->controller->indexView();
                    }                

                } elseif ($_GET['action'] == 'deco') {          // ->  Deconnexion
                    
                    session_unset();
                    session_destroy();
                    $this->controller->indexView();   

                } elseif ($_GET['action'] == 'formRegister'){       //  -> Formulaire Enregistrement

                    require('view/frontend/registerView.php');
        
                } elseif ($_GET['action'] == 'register'){           // ->  Fonction Enregistrement 

                    if (isset($_POST['reg_user'])) {

                                            
                        $this->controller->addMember();
                    }                

                } elseif ($_GET['action'] == 'update'){         // ->  Fonction Mise a jour infos

                    if (isset($_POST['update_user'])) {

                        $this->controller->updateMember(); }        
                                else {
                                    throw new Exception('les mots de passe ne correspondent pas');
                                }                         

                } elseif ($_GET['action'] == 'updavatar'){       //  -> Fonction mise a jour avatar

                    if (isset($_POST['updateAvatar'])) {
                        $member_id = $_SESSION['id'];
                                            
                        $this->controller->updatePicProfile($member_id) ;
                    }

                    //  FIN GESTION DES MEMBRES

        // ******************************************************************************************//

            //             MENU ADMIN                  //
                
                } elseif($_GET['action'] == 'adminmembres' && $_SESSION['rang'] =='2') {   // ->  Fonction affichage tout les membres
                   
                    $this->controller->getAllMembres();

                } elseif($_GET['action'] =='admin' && $_SESSION['rang'] =='2'){            // -> Fonction affichage des signalements
                   
                    $this->controller->getComReports(); 
                    
                    
            // -------------------------------------- //  
            
            
                                
                } elseif($_GET['action'] =='vannes' || $_GET['action'] =='lorient') {   // -> Fonction affichage résumé annonces par Ville

                    if (isset($_GET['page'])){

                        $numeroPage= $_GET['page'];      
                        $annonceParPage =4;
                        
                    $this->controller->listAnnonces($numeroPage,$annonceParPage,$_GET['action']);}
                    else {
                        throw new Exception('Aucun numéro de page récupéré');
                    }

                } elseif($_GET['action'] =='meilleurNote'){         // ->  Fonction affichage des 10 meilleurs notes (résumé)
                    

                    $this->controller->classementAnnonces();

                } elseif ($_GET['action'] == 'annonce'){        // -> Fonction  affichage d'une annonce 
                  
                    if ((isset($_GET['id'])) && $_GET['id'] > 0 ) {                 
                        $id = $_GET['id'];
                                           
                        $this->controller->annonce($id);

                    }
                     else {
                            throw new Exception('Aucun identifiant de billet envoyé');
                    }
                
                } elseif ($_GET['action'] == 'panier'){      // -> Fonction ajout annonce a ma selection
                  

                    if ((isset($_GET['id'])) && $_GET['id'] > 0 ) {
                                                         
                        $this->controller->selection();
                    }
                     else {
                            throw new Exception('vous ne pouvez pas utiliser cette fonction ');
                    }
     
                } elseif($_GET['action'] == 'monPanier' ){           // -> Fonction Consultation selection

                $this->controller->maSelection(); 

                } elseif($_GET['action'] == 'viderSelection'){
                    if ((isset($_GET['id_ANNONCES'])) && $_GET['id_ANNONCES'] > 0 ) {  // -> Fonction SUPPRIMER SELECTION
                    
                    $this->controller->viderSelection();}
                
                }  elseif ($_GET['action'] == 'ajoutAnnonce' && $_SESSION['rang'] > 0){           // -> Fonction vers formulaire Ajout d une anonnce
                   
                    require('view/frontend/postAnnonceView.php');


                } elseif ($_GET['action'] == 'addannonce'){             // -> Fonction ajout d une annonce

                    if (isset($_POST['ajoutAnnonce'])){  

                        $this->controller->addAnnonce();
                    }
                    else {
                        $this->controller->indexView();
                    } 
                        
                } elseif ($_GET['action'] == 'addComment' && $_SESSION['rang'] >= 0) {            // -> Fonction ajout d un commentaire

                    if (isset($_GET['id']) && $_GET['id'] > 0)
                    {
                            $id_ANNONCES = $_GET['id'];
                                 
                        if (isset($_POST['comment'])){
                                      
                    $id_MEMBRES= $_SESSION['id'];
                    $comment = htmlspecialchars($_POST['comment']);
        
                    $this->controller->postComment($comment,$id_ANNONCES, $id_MEMBRES);
                        }
                    }
                    else {
                        $this->controller->indexView();
                    } 

                } elseif ($_GET['action'] == 'alert') {                 // -> Fonction signalement commentaire
                    // Incrément du nb d'alert sur un commentaire
                    $this->controller->incrementAlert($_GET);


                } elseif ($_GET['action'] == 'like') {              // -> Fonction Vote : "j'aime" "J'aime pas"

                    if (isset($_GET['id']) && $_GET['id'] > 0)
                    {      
                        $this->controller->incrementLike();
                      
                    }


                } elseif ($_GET['action'] == 'editForm' && $_SESSION['rang'] ==  '2'){    // -> Fonction

                    if (isset($_GET['id']) && $_GET['id'] > 0) {                // -> Vers formulaire Edition commentaire (admin)
                       
                        $commentID = $_GET['id'];
                        $annonceID = $_GET['id_ANNONCES'];
  
                            $this->controller->editForm($commentID, $annonceID);
                    } else {

                        throw new Exception('Erreur aucun id envoyer !');
                    }

                } elseif ($_GET['action'] == 'editComment'  && $_SESSION['rang'] ==  '2'){
                    if (isset($_GET['id']) && $_GET['id'] > 0) {                           // -> Fonction EDITION COMMENTAIRE
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

                } elseif ($_GET['action'] == 'delete'  && $_SESSION['rang'] ==  '2'){
                    if (isset($_GET['id']) && $_GET['id'] > 0) {                        // -> Fonction SUPPRESSION COMMENTAIRE 

                        $commentID = $_GET['id']; 
                        
                        $this->controller->delComment($commentID);

                    }else {
                        throw new Exception('Aucun identifiant de commentaire envoyé');
                    }

                } elseif ($_GET['action'] == 'search') {            // -> Fonction BARRE DE RECHERCHE
                   

                    if (isset(($_POST ['submitSearch']))) {                       
                        $search=htmlspecialchars($_POST['searchbar']);                    
                        $this->controller->mySearch($search);

                    }

                }  elseif($_GET['action'] =='rgpd') {    // ->  VERS RGPD

                    require('view/frontend/mentionsView.php'); 

                
                
                // -------------------------------------------------------------------------------------------------
                // ************************************   FIN INSTRUCTION ROUTEUR **********************************
                // ------------------------------------------------------------------------------------------------- 

                } else {
                    $this->controller->indexView();
                }

            }

        } catch (Exception $e) {
            $errors = $e->getMessage();
            require('view/errorView.php');
        }
    }
}
?>