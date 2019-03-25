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

    // -------------------------------------------
    // RECUPERE le nombre de "j'aime"
    // -------------------------------------------


    public function getLikes($id)
    {
        $db = $this->dbConnect();
        $resultat = $db->query("SELECT COUNT(type) as totalLike FROM votes 
        WHERE votes.id_ANNONCES= $id AND type=1 ");
        $count = $resultat->fetch();
        $like=$count['totalLike'];
        $resultat->closeCursor();

        return $like;

    }
    
    // si déja aimé masque les boutons j'aime et j'aime pas puis affiche le compteur 
    public function limitLike($id){

        $membre=$_SESSION['id'];
        $db = $this->dbConnect();
        $resultat = $db->query("SELECT COUNT(type)AS vote FROM votes WHERE type=1 AND votes.id_MEMBRES=$membre  AND id_ANNONCES =$id");
        $count = $resultat->fetch();
        $totalLike=$count['vote'];
        $resultat->closeCursor();

        return $totalLike;

    }
    // -------------------------------------------
    // RECUPERE le nombre de "je n'aime pas"
    // -------------------------------------------


    public function getDisLikes($id)
    {
        $db = $this->dbConnect();
        $resultat = $db->query("SELECT COUNT(type) as totalDisLike FROM votes 
        WHERE votes.id_ANNONCES= $id AND type=2 ");
        $count = $resultat->fetch();
        $disLike=$count['totalDisLike'];
        $resultat->closeCursor();

        return $disLike;

    }

    // si déja aimé masque les boutons j'aime et j'aime pas puis affiche le compteur 

    public function DisLike($id)
    {

        $membre=$_SESSION['id'];
        $db = $this->dbConnect();
        $resultat = $db->query("SELECT COUNT(type)AS vote FROM votes WHERE type=2 AND votes.id_MEMBRES=$membre  AND id_ANNONCES =$id");
        $count = $resultat->fetch();
        $totalDisLike=$count['vote'];
        $resultat->closeCursor();

        return $totalDisLike;

    }



   
    // AFFICHAGE D UNE ANNONCE

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

    // INFO D UNE ANNONCE AVANT EDITION 

    public function getThisAnnonce($id_ANNONCES){

        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * 
        FROM annonces WHERE annonces.id = $id_ANNONCES");
        $req->execute(array());
        $thisAnnonce = $req->fetch();
        $req->closeCursor();

        return $thisAnnonce;
    }

    // LISTE DE TOUTES MES ANNONCES 

    public function getToutesMesAnnonces($id_MEMBRES)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT annonces.id , membres.id AS id_MEMBRES,  ville, logo, titre, presentation, descriptif, contact,  photo1 ,photo2 ,pseudo
        FROM annonces INNER JOIN membres ON id_MEMBRES = membres.id WHERE id_MEMBRES = $id_MEMBRES");
        $req->execute(array());
        $myAnnonces = $req->fetchall();
        $req->closeCursor();

        return $myAnnonces;    
        
    }

    // --------------------
    // EDITION ANNONCES
    // --------------------

    // Recupere les infos -> page edition 
    
    public function editAnnonce($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT annonces.id , ville, logo, titre, presentation, descriptif, contact,  photo1 ,photo2 ,pseudo
        FROM annonces INNER JOIN membres ON id_MEMBRES = membres.id WHERE annonces.id = ? ');
        $req->execute(array($id));
        $annonce = $req->fetch();
        $req->closeCursor();

        return $editAnnonce;
    }

    // Fonction EDITION Annonce + IMAGES 

    public function editAnnonces($id_ANNONCES,$ville,$newLogo,$titre,$presentation,$descriptif,$contact ,$newPhoto1,$newPhoto2){

        $db = $this->dbConnect();

        $requete='UPDATE annonces SET ville=(:ville), titre=(:titre), presentation=(:presentation), 
        descriptif=(:descriptif), contact=(:contact)' ;

        if(!empty($newLogo)){
            $requete = $requete. ",logo='$newLogo'";
        }
        if(!empty($newPhoto1)){

            $requete = $requete.",photo1='$newPhoto1'"; 
        }
        if(!empty($newPhoto2)){
            $requete = $requete.",photo2='$newPhoto2'"; 
        }
            $requete =$requete." WHERE annonces.id=(:id)";
            
        $updateannonce = $db->prepare($requete);
        $edit = $updateannonce->execute(array(
             "id" => $id_ANNONCES,
            "ville" => $ville,
            "titre"=>$titre,
            "presentation"=>$presentation,
            "descriptif"=>$descriptif,
            "contact"=>$contact
            
 
            ));
       
        return $edit;

    }


    public function deleteAnnonce($id_ANNONCES){


        $db = $this->dbConnect();
        $delete = $db->prepare("DELETE FROM annonces WHERE annonces.id =? ");
        $delete->execute(array($id_ANNONCES));

        return $delete;





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
        $total= $db->prepare('SELECT COUNT(*) as count FROM votes WHERE id_ANNONCES= :id_ANNONCES AND id_MEMBRES= :id_MEMBRES AND type= :type');
        $total->execute(array(
            "id_ANNONCES"=> $id_ANNONCES,
            "id_MEMBRES" =>$id_MEMBRES,
            "type" => $type
        ));       
        $count=$total->fetch();
        $total->closeCursor();
        
        if($count['count'] == 0) :

            $req = $db->prepare('INSERT INTO votes (id_ANNONCES, id_MEMBRES, type) VALUES(:id_ANNONCES,:id_MEMBRES,:type) ');
            $like= $req->execute(array(
                "id_ANNONCES"=>$id_ANNONCES,
                "id_MEMBRES"=>$id_MEMBRES,
                "type" =>$type
            ));
        endif;            
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

    // -------------------------------------------
    // RECUPERE les annonces ajoutées a la selection
    // -------------------------------------------

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

    // -------------------------
    // Supprime de la selection
    // -------------------------


    public function suppSelection($id_ANNONCES) {

        $db = $this->dbConnect();
        $viderSelection = $db->prepare("DELETE FROM selection WHERE id_ANNONCES =? ");
        $viderSelection->execute(array($id_ANNONCES));

        return $viderSelection;


    }
    


}

