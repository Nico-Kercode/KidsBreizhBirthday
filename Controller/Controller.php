<?php

namespace Kbb\Controller;

use \Kbb\Model\MemberManager;
use \Kbb\Model\AddManager;
use \Kbb\Model\CommentManager;
use \Exception;



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

    
    // -----------------
    // -> ACCUEIL  
    // ----------------

    public function indexView() {

        $id_MEMBRES= $_SESSION['id'];
        $getSelection= $this->addManager->getSelection($id_MEMBRES);
        $total = $this->addManager->countAnnonce();    
        $totalMembres = $this->memberManager->countTotalMembres();
        $getReports= $this->commentManager->getReports();
        $nbAlert= $this->commentManager->CountAlerts();
 
        
        
        
        require('view/frontend/indexView.php');
          
        
    }
    
    // --------------------------------
    // -> MISE A JOUR INFOS UTILISATEUR
    // --------------------------------

    public function userAccountmngt() {
        $id_MEMBRES= $_SESSION[id];
        $getSelection= $this->addManager->getSelection($id_MEMBRES);
        $total = $this->addManager->countAnnonce();
        $totalMembres = $this->memberManager->countTotalMembres();
        $nbAlert= $this->commentManager->CountAlerts();
 
        
        require('view/frontend/userAccountView.php'); 

    }
    
    // --------------------
    // -> FORMULAIRE LOGIN 
    // --------------------

    public function loginView() {
        $total = $this->addManager->countAnnonce();
        $totalMembres = $this->memberManager->countTotalMembres();
        $nbAlert= $this->commentManager->CountAlerts();
     
        
        require('view/frontend/loginView.php');
    }
    
    // ---------------------------
    // -> FORMULAIRE AJOUT ANNONCE
    // ---------------------------


    public function addView() {

        $id_MEMBRES= $_SESSION[id];
        $getSelection= $this->addManager->getSelection($id_MEMBRES);
        $total = $this->addManager->countAnnonce();
        $totalMembres = $this->memberManager->countTotalMembres();
        $getReports= $this->commentManager->getReports();
        $nbAlert= $this->commentManager->CountAlerts();
        
        require('view/frontend/postAnnonceView.php'); 
    }

    
    // -----------------------------
    // ENREGISTREMENT NOUVEAU MEMBRE 
    // -----------------------------


    public function addMember() {

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email= htmlspecialchars($_POST['email']);
        $password1 = htmlspecialchars($_POST['password_1']);
        $password_2 = htmlspecialchars($_POST['password_2']);
        $rang=$_POST['rang'];

            if($password1 == $password_2) {
                $password = $password_2;
                        } 

            else {
                    throw new Exception('les mots de passe ne correspondent pas');
                }  
                
            if(!preg_match("/^[a-zA-Zéèêîïôüäë]+([\ -]{0,1})[a-zA-Zéèêîïôüäë]*$/",$pseudo)) {   
               
                    throw new Exception('Veuillez choisir un pseudo valide');
             
                
                }
            if(!preg_match("/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/",$email)) { 

                throw new Exception('Veuillez choisir un email valide'); }
            
        $picProfile= $this->manageFile($_FILES['image'],400,400);
        $passHash= password_hash($password, PASSWORD_DEFAULT );
        $registerMember = $this->memberManager->registerMember($pseudo,$email,$passHash,$picProfile,$rang);

        $this->isLogged($pseudo,$password);
    }  

    // ------------------
    // LOGIN
    // ------------------

    public function Login(){

        $pseudo = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $this->isLogged($pseudo,$password);
  
    }

    private function isLogged($pseudo,$password) {

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
    // -------------------------
    // EDITON INFOS UTILISATEURS
    // -------------------------


    public function updateMember() {

        $member_id = $_SESSION['id'];
        $email= htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password_1']);
        $password_2 = htmlspecialchars($_POST['password_2']);
        if($password == $password_2) {
            $password_1 = $password_2;
        } 
        $passHash= password_hash($password_1, PASSWORD_DEFAULT );
        $registerMember = $this->memberManager->updtMember($email,$passHash,$member_id);
        $total = $this->addManager->countAnnonce();
        $totalMembres = $this->memberManager->countTotalMembres();
        $nbAlert= $this->commentManager->CountAlerts();
               
    }

    // -------------------------
    // EDITON INFOS AVATAR *****
    // ------------------------- 

    public function updatePicProfile($member_id) {


        $newAvatar= $this->manageFile($_FILES['imageProfil'] ,150,150);
        $registerMember = $this->memberManager->upAvatar($member_id,$newAvatar);
        $total = $this->addManager->countAnnonce();
        $totalMembres = $this->memberManager->countTotalMembres();
        $nbAlert= $this->commentManager->CountAlerts();
        

        $_SESSION['avatar'] = $newAvatar;
        
        header('Location: index.php?action=moncompte');
        
    }

    // ------------------
    // ADMIN INFOS ******
    // ------------------


    public function getAllMembres() {

        $numeroPage= $_GET['page'];
        $membresParPage= 8;
        $starter = ($numeroPage-1 )*$membresParPage;
        $nbDeMembres = ceil(intval($this->memberManager->CountMembers())/$membresParPage);
        $getMembres = $this->memberManager->getMembers($starter,$membresParPage);
        $total = $this->addManager->countAnnonce();
        $nbAlert= $this->commentManager->CountAlerts();
        $totalMembres = $this->memberManager->countTotalMembres();
        
        
        require('view/frontend/membreAdminView.php');
        
        
  
    }


    // RECUPERATION DES SIGNALEMENTS DE COMMENTAIRES 

    public function getComReports(){

        $getReports = $this->commentManager->getReports();
        $total = $this->addManager->countAnnonce();
        $totalMembres = $this->memberManager->countTotalMembres();
        $nbAlert= $this->commentManager->CountAlerts();

        
        require('view/frontend/administrationView.php');

    }

    // SUPPRESSION COMMENTAIRES

    function delComment($commentID){
    
         $delalert= $this->commentManager->deleteAlerts($commentID);
         $delComment= $this->commentManager->deleteCommentaire($commentID);
       
    
        header('Location:index.php?action=admin&page=1');
    }
    

    // ------------------
    // AJOUT ANNONCE
    // ------------------

    public function addAnnonce() {

      
        $ville=$_POST['commune'];
        $logo=$this->manageFile($_FILES['logo'],160,80);
        $titreA=htmlspecialchars($_POST['titreA']);
        $presentation= htmlspecialchars($_POST['contentA']);
        $descriptif= htmlspecialchars($_POST['contentC']);
        $contact= htmlspecialchars($_POST['contentB']);
        $photo1=$this->manageFile($_FILES['photo1'],600,400);
        $photo2=$this->manageFile($_FILES['photo2'],600,400);
        $id_MEMBRES = $_SESSION['id'];
        $addNewAnnonce = $this->addManager->addNewAnnonce($ville,$logo,$titreA,$presentation,$descriptif,$contact,$photo1,$photo2,$id_MEMBRES);      
        
        header('Location: index.php?action=vannes&page=1');

    }

    // -------------------
    // TOUTES LES ANNONCES
    // -------------------

    public function listAnnonces($numeroPage,$annonceParPage,$ville) {

        $id_MEMBRES= $_SESSION[id];
        $getSelection= $this->addManager->getSelection($id_MEMBRES);  
        $starter = ($numeroPage-1 )*$annonceParPage;
        $nbDePage = ceil(intval($this->addManager->countAnnonces($ville))/$annonceParPage);
        $annonces = $this->addManager->getAnnonces($starter,$annonceParPage,$ville);
        $total = $this->addManager->countAnnonce();
        $totalMembres = $this->memberManager->countTotalMembres();
        $nbAlert= $this->commentManager->CountAlerts();
       


        $path = "view/frontend/{$ville}View.php";

        require($path);

        return $nbDePage;
    }


    // ------------------
    // ANNONCE SUR 1 PAGE
    // ------------------

    public function annonce($id) {

        $id_MEMBRES= $_SESSION['id'];  
        $getSelection= $this->addManager->getSelection($id_MEMBRES);   
        $annonce = $this->addManager->getAnnonce($id);
        $allComments = $this->commentManager->getComments($id);
        $total = $this->addManager->countAnnonce();
        $totalMembres = $this->memberManager->countTotalMembres();
        $like= $this->addManager->getLikes($id);
        $disLike= $this->addManager->getDisLikes($id);
        $nbAlert= $this->commentManager->CountAlerts();
    

        
        require('view/frontend/annonceView.php');
        

    }

    // --------------------
    // AFFICHE MES ANNONCES
    // --------------------


    public function mesAnnonces() {

        $id_MEMBRES= $_SESSION['id']; 
        $id_ANNONCES=$_GET['id_ANNONCES'];
    
        $myAnnonces= $this->addManager->getToutesMesAnnonces($id_MEMBRES,$id_ANNONCES);

        require('view/frontend/mesAnnonces.php');

        return $myAnnonces;
    }

    // ---------------------
    //        VUE
    // EDITION D UNE ANNONCE
    // ---------------------


    public function gererMonAnnonce(){

       
        $id_ANNONCES=$_GET['id_ANNONCES']; 
          
        $ann = $this->addManager->getThisAnnonce($id_ANNONCES);

        require('view/frontend/editAnnonce.php');

        return $ann;
    }

    // --------------------
    // EDITION ANNONCE
    // --------------------


    public function editThisAnnonce(){       
        

      
        $ville=$_POST['commune'];


        if(!empty($_FILES['newlogo']['name'])){
            $newLogo=$this->manageFile($_FILES['newlogo'],160,80);
        }
        
        $titre=htmlspecialchars($_POST['titre']);
        $presentation= htmlspecialchars($_POST['presentation']);
        $descriptif= htmlspecialchars($_POST['descriptif']);
        $contact= htmlspecialchars($_POST['contact']);
        if(!empty($_FILES['newphoto1']['name'])){
            $newPhoto1=$this->manageFile($_FILES['newphoto1'],600,400);
        }
        if(!empty($_FILES['newphoto2']['name'])){
            $newPhoto2=$this->manageFile($_FILES['newphoto2'],600,400);
        }
        $id_ANNONCES=$_GET['id_ANNONCES']; 

        $edit= $this->addManager->editAnnonces($id_ANNONCES,$ville,$newLogo,$titre,$presentation,$descriptif,$contact,$newPhoto1,$newPhoto2);

        header("Location: index.php?action=annonce&id={$id_ANNONCES}&id_MEMBRES={$id_MEMBRES}");
    }


        // -------------------
    // CLASSEMENT PAR NOTE
    // -------------------

    public function classementAnnonces() {


        $id_MEMBRES= $_SESSION[id];
        $getSelection= $this->addManager->getSelection($id_MEMBRES);
        $bestAnnonces = $this->addManager->getBestAnnonces();
        $total = $this->addManager->countAnnonce();
        $totalMembres = $this->memberManager->countTotalMembres();
        $nbAlert= $this->commentManager->CountAlerts();
        

        require('view/frontend/meilleurNoteView.php');

        return $bestAnnonces;
    }

    // -------------------
    // AJOUT SELECTION
    // -------------------

    public function selection() {

        $id_ANNONCES = $_GET['id'];
        $id_MEMBRES = $_SESSION['id'];       
        $selection = $this->addManager->addSelection($id_ANNONCES, $id_MEMBRES);
        
        header("Location:index.php?action=annonce&id={$id_ANNONCES}&id_MEMBRES={$id_MEMBRES}");


    }

    // -------------------
    // AFFICHAGE SELECTION
    // -------------------

    public function maSelection() {
        
        $id_MEMBRES = $_SESSION['id'];
        $getSelection = $this->addManager->getSelection($id_MEMBRES);
        $total = $this->addManager->countAnnonce();
        $nbAlert= $this->commentManager->CountAlerts();


        require('view/frontend/maSelectionView.php');

        return $getSelection;

    }
    // ----------------------
    // SUPPRESSION SELECTION
    // ----------------------

    public function viderSelection(){
        
        
        $id_ANNONCES= $_GET['id_ANNONCES'];
        

        $viderSelection= $this->addManager->suppSelection($id_ANNONCES);
        
        header("Location:index.php?action=monPanier&id_MEMBRES={$id_MEMBRES}");

    }
    // ---------------------
    // J AIME / J AIME PAS
    // ---------------------

    
    public function incrementLike() {


        $id_ANNONCES = $_GET['id'];
        $id_MEMBRES= $_SESSION['id'];
        $type=$_GET['type'];
        
                   
        $like = $this->addManager->incrementJaime($id_ANNONCES,$id_MEMBRES,$type);

        header("Location:index.php?action=annonce&id={$id_ANNONCES}&id_MEMBRES={$id_MEMBRES}");
       
    }
     // -----------------------
    // SIGNALEMENT COMMENTAIRE
    // -----------------------
    public function incrementAlert() {

        $id_ANNONCES = $_GET['id'];
        $id_MEMBRES= $_SESSION['id'];
        $id_COMMENTAIRE= $_GET['id_COMMENTAIRE'];
        $incrementAlert= $this->commentManager->incrementAlert($id_ANNONCES,$id_MEMBRES,$id_COMMENTAIRE);

        header('Location: index.php?action=annonce&id='.$id_ANNONCES.'&id_MEMBRES='.$id_MEMBRES);


    }
      // -----------------------

  
    // ------------------
    // AJOUT COMMENTAIRES
    // ------------------
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


    public function editForm($commentID,$annonceID){
        
        $editCommentaire = $this->commentManager->getCommentaire($commentID,$annonceID);
        $total = $this->addManager->countAnnonce();
        $totalMembres = $this->memberManager->countTotalMembres();
        $getReports= $this->commentManager->getReports();
        $nbAlert= $this->commentManager->CountAlerts();
        
        require('view/frontend/editCommentView.php');
        
    }
    
    
    public function editComment($id,$editCommentaire,$id_ANNONCES){
       
    
        $affectedLines = $this->commentManager->editCommentaire($id, $editCommentaire);
    
               header('Location: index.php?action=admin&page=1');
            
        // }
    }
        

    // ------------------
    // BARRE DE RECHERCHE
    // ------------------

    public function mySearch($search) {

        $result = $this->addManager->searchBar($search);
        $total = $this->addManager->countAnnonce();
        $totalMembres = $this->memberManager->countTotalMembres();
        $nbAlert= $this->commentManager->CountAlerts();
        
        require('view/frontend/searchResultView.php');
        
        
                 
        return $result;

    }

    
    // -----------------
    // ENVOI IMAGES assets/img/webFiles/test
    // ----------------

    private function manageFile($file,$width,$height) {

        $tempPath = 'assets/img/tmp' . $file['name'];
        $target_file=$folder.basename($file["name"]);
        $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
        $allowed=array('jpeg','JPEG','png','PNG','jpg','JPG','gif','GIF'); 
        $filename=$file['name']; 
        $ext=pathinfo($filename, PATHINFO_EXTENSION); 
    

        if(!in_array($ext,$allowed) ) 
        { 

            throw new Exception('mauvais format de fichier');

        }
        else{ 
            move_uploaded_file($file ['tmp_name'], $tempPath); 

            $ary = explode('/',$tempPath);
            $srcFile = array_pop($ary);
            $srcPath = join('/', $ary) . '/';
            $folder ="assets/img/webFiles/"; 
            $image = rand(1000, 10000000).$file['name']; 
            $path = $folder . $image ; 

            $this->fctredimimage($width,$height,$folder,$image,$srcPath,$srcFile);
            // unlink($tempPath); // supprime le fichier temporaire

            return $path;
        } 

    }
    
    // -----------------
    // REDIMENSIONNEMENT IMAGES !!! 
    // ----------------

    private function fctredimimage($W_max, $H_max, $rep_Dst, $img_Dst, $rep_Src, $img_Src) {

        $condition = 0;
        // Si certains paramètres ont pour valeur '' :
        if ($rep_Dst=='') { $rep_Dst = $rep_Src; } // (même répertoire)
        if ($img_Dst=='') { $img_Dst = $img_Src; } // (même nom)
        // ---------------------
        // si le fichier existe dans le répertoire, on continue...

        if (file_exists($rep_Src.$img_Src) && ($W_max!=0 || $H_max!=0)) { 
          // ----------------------
          // extensions acceptées : 
           $extension_Allowed = 'jpg,jpeg,png,JPEG,JPG,PNG,gif,GIF';	// (sans espaces)
          // extension fichier Source
           $extension_Src = strtolower(pathinfo($img_Src,PATHINFO_EXTENSION));
          // ----------------------
          // extension OK ? on continue ...
          if(in_array($extension_Src, explode(',', $extension_Allowed))) {
            // ------------------------
             // récupération des dimensions de l'image Src
             $img_size = getimagesize($rep_Src.$img_Src);
             $W_Src = $img_size[0]; // largeur
             $H_Src = $img_size[1]; // hauteur
             // ------------------------
             // condition de redimensionnement et dimensions de l'image finale
             // ------------------------
             // A- LARGEUR ET HAUTEUR maxi fixes
             if ($W_max!=0 && $H_max!=0) {
                $ratiox = $W_Src / $W_max; // ratio en largeur
                $ratioy = $H_Src / $H_max; // ratio en hauteur
                $ratio = max($ratiox,$ratioy); // le plus grand
                $W = $W_Src/$ratio;
                $H = $H_Src/$ratio;   
                $condition = ($W_Src>$W) || ($W_Src>$H); // 1 si vrai (true)
             }
             // ------------------------
             // B- HAUTEUR maxi fixe
             if ($W_max==0 && $H_max!=0) {
                $H = $H_max;
                $W = $H * ($W_Src / $H_Src);
                $condition = ($H_Src > $H_max); // 1 si vrai (true)
             }
             // ------------------------
             // C- LARGEUR maxi fixe
             if ($W_max!=0 && $H_max==0) {
                $W = $W_max;
                $H = $W * ($H_Src / $W_Src);         
                $condition = ($W_Src > $W_max); // 1 si vrai (true)
             }
             // ---------------------------------------------
             // REDIMENSIONNEMENT si la condition est vraie
             // ---------------------------------------------
             // - Si l'image Source est plus petite que les dimensions indiquées :
             // Par defaut : PAS de redimensionnement.
             // - Mais on peut "forcer" le redimensionnement en ajoutant ici :
                 $condition = 1; 
             if ($condition==1) {

                // ---------------------
                // creation de la ressource-image "Src" en fonction de l extension
                switch($extension_Src) {
                case 'jpg':
                case 'jpeg':
                case 'JPG':
                case 'JPEG':
                  $Ress_Src = imagecreatefromjpeg($rep_Src.$img_Src);
                  break;
                case 'png':
                case 'PNG':
                  $Ress_Src = imagecreatefrompng($rep_Src.$img_Src);
                  break;
                }
                // ---------------------
                // creation d une ressource-image "Dst" aux dimensions finales
                // fond noir (par defaut)
                switch($extension_Src) {
                  case 'jpg':
                  case 'jpeg':
                  case 'JPG':
                  case 'JPEG':
                  $Ress_Dst = imagecreatetruecolor($W,$H);
                  break;
                  case 'png':
                  case 'PNG':
                  $Ress_Dst = imagecreatetruecolor($W,$H);
                  // fond transparent (pour les png avec transparence)
                  imagesavealpha($Ress_Dst, true);
                  $trans_color = imagecolorallocatealpha($Ress_Dst, 0, 0, 0, 127);
                  imagefill($Ress_Dst, 0, 0, $trans_color);
                  break;
                }
                // ---------------------
                // REDIMENSIONNEMENT (copie, redimensionne, re-echantillonne)
                imagecopyresampled($Ress_Dst, $Ress_Src, 0, 0, 0, 0, $W, $H, $W_Src, $H_Src); 
                // ---------------------
                // ENREGISTREMENT dans le repertoire (avec la fonction appropriee)
                switch ($extension_Src) { 
                  case 'jpg':
                  case 'jpeg':
                  case 'JPG':
                  case 'JPEG':
                  imagejpeg ($Ress_Dst, $rep_Dst.$img_Dst);
                  break;
                  case 'png':
                  case 'PNG':
                  imagepng ($Ress_Dst, $rep_Dst.$img_Dst);
                  break;
                }
                // ------------------------
                // liberation des ressources-image
                imagedestroy ($Ress_Src);
                imagedestroy ($Ress_Dst);
             }
             // ------------------------
          }
        }
        // ---------------------------------------------------
        // retourne : true si le redimensionnement et l'enregistrement ont bien eu lieu, sinon false
        if ($condition==1 && file_exists($rep_Dst.$img_Dst)) { return true; }
        else { return false; }
        // ---------------------------------------------------
       }


}