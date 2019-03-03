<?php
namespace Kbb\Model;

use \kbb\model\Manager;
use \PDO;


class AddManager extends Manager
{

    // ajoute une annonce

    public function addNewAnnonce($ville,$logo,$titreA,$descriptif,$contact,$photo1,$photo2,$photo3,$id_MEMBRES)
    
    {
            $db = $this-> dbConnect(); 
            $addAnnonce = $db->prepare('INSERT INTO annonces (ville, logo, titre, contenu, contact, photo1, photo2, photo3, id_MEMBRES)   
                   
            
            VALUES (:ville, :logo, :titre, :contenu, :contact ,:photo1, :photo2, :photo3, :id_MEMBRES)');
            
            
            $affectedLines = $addAnnonce->execute(array(

                "ville" => $ville,
                "logo" => $logo,
                "titre" => $titreA,
                "contenu" => $descriptif,
                "contact" => $contact,
                "photo1" => $photo1, 
                "photo2" => $photo2,
                "photo3" => $photo3,         
                "id_MEMBRES"=> $id_MEMBRES
 
                
            ));
        
            return $affectedLines;
    }


    // recupere toutes les annonces 

    public function getAnnonces($starter,$parPage)
    {
        $db = $this->dbConnect();

        $annonces = $db->query("SELECT * FROM annonces ORDER BY annonces.titre ASC  LIMIT $starter, $parPage")->fetchAll();
        return $annonces;
    }

    // public function countPages()
    // {
    //     $db = $this->dbConnect();
    //     $nbDePage= $db->query('SELECT COUNT(*) FROM annonces')->fetchAll()[0][0];

    //     return $nbDePage;
    // }

    // recupere une annonce precise

    public function getAnnonce($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT annonces.id , ville, logo, titre, contenu, contact, jaime, jaimepas, photo1, pseudo
        FROM annonces INNER JOIN membres ON id_MEMBRES = membres.id WHERE annonces.id = ? ');
        $req->execute(array($id));
        $annonce = $req->fetch();
        $req->closeCursor();

        return $annonce;
    }

    public function countAnnonce()
    {   
        $db = $this->dbConnect();
        $resultat = $db->query('SELECT COUNT(*) AS total FROM annonces WHERE id');
        $count = $resultat->fetch();
        $total=$count['total'];
        $resultat->closeCursor();
        
         return $total;

       

    }

    public function searchBar($search)
    {

        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM annonces WHERE upper(titre) LIKE ? OR upper(ville) LIKE  ? OR upper (contenu) LIKE ?  ");
        $req->execute(array('%'.$search.'%' , '%'.$search.'%' , '%'.$search.'%'  ));
        $result = $req->fetchAll();
    
        return $result;

    }
    public function incrementJaime($id) {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE annonces SET jaime = jaime + 1 WHERE id = :id');
        $success = $req->execute(array(
            "id" => $id
        ));
                
        return $success;
    }

    public function incrementJaimepas($id) {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE annonces SET jaimepas = jaimepas + 1 WHERE id = :id');
        $success = $req->execute(array(
            "id" => $id
        ));
                
        return $success;
    }
    

}

// $comments->execute(array($id));
        
// $allComments= $comments->fetchAll();

// return $allComments;