<?php


namespace Kbb\Model;

use \Kbb\Model\Manager;




class MemberManager extends Manager{


    public function registerMember($pseudo,$email, $passHash){

        $db = $this->dbConnect();
        $addmember = $db->prepare('INSERT INTO membres( pseudo, email, password , date_inscription) VALUES(:pseudo,:email, :password,now())');
        $addNewMember = $addmember->execute(array(
            "pseudo" => $pseudo,
            "email" => $email,
            "password" =>$passHash
            ));
       
        return $addNewMember;

    }

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


    public function loginMember($pseudo) {
        $db = $this->dbConnect();
        $loginMember = $db->prepare('SELECT * FROM membres WHERE pseudo= ?');
        $loginMember-> execute(array($pseudo));
        $member= $loginMember->fetch();
        $loginMember-> closeCursor();
        return  $member;


    }


}