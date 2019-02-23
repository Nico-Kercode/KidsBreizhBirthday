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

            if (isset($_GET['action'])) {
                           

                if($_GET['action'] == 'home') { 
                                    
                        $this->controller->indexView();
                        
                    }
                
                elseif ($_GET['action'] == 'formLogin'){

                        $this->controller->loginView();
        
                    }    
                    
                elseif ($_GET['action'] == 'login'){

                    if (isset($_POST['login_user'])){
                        
                        $pseudo = htmlspecialchars($_POST['username']);
                        $password = htmlspecialchars($_POST['password']);

                        $this->controller->Login($pseudo, $password);
                    }    
                
                }
    

                elseif ($_GET['action']) {    
                    if ($_GET['action'] == 'deco'){

                    session_unset();
                    session_destroy();
                    $this->controller->indexView();
                    // require('view\frontend\indexView.php');

                    }
                }
            
                
            
                elseif($_GET['action'] == 'moncompte'){
            

                    if (!empty($_SESSION['pseudo'])) {
                        require('view\frontend\userAccountView.php');

                    }
                    else {
                        $this->controller->indexView();
                    } 
                }
            
                
                elseif (isset($_GET['action'])) {
                    if ($_GET['action'] == 'accounttmnagement') {
                    
                        $this->controller->userAccountmngt();
                    }
                }

                elseif ($_GET['action'] == 'register'){

                    if (isset($_POST['reg_user'])) {

                        $pseudo = htmlspecialchars($_POST['pseudo']);
                        $email= htmlspecialchars($_POST['email']);
                        $password = htmlspecialchars($_POST['password_1']);
                        $password_2 = htmlspecialchars($_POST['password_2']);
        
                        if($password == $password_2) {
                            $password_1 = $password_2;
                        }           
                                else {
                                    throw new Exception('les mots de passe ne correspondent pas');
                                }                         
                        $this->controller->addMember($pseudo, $email, $password_1);
                    }
        
                }
                elseif ($_GET['action'] == 'formRegister'){
                    require('view\frontend\registerView.php');
        
                }
                


                // // **** mise a jour infos utilisateurs ***** // 


                elseif ($_GET['action'] == 'update'){

                    if (isset($_POST['update_user'])) {
                        $member_id = $_SESSION['id'];
                        $pseudo = htmlspecialchars($_POST['pseudo']);
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
        
                }

                // ****  login de l utilisateur ****

                
                // ****  deconnection de l'utilisateur ****

            

                //  Add avatar //
                
            } 
            else{

                indexView();
            }   // ********  Gestion du menu de navigation  *******        
            
      

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require('view\errorView.php');
        }
    }
}
