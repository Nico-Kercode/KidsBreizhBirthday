<?php

namespace kbb\Model;

class Post {
   
    private $id;
    private $ville;
    private $logo;
    private $titre;
    private $contenu;
    private $photo1;
    private $photo2;
    private $photo3;
    private $id_MEMBRES;

    public function id() {
        return $this->id;
    }

    public function ville() {
        return $this->ville;
    }

    public function logo() {
        return $this->logo;
    }

    public function titre() {
        return $this->titre;
    }

    public function contenu() {
        return $this->contenu;
    }
    public function photo1() {
        return $this->photo1;
    }
    public function photo2() {
        return $this->photo2;
    }
    public function photo3() {
        return $this->photo3;
    }
    public function id_MEMBRES() {
        return $this->id_MEMBRES;
    }

    public function __construct(array $data) {
        $this->hydrate($data);
    }
// id, ville, logo, titre, contenu, photo1, photo2, photo3,id_MEMBRES 
    private function hydrate(array $data) {
        $this->id = $data['id'];
        $this->ville = $data['ville'];
        $this->logo = $data['logo'];
        $this->titre = $data['titre'];
        $this->contenu = $data['contenu'];
        $this->photo1 = $data['photo1'];
        $this->photo2 = $data['photo2'];
        $this->photo3 = $data['photo3'];
        $this->id_MEMBRES = $data['id_MEMBRES'];
    }
}

?>