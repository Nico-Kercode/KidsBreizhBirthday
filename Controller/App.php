<?php
namespace Kbb\Controller;

session_start();
setcookie( 'id','pseudo', 'rang', time() + 365*24*3600, null, null, false, true); 

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


        // *************    GESTION DES UTILISATEURS  *****************   //
            
            elseif($_GET['action'] == 'moncompte'){
           

                if (!empty($_SESSION['pseudo'])) {
                    require('view\frontend\userAccountView.php');

                }
                else {
                    $this->controller->indexView();
                } 
            }
            // ****   Enregistrement d un utilisateur  ****

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
            elseif ($_GET['action'] == 'formLogin'){
                require('view\frontend\loginView.php');
    
            }
            // **** mise a jour infos utilisateurs ***** // 


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

            elseif ($_GET['action'] == 'login'){

                if (isset($_POST['login_user'])) {
                    
                    $pseudo = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $this->controller->Login($pseudo, $password);
                }

            }
            // ****  deconnection de l'utilisateur ****

            elseif ($_GET['action'] == 'deco'){

                session_unset();
                session_destroy();
                $this->controller->indexView();

            }


            elseif ($_GET['action'] == 'upload') {
               
                
                if (isset($_POST['upload'])) {// si formulaire soumis

                                  
                    $content_dir = 'assets\img\avatars/'; // dossier où sera déplacé le fichier

                    $tmp_file = $_FILES['fichier']['tmp_name'];
                 

                    if( !is_uploaded_file($tmp_file) )
                    {
                        exit("Le fichier est introuvable");
                    }
                    $type_file = $_FILES['fichier']['type'];

                    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'png') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
                    {
                        exit("Le fichier n'est pas une image");
                    }
                    // on copie le fichier dans le dossier de destination
                    $name_file = $_FILES['fichier']['name'];


                    if( preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $name_file) )
                    {
                        exit("Nom de fichier non valide");
                    }
                    else if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
                    {
                        exit("Impossible de copier le fichier dans $content_dir");
                    }
                    echo($name_file);

                    // require('view\frontend\userAccountView.php');
                

                    
                }
            }

            // ********  Gestion du menu de navigation  *******
            
            elseif (isset($_GET['action'])) {
                if ($_GET['action'] == 'accounttmnagement') {
                   
                    $this->controller->userAccountmngt();
                }
            }

            elseif (isset($_GET['action'])) {
                if ($_GET['action'] == 'accueil') {
                   
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