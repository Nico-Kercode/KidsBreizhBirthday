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
        
        $comments = $db->prepare('SELECT  commentaires.id, contenu, date_commentaire, pseudo , COUNT(alert.id_MEMBRES) AS nbreReport
        FROM commentaires INNER JOIN membres ON id_MEMBRES =membres.id 
        INNER JOIN alert ON alert.id_COMMENTAIRES = commentaires.id  WHERE commentaires.id_ANNONCES = ? 
        GROUP BY commentaires.id 
        ORDER BY date_commentaire DESC');

        $comments->execute(array($id));
        
        $allComments= $comments->fetchAll();
       
        return $allComments;

    }

    // -----------------------
    // SIGNALEMENT COMMENTAIRE
    // -----------------------

    public function incrementAlert($id_ANNONCES,$id_MEMBRES,$id_COMMENTAIRES) {

        $db = $this->dbConnect();
        $total= $db->prepare('SELECT COUNT(*) as signalements FROM alert 
        WHERE id_ANNONCES= :id_ANNONCES AND id_MEMBRES= :id_MEMBRES AND id_COMMENTAIRES=:id_COMMENTAIRES ');
        $total->execute(array(

            "id_ANNONCES"=> $id_ANNONCES,
            "id_MEMBRES" =>$id_MEMBRES,
            "id_COMMENTAIRES" => $id_COMMENTAIRES
            
        ));       
        $count=$total->fetch();
        $total->closeCursor();
        
        if($count['signalements'] == 0) :

            $req = $db->prepare('INSERT INTO alert (id_ANNONCES, id_MEMBRES,id_COMMENTAIRES) VALUES( :id_ANNONCES,:id_MEMBRES,:id_COMMENTAIRES) ');
            $like= $req->execute(array(
                "id_ANNONCES"=>$id_ANNONCES,
                "id_MEMBRES"=>$id_MEMBRES,
                "id_COMMENTAIRES" => $id_COMMENTAIRES
                
            ));
        endif;            
        return $like;
        
    }

    // -----------------------
    // SUPPRESSION COMMENTAIRE
    //    ---- ADMIN ----
    // -----------------------

    //  suppression table alert en 1er

    public function deleteAlerts($commentID){
        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM alert        
        WHERE alert.id_COMMENTAIRES = ?
         ");
        $req->execute(array($commentID));

        return $req;

    }

    // puis suppression du commentaire

    public function deleteCommentaire($commentID)
    {

        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM commentaires        
        WHERE id =?
         ");
        $req->execute(array($commentID));

        return $req;

    }


    // -----------------------
    // RECUPERE TOUT LES  
    //    ----COMMENTAIRES ----
    // -----------------------

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

    // -----------------------
    // EDITION DES   
    //    ----COMMENTAIRES ----
    // -----------------------

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

    // -----------------------
    // RECUPERE TOUT LES  
    //    ----SIGNALEMENTS ----
    // -----------------------

    public function getReports()
    {
    $db = $this->dbConnect();
    $req= $db->prepare("SELECT id_COMMENTAIRES, alert.id_ANNONCES, titre, pseudo, contenu , count(alert.id_COMMENTAIRES) as report
    FROM alert
    INNER JOIN membres ON alert.id_MEMBRES = membres.id AND pseudo =membres.pseudo
    INNER JOIN annonces ON alert.id_ANNONCES= annonces.id AND titre =annonces.titre
    INNER JOIN commentaires ON alert.id_COMMENTAIRES=commentaires.id AND contenu= commentaires.contenu
    GROUP BY alert.id_COMMENTAIRES
    ");
    $req->execute(array());
    $getReports = $req->fetchAll();
    $req->closeCursor();
        

    return $getReports;

    }

    // COMPTE TOUT LES  
    //    ----SIGNALEMENTS ----
    // -----------------------
    
    public function CountAlerts() 
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT COUNT(alert.id) as nbreAlerts FROM alert');
        $req->execute(array());
        $nbAlert=$req->fetchAll()[0][0];
        $req->closeCursor();

        return $nbAlert;
    }




}