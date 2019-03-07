<?php


namespace Kbb\Model;

use \Kbb\Model\Manager;
use \Exception;
use \PDO;



class MemberManager extends Manager{

    // -----------------------------
    // ENREGISTREMENT NOUVEAU MEMBRE
    // -----------------------------


    public function registerMember($pseudo,$email, $passHash,$picProfile){

        $db = $this->dbConnect();

        
 
        $reponse = $db->query('SELECT pseudo FROM membres WHERE pseudo = "' . $pseudo . '" ');
            $login = $reponse->fetch();
             
            $reponse = $db->query('SELECT email FROM membres WHERE email = "' . $email . '" ');
            $mail = $reponse->fetch();
            if (strtolower($pseudo) == strtolower($login['pseudo']))
            {
                throw new Exception ("Ce nom d'utilisateur est déjà utilisé.");
            }
            elseif (strtolower($email) == strtolower($mail['email']))
            {
                throw new Exception ( "Cette adresse de mail est déjà utilisée.");
            }
            else{



        $addmember = $db->prepare('INSERT INTO membres( pseudo, email, password , avatar, date_inscription) VALUES(:pseudo,:email, :password, :upic,now())');
        $addNewMember = $addmember->execute(array(
            "pseudo" => $pseudo,
            "email" => $email,
            "password" =>$passHash,
            "upic"=>$picProfile
            ));
        }

    }

    // -------------------
    // UPDATE INFOS MEMBRE
    // -------------------


    public function updtMember($member_id,$pseudo,$email,$passHash){

        $db = $this->dbConnect();
        $updatemember = $db->prepare('UPDATE  membres SET pseudo=(:pseudo), email=(:email), password=(:password) WHERE membres.id=(:id)');
        $affectedLines = $updatemember->execute(array(
            "pseudo" => $pseudo,
            "email" => $email,
            "password" =>$passHash,
            "id"=>$member_id

            ));
       
        return $affectedLines;

    }

    public function upAvatar($member_id,$newAvatar){

        $db = $this->dbConnect();
        $updatemember = $db->prepare('UPDATE  membres SET avatar=(:avatar) WHERE membres.id=(:id)');
        $affectedLines = $updatemember->execute(array(
            "avatar" => $newAvatar,
            "id"=>$member_id

            ));
       
        return $affectedLines;

    }

    // ------------
    // LOGIN MEMBRE
    // ------------


    public function loginMember($pseudo) {
        $db = $this->dbConnect();
        $loginMember = $db->prepare('SELECT * FROM membres WHERE pseudo= ?');
        $loginMember-> execute(array($pseudo));
        $member= $loginMember->fetch();
        $loginMember-> closeCursor();
        return  $member;


    }

    public function getMembers($starter,$parPage)
    {
       
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM membres  
        ORDER BY date_inscription ASC 
        LIMIT $starter, $parPage");
        $req->execute(array()); 
        $getMembres = $req->fetchAll();
        $req->closeCursor();
        
        return $getMembres;
    }

    public function CountMembers()
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT COUNT(*) FROM membres ');
        $req->execute(array());
        $nbDePageMembre=$req->fetchAll()[0][0];
        $req->closeCursor();

        return $nbDePageMembre;
    }



}


