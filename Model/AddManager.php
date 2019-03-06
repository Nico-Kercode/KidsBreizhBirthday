<?php
namespace Kbb\Model;

use \kbb\model\Manager;
use \PDO;


class AddManager extends Manager
{

    // -------------
    // AJOUT ANNONCE
    // ------------

    public function addNewAnnonce($ville,$logo,$titreA,$presentation,$descriptif,$contact,$photo1,$photo2,$id_MEMBRES)
    
    {
            $db = $this-> dbConnect(); 
            $addAnnonce = $db->prepare('INSERT INTO annonces (ville, logo, titre ,presentation, descriptif, contact, photo1, photo2, id_MEMBRES)   
                   
            
            VALUES (:ville, :logo, :titre, :presentation, :descriptif, :contact , :photo1, :photo2, :id_MEMBRES)');
            
            
            $affectedLines = $addAnnonce->execute(array(

                "ville" => $ville,
                "logo" => $logo,
                "titre" => $titreA,
                "presentation"=> $presentation,
                "descriptif" => $descriptif,
                "contact" => $contact,
                "photo1" => $photo1, 
                "photo2" => $photo2,        
                "id_MEMBRES"=> $id_MEMBRES
 
                
            ));
        
            return $affectedLines;
    }


    // --------------------------------------
    // RECUPERE TOUTES LES ANNONCES PAR VILLE
    // -------------------------------------- 

    public function getAnnonces($starter,$parPage,$ville)
    {
       
        $db = $this->dbConnect();

        $req = $db->prepare("SELECT * FROM annonces WHERE ville = ? ORDER BY annonces.titre ASC LIMIT $starter, $parPage");
        $req->execute(array($ville)); 
       
        $annonces = $req->fetchAll();
        $req->closeCursor();
        
        return $annonces;
    }
    // ----------------------------
    // CALCUL NBRE DE PAGES / VILLE
    // ----------------------------

    public function countAnnonces($ville)
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT COUNT(*) FROM annonces WHERE ville = ? ');
        $req->execute(array($ville));
        $nbDePage=$req->fetchAll()[0][0];
        $req->closeCursor();

        return $nbDePage;
    }

    // -------------------------------------------
    // RECUPERE TOUTES LES ANNONCES PAR CLASSEMENT
    // ------------------------------------------- 

    public function getBestAnnonces($starter,$parPage)
    {
       
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM annonces ORDER BY annonces.jaime DESC LIMIT $starter, $parPage");
        $req->execute(array()); 
        $bestAnnonces = $req->fetchAll();
        $req->closeCursor();
        
        return $bestAnnonces;
    }

    
    // -----------------------------------------
    // CALCUL NBRE DE PAGES / MEILLEURS NOTES 
    // -----------------------------------------
    
    public function countAnnoncesJaime()
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT COUNT(*) FROM annonces ');
        $req->execute(array());
        $nbDePageJaime=$req->fetchAll()[0][0];
        $req->closeCursor();

        return $nbDePageJaime;
    }

    // -----------------------
    // AFFICHAGE D UNE ANNONCE
    // -----------------------


    public function getAnnonce($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT annonces.id , ville, logo, titre, presentation, descriptif, contact, jaime, jaimepas, photo1 ,photo2 ,pseudo
        FROM annonces INNER JOIN membres ON id_MEMBRES = membres.id WHERE annonces.id = ? ');
        $req->execute(array($id));
        $annonce = $req->fetch();
        $req->closeCursor();

        return $annonce;
    }


    // --------------------
    // COMPTE TOTAL ANNONCE
    // --------------------

    public function countAnnonce()
    {   
        $db = $this->dbConnect();
        $resultat = $db->query('SELECT COUNT(*) AS total FROM annonces WHERE id');
        $count = $resultat->fetch();
        $total=$count['total'];
        $resultat->closeCursor();
        
         return $total;

       
    }


    // ------------------
    // BARRE DE RECHERCHE
    // ------------------

    public function searchBar($search)
    {

        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM annonces WHERE upper(titre) LIKE ? OR upper(ville) LIKE  ? OR upper (contenu) LIKE ?  ");
        $req->execute(array('%'.$search.'%' , '%'.$search.'%' , '%'.$search.'%'  ));
        $result = $req->fetchAll();
    
        return $result;

    }


    // -------------
    // LIKE ANNNONCE
    // -------------


    public function incrementJaime($id) {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE annonces SET jaime = jaime + 1 WHERE id = :id');
        $success = $req->execute(array(
            "id" => $id
        ));
                
        return $success;
    }

    // ---------------
    // DISLIKE ANNONCE
    // ---------------


    public function incrementJaimepas($id) {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE annonces SET jaimepas = jaimepas + 1 WHERE id = :id');
        $success = $req->execute(array(
            "id" => $id
        ));
                
        return $success;
    }
    

}

