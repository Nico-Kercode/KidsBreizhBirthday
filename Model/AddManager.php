<?php
namespace Kbb\Model;

use \kbb\model\Manager;
use \PDO;


class AddManager extends Manager
{

    // ajoute une annonce

    public function addNewAnnonce($ville,$logo,$titreA,$descriptif,$photo1,$photo2, $photo3, $id_MEMBRES)
    
    {
            $db = $this-> dbConnect(); 
            $addAnnonce = $db->prepare('INSERT INTO annonces (ville, logo, titre, contenu, photo1, photo2, photo3, id_MEMBRES)   
                   
            
            VALUES (:ville, :logo, :titre, :contenu, :photo1, :photo2, :photo3, :id_MEMBRES)');
            
            
            $affectedLines = $addAnnonce->execute(array(

                "ville" => $ville,
                "logo"=> $logo,
                "titre"=> $titreA,
                "contenu"=> $descriptif,
                "photo1"=> $photo1, 
                "photo2"=> $photo2,
                "photo3"=> $photo3,         
                "id_MEMBRES"=> $id_MEMBRES

                
               
                
            ));
        
            return $affectedLines;
    }


    // recupere toutes les annonces par commune

    public function getAnnonces()
    {
        $db = $this->dbConnect();
        $annonces = $db->query('SELECT * FROM annonces  ORDER BY  titre ASC');

        return $annonces;
    }
    
    // recupere une annonce precise

    public function getAnnonce($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT annonces.id , ville, logo, titre, contenu, contact, photo1, pseudo
        FROM annonces INNER JOIN membres ON id_MEMBRES = membres.id WHERE annonces.id = ? ');
        $req->execute(array($id));
        $annonce = $req->fetch();
        $req->closeCursor();

        return $annonce;
    }

    public function countAnnonces()
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
    

}

// $comments->execute(array($id));
        
// $allComments= $comments->fetchAll();

// return $allComments;
