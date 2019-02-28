<?php
namespace Kbb\Controller;

session_start();
setcookie( 'id','pseudo', 'email', 'rang', 'avatar', time() + 365*24*3600, null, null, false, true);  

use \Kbb\Controller\Controller;


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

                // LIEN VERS L INDEX //

                if($_GET['action'] == 'home') { 
                                        
                    $this->controller->indexView();
                    
                // LIENS VERS VANNES VIEW

                } elseif ($_GET['action'] == 'count'){

                     $this->controller->count();
                
                } elseif($_GET['action'] =='vannes') {

                    $this->controller->listAnnonces();
                   
                    

                
                // AFFICHAGE VERS RGPD 

                
                } elseif($_GET['action'] =='rgpd') {

                    require('view\frontend\mentionsView.php');

                
                // AFFICHAGE D'une ANNONCE 
 
                
                } elseif ($_GET['action'] == 'annonce'){
                  

                    if ((isset($_GET['id'])) && $_GET['id'] > 0 ) {
                  
                        $id = $_GET['id'];
                        
    
                    
                        $this->controller->annonce($id);

                    }
                     else {
                            throw new Exception('Aucun identifiant de billet envoyé');
                    }


                
                
                // LIEN VERS FORMULAIRE LOGIN //

                } elseif($_GET['action'] == 'formLogin'){

                    $this->controller->loginView();
    
                } elseif ($_GET['action'] == 'login'){

                    if (isset($_POST['login_user'])){
                        
                        $pseudo = htmlspecialchars($_POST['username']);
                        $password = htmlspecialchars($_POST['password']);

                        $this->controller->Login($pseudo, $password);
                    }    
                
                // LIEN VERS MON COMPTE //

                } elseif($_GET['action'] == 'moncompte' && isset($_SESSION['rang'])){
            

                    if (!empty($_SESSION['pseudo'])) {
                       
                        $this->controller->userAccountmngt();

                    }
                    else {
                        $this->controller->indexView();
                    } 
                  
                // LIEN DECONNEXION //

                } elseif ($_GET['action'] == 'deco') {    
                    

                    session_unset();
                    session_destroy();
                    $this->controller->indexView();   

                
                // LIEN ENREGISTREMENT UTILISATEUR //

                } elseif ($_GET['action'] == 'formRegister'){

                    require('view\frontend\registerView.php');
        
                } elseif ($_GET['action'] == 'register'){

                    if (isset($_POST['reg_user'])) {

                                            
                        $this->controller->addMember();
                    }
                 
                //  MISE A JOUR INFOS DU COMPTE //

                } elseif ($_GET['action'] == 'update' && isset($_SESSION['rang'])){

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
        

                // VUE FORMULAIRE AJOUT ANNONCE 

                } elseif ($_GET['action'] == 'ajoutAnnonce' && isset($_SESSION['rang']) && $_SESSION['rang'] == '1' || $_SESSION['rang'] == '2' ){

                    
                    require('view\postAnnonceView.php');

                // AJOUT D UNE ANNONCE //

                } elseif ($_GET['action'] == 'addannonce'){

                    if (isset($_POST['ajoutAnnonce'])){
                    
                        $this->controller->addAnnonce();
                    }

                // AJOUT D UN COMMENTAIRE           
                } 
                elseif ($_GET['action'] == 'addComment' && isset($_SESSION['rang'])) {

                    if (isset($_GET['id']) && $_GET['id'] > 0)
                    {
                            $id_ANNONCES = $_GET['id'];
                                 
                        if (isset($_POST['comment'])){
                                      
                    $id_MEMBRES= $_SESSION['id'];
                    $comment = htmlspecialchars($_POST['comment']);
        
                    $this->controller->postComment($comment,$id_ANNONCES, $id_MEMBRES);
                        }
                    }

                // SEARCH BAR 

                } elseif ($_GET['action'] == 'search') {
                   
                    if (isset(($_POST ['submitSearch']))) {
                        
                        $search= $_POST['searchbar'];        
                        $this->controller->mySearch($search);

                    }

                }

                // FIN INSTRUCTION ROUTEUR 

                else {
                    $this->controller->indexView();
                }

           }

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require('view\errorView.php');
        }
    }
}
?>