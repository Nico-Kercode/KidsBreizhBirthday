<?php
namespace Kbb\Model;

use \kbb\model\Manager;

class AddManager extends Manager
{

    // ajoute une annonce

    public function addNewAnnonce($ville,$logo,$titreA,$descriptif,$photo1, $photo2, $photo3, $membre_id)
    
    {
            $db = $this-> dbConnect(); 
            $addAnnonce = $db->prepare('INSERT INTO annonces (ville, logo, titre, contenu, photo1 , photo2, photo3, id_MEMBRES)   
                   
            VALUES (:ville, :logo, :titre, :contenu, :photo1, :photo2, :photo3, :id_MEMBRES)');
           
            
            $affectedLines = $addAnnonce->execute(array(

                "ville" => $ville,
                "logo"=> $logo,
                "titre"=> $titreA,
                "contenu"=> $descriptif,
                "photo1"=> $photo1,
                "photo2"=> $photo2,
                "photo3"=> $photo3,      
                "id_MEMBRES"=> $membre_id
                
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
    
}
// supprime une annonce 

    // public function deleteAnnonce($deleteid)
    // {

    //     $db = $this->dbConnect();
    //     $req = $db->query("DELETE FROM annonces WHERE id ='$deleteid'");
       

    //     return $req;

    // }


    // recupere toutes les annonces par commune

    // public function getannonces()
    // {
    //     $db = $this->dbConnect();
    //     $annonces = $db->annonces('SELECT id, title, content, creation_date FROM chapter  ORDER BY creation_date ASC');

    //     return $annonces;
    // }
    // // recupere une annonce precise 

    // public function getannonce($id)
    // {
    //     $db = $this->dbConnect();
    //     $req = $db->prepare('SELECT * FROM annonces WHERE id = ?');
    //     $req->execute(array($id));
    //     $annonces = $req->fetch();
    //     $req->closeCursor();
    //     return $annonces;
    // }