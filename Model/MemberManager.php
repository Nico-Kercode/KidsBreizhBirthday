<?php


namespace Kbb\Model;

use \Kbb\Model\Manager;
use \PDO;



class MemberManager extends Manager{

    // -----------------------------
    // ENREGISTREMENT NOUVEAU MEMBRE
    // -----------------------------


    public function registerMember($pseudo,$email, $passHash,$picProfile){

        $db = $this->dbConnect();
        $addmember = $db->prepare('INSERT INTO membres( pseudo, email, password , avatar, date_inscription) VALUES(:pseudo,:email, :password, :upic,now())');
        $addNewMember = $addmember->execute(array(
            "pseudo" => $pseudo,
            "email" => $email,
            "password" =>$passHash,
            "upic"=>$picProfile
            ));

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


}


