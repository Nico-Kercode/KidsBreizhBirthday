<?php

namespace Kbb\Controller;

use \Kbb\Model\MemberManager;


class Controller
{

    private $memberManager;


    public function __construct() {
        $this->memberManager = new MemberManager();
       
    }

    public function indexView() {
        require('view/frontend/indexView.php'); 
    }

    public function addMember($pseudo,$email,$password_1) {


        $passHash= password_hash($password_1, PASSWORD_DEFAULT );
        $registerMember = $this->memberManager->registerMember($pseudo,$email,$passHash);
        
    
        header('Location: index.php');
    }

    public function Login($pseudo, $password){


        $member = $this->memberManager->loginMember($pseudo);

        if (password_verify($password,$member['password'])) {
    
            // stocke dans $_SESSION les données de l utilisateur
    
            $_SESSION['id']=$member['id'];
            $_SESSION['pseudo']=$member['pseudo'];
            $_SESSION['rang']= $member['rang'];

            header('Location: index.php');
         }    
       else {
            throw new Exception('Mauvaise combinaison login/password');
        }


      
        
    
    }
    
    












}