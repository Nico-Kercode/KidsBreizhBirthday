<?php
namespace Kbb\Model;

use \kbb\model\Manager;
use \Exception;
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

    public function getBestAnnonces()
    {
       
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id_ANNONCES , titre, logo, photo1, COUNT(*) as nbrlike
        FROM votes INNER JOIN annonces ON annonces.id= votes.id_ANNONCES
        GROUP BY id_ANNONCES
        ORDER BY nbrlike DESC
        LIMIT 10
        ');
        $req->execute(array());
        $bestAnnonces=$req->fetchAll();
        $req->closeCursor();
        
        return $bestAnnonces;
    }

    public function getLikes($id)
    {
        $db = $this->dbConnect();
        $resultat = $db->query("SELECT COUNT(type) as totalLike FROM votes 
        WHERE votes.id_ANNONCES= $id AND type=1");
        $count = $resultat->fetch();
        $like=$count['totalLike'];
        $resultat->closeCursor();

        return $like;

    }

    public function getDisLikes($id)
    {
        $db = $this->dbConnect();
        $resultat = $db->query("SELECT COUNT(type) as totalDisLike FROM votes 
        WHERE votes.id_ANNONCES= $id AND type=2");
        $count = $resultat->fetch();
        $disLike=$count['totalDisLike'];
        $resultat->closeCursor();

        return $disLike;

    }
   


    public function getAnnonce($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT annonces.id , ville, logo, titre, presentation, descriptif, contact,  photo1 ,photo2 ,pseudo
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
        $resultat = $db->query('SELECT COUNT(*) AS total FROM annonces');
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
        $req = $db->prepare("SELECT * FROM annonces WHERE upper(titre) LIKE ? OR upper(ville) LIKE  ? OR upper (descriptif) LIKE ?
        OR upper (presentation) LIKE ?  ");
        $req->execute(array('%'.$search.'%' , '%'.$search.'%' , '%'.$search.'%', '%'.$search.'%'  ));
        $result = $req->fetchAll();
    
        return $result;

    }


    // ----------------
    // LIKE ANNNONCE
    // -------------


    public function incrementJaime($id_ANNONCES,$id_MEMBRES,$type) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO votes (id_ANNONCES, id_MEMBRES, type) VALUES(:id_ANNONCES,:id_MEMBRES,:type) ');
        $like= $req->execute(array(
            "id_ANNONCES"=>$id_ANNONCES,
            "id_MEMBRES"=>$id_MEMBRES,
            "type" =>$type
        ));
                
        return $like;
    }

    // ----------------
    // AJOUT SELECTION
    // ----------------

    public function addSelection($id_ANNONCES, $id_MEMBRES) {

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO selection (id_ANNONCES, id_MEMBRES) VALUES(:id_ANNONCES,:id_MEMBRES) ');
        $selection= $req->execute(array(
            "id_ANNONCES"=>$id_ANNONCES,
            "id_MEMBRES"=>$id_MEMBRES
        ));
                
        return $selection;



    }

    public function getSelection($id_MEMBRES) {

        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id_ANNONCES , titre, logo, photo1, COUNT(*) as nbrSelection
        FROM selection INNER JOIN annonces ON annonces.id= selection.id_ANNONCES WHERE selection.id_MEMBRES= :id_MEMBRES
        GROUP BY id_ANNONCES');
        $req->execute(array(

            "id_MEMBRES"=>$id_MEMBRES
        )); 
        $getSelection = $req->fetchAll();
        $req->closeCursor();
       
        return $getSelection;


    }

    public function countSelection($id_MEMBRES){

        $db = $this->dbConnect();
        $resultat = $db->query("SELECT COUNT(*) AS nbre FROM selection WHERE id_MEMBRES= $id_MEMBRES");
        $count = $resultat->fetch();
        $totalSelection=$count['nbre'];
        $resultat->closeCursor();
        return $totalSelection;
    }

       
    
    public function suppSelection($id_ANNONCES) {

        $db = $this->dbConnect();
        $viderSelection = $db->prepare("DELETE FROM selection WHERE id_ANNONCES =? ");
        $viderSelection->execute(array($id_ANNONCES));

        return $viderSelection;


    }
    


}

