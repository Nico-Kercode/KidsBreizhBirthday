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

    public function userAccountmngt() {
        require('view/frontend/userAccountView.php'); 

    }

    public function addMember($pseudo,$email,$password_1) {


        $passHash= password_hash($password_1, PASSWORD_DEFAULT );
        $registerMember = $this->memberManager->registerMember($pseudo,$email,$passHash);
        
    
        header('Location: index.php');
    }

    ///////////////////   UPDATE MEMBER //////////////////


    public function updateMember($member_id,$pseudo,$email,$password_1) {


        $passHash= password_hash($password_1, PASSWORD_DEFAULT );
        $registerMember = $this->memberManager->updtMember($member_id,$pseudo,$email,$passHash);
        
        header('Location: index.php?action=accounttmnagement');
        
    }




    public function Login($pseudo, $password){


        $member = $this->memberManager->loginMember($pseudo);

        if (password_verify($password,$member['password'])) {
    
            // stocke dans $_SESSION les données de l utilisateur
    
            $_SESSION['id']=$member['id'];
            $_SESSION['pseudo']=$member['pseudo'];
            $_SESSION['email']= $member['email'];
            $_SESSION['rang']= $member['rang'];
            $_SESSION['password']= $member['password'];

            header('Location: index.php');
         }    
       else {
            throw new Exception('Mauvaise combinaison login/password');
        }      
    
    }
    
    












}