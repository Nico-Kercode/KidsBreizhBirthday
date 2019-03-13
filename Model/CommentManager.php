<?php


namespace Kbb\Model;

use \Kbb\Model\Manager;
use \Exception;
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

    public function deleteCommentaire($commentID)
    {

        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM commentaires WHERE id =? ");
        $req->execute(array($commentID));

        return $req;

    }
    public function getCommentaire($commentID,$annonceID)
    {
        
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT contenu, date_commentaire, pseudo , id_ANNONCES , titre 
        FROM commentaires 
        INNER JOIN membres ON id_MEMBRES =membres.id 
        INNER JOIN annonces ON id_ANNONCES =annonces.id 
        WHERE commentaires.id = ? AND annonces.id =?');
        $req->execute(array($commentID,$annonceID));
        $editCommentaire = $req->fetch();

        return $editCommentaire;
    }


    public function editCommentaire($id, $editCommentaire){
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE commentaires 
        SET contenu=(:contenu) 
        WHERE commentaires.id= (:id)');
        $affectedLines = $comments->execute(array(
            "contenu" => $editCommentaire,
            "id" => $id
        ));

        return $affectedLines;
    }



    public function getReports()
    {
    $db = $this->dbConnect();
    $req= $db->prepare("SELECT commentaires.*
    FROM commentaires 
    INNER JOIN membres ON membres.id =commentaires.id_MEMBRES 
    INNER JOIN annonces ON annonces.id= commentaires.id_ANNONCES  
    WHERE alert > 0 ORDER BY alert DESC");
    $req->execute(array());
    $getReports = $req->fetchAll();
    $req->closeCursor();
        

    return $getReports;

    }

    public function CountAlerts() 
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT sum(alert) as nbreAlerts FROM commentaires ');
        $req->execute(array());
        $nbAlert=$req->fetchAll()[0][0];
        $req->closeCursor();

        return $nbAlert;
    }
}
