<?php


namespace Kbb\Model;

use \Kbb\Model\Manager;
use \PDO;



class CommentManager extends Manager
{
    

    // -----------------
    // AJOUT COMMENTAIRE
    // -----------------

    public function addComment($comment,$id_ANNONCES, $id_MEMBRES )
    {
        $db = $this->dbConnect();
        $addcomments = $db->prepare('INSERT INTO commentaires (contenu, date_commentaire, id_ANNONCES, id_MEMBRES) VALUES(:contenu, NOW(),:id_ANNONCES,:id_MEMBRES)');
        $affectedLines = $addcomments->execute(array( 
            
        "contenu" => $comment,
        "id_ANNONCES" => $id_ANNONCES,
        "id_MEMBRES"  => $id_MEMBRES
           
           
          ));
     

        return $affectedLines;
    }

    // --------------------
    // AFICHAGE COMMENTAIRE
    // --------------------

    public function getComments($id)
    {
        $db = $this->dbConnect();
        
        $comments = $db->prepare('SELECT  commentaires.id, contenu, date_commentaire, pseudo 
        FROM commentaires INNER JOIN membres ON id_MEMBRES =membres.id WHERE id_ANNONCES = ?  
        ORDER BY date_commentaire DESC');

        $comments->execute(array($id));
        
        $allComments= $comments->fetchAll();
       
        return $allComments;

    }

    // -----------------------
    // SIGNALEMENT COMMENTAIRE
    // -----------------------


    public function incrementAlert($id) {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE commentaires SET alert = alert + 1 WHERE id = :id');
        $success = $req->execute(array(
            "id" => $id
        ));
                
        return $success;
    }

    // -----------------------
    // SUPPRESSION COMMENTAIRE
    //    ---- ADMIN ----
    // -----------------------

    public function deleteComment($id)
    {

        $db = $this->dbConnect();
        $req = $db->query("DELETE FROM commentaires WHERE id ='$id' ");
       

        return $req;

    }

    public function getReports($starter,$alertsParPage)
    {
    $db = $this->dbConnect();
    $req= $db->prepare("SELECT * 
    FROM commentaires INNER JOIN membres ON id_MEMBRES =id_MEMBRES WHERE alert > 0 ORDER BY alert DESC LIMIT $starter, $alertsParPage ");
    $req->execute(array());
    $getReports = $req->fetchAll();
    $req->closeCursor();
        

    return $getReports;

    }

    public function CountAlerts() 
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT COUNT(alert) FROM commentaires ');
        $req->execute(array());
        $nbDePageAlert=$req->fetchAll()[0][0];
        $req->closeCursor();

        return $nbDePageAlert;
    }
}
