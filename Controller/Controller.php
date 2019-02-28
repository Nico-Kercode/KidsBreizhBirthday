<?php

namespace Kbb\Controller;

use \Kbb\Model\MemberManager;
use \Kbb\Model\AddManager;
use \Kbb\Model\CommentManager;


class Controller
{

    private $memberManager;
    private $addManager;
    private $commentManager;


    public function __construct() {

        $this->memberManager = new MemberManager();
        $this->addManager = new AddManager();
        $this->commentManager = new CommentManager();

       
       
       
    }

    public function indexView() {
        require('view/frontend/indexView.php'); 
    }

    public function userAccountmngt() {
        require('view/frontend/userAccountView.php'); 

    }
    public function loginView() {
        require('view\frontend\loginView.php');
    }
    public function addView() {
        require('view\frontend\postAdd.php');
    }

    public function addMember() {

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

        $picProfile= $this->manageFile($_FILES['image']);

        $passHash= password_hash($password_1, PASSWORD_DEFAULT );
        $registerMember = $this->memberManager->registerMember($pseudo,$email,$passHash,$picProfile);
        
    
        header('Location: index.php');
    }

    private function manageFile($file) {

        $folder ="assets\img/"; 
        $image = rand(1000, 10000000).$file['name']; 
        $path = $folder . $image ; 
        $target_file=$folder.basename($file["name"]);
        $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
        $allowed=array('jpeg','JPEG','png','PNG','jpg','JPG','gif', 'GIF'); $filename=$file['name']; 
        $ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 
        { 

            throw new Exception('mauvais format de fichier');

        }
        else{ 
        move_uploaded_file($file ['tmp_name'], $path); 

        return $path;
        } 

    }


    public function Login($pseudo, $password){

        $member = $this->memberManager->loginMember($pseudo,$password);

        if (password_verify($password,$member['password'])) {
    
           
    
            $_SESSION['id']=$member['id'];
            $_SESSION['pseudo']=$member['pseudo'];
            $_SESSION['email']= $member['email'];
            $_SESSION['avatar']= $member['avatar'];
            $_SESSION['rang']= $member['rang'];
            $_SESSION['password']= $member['password'];

            header('Location: index.php');
         }    
       else {
            throw new Exception('Mauvaise combinaison login/password');
        }      
    
    }



    public function updateMember($member_id,$pseudo,$email,$password_1) {


        $passHash= password_hash($password_1, PASSWORD_DEFAULT );
        $registerMember = $this->memberManager->updtMember($member_id,$pseudo,$email,$passHash);
        
        header('Location: index.php?action=accounttmnagement');
        
    }

    public function addAnnonce() {

      
        $ville=$_POST['commune'];
        $logo=$this->manageFile($_FILES['logo']);
        $titreA=htmlspecialchars($_POST['titreA']);
        $descriptif= htmlspecialchars($_POST['contentA']);
        $photo1=$this->manageFile($_FILES['photo1']);
        $photo2=$this->manageFile($_FILES['photo2']);
        $photo3=$this->manageFile($_FILES['photo3']);
        $id_MEMBRES = $_SESSION['id'];

        $addNewAnnonce = $this->addManager->addNewAnnonce($ville,$logo,$titreA,$descriptif,$photo1,$photo2, $photo3,$id_MEMBRES);

        header('Location: index.php?action=vannes');

    }

    public function listAnnonces() {
                                        
    
        $annonces = $this->addManager->getAnnonces();

        require('view\frontend\addView1.php');

        return $annonces;
    }

    public function annonce($id) {

        $annonce = $this->addManager->getAnnonce($id);
        $allComments = $this->commentManager->getComments($id);
       

        require('view\frontend\AnnonceView.php');
        

    }


    public function count(){

        $total = $this->addManager->countAnnonces();

        require('view\frontend\indexView.php');

        return $total['total'];


    }



    public function postComment($comment,$id_ANNONCES, $id_MEMBRES )
    {
        
    
        $affectedLines = $this->commentManager->addComment($comment,$id_ANNONCES, $id_MEMBRES);
    
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
 
        header('Location: index.php?action=annonce&id='.$id_ANNONCES.'&id_MEMBRES='.$id_MEMBRES);

        }

    }

    public function mySearch($search) {

        $result = $this->addManager->searchBar($search);

        
 
        require('view\frontend\searchResultView.php');
        
          
        
        return $result;


    }

  


   



}