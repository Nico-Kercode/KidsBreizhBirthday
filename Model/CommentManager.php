<?php


namespace Kbb\Model;

use \Kbb\Model\Manager;
use \PDO;



class CommentManager extends Manager
{
    
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

    public function incrementAlert($id) {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE commentaires SET alert = alert + 1 WHERE id = :id');
        $success = $req->execute(array(
            "id" => $id
        ));
                
        return $success;
    }


    public function deleteComment($id)
    {

        $db = $this->dbConnect();
        $req = $db->query("DELETE FROM comment WHERE id ='$id' ");
       

        return $req;

    }

}
