<?php
class Formation{
    private $conn;
    private $formations;

    public $idF;
    public $titre;
    public $prix;
    public $date_debut;
    public $date_fin;
    public $capacite;

    public function __contruct($conn){
        $this->conn=$conn;

    }

    public function addFormation($titre,$prix,$date_debut,$date_fin,$capacite){
        $sql="INSERT INTO formations(titre,prix,date_debut,date_fin,capacite) values(?,?,?,?,?)";
        $query=$this->conn->prepare($sql);
        $query->execute($titre,$prix,$date_debut,$date_fin,$capacite);
    }
    
    public function deleteFormation($idF){
        $sql="DELETE from formations where idF=:idF";
        $query=$this->conn->prepare($sql);
        $query->bindParam(':idF',idF,PDO::PARAM_INT);
        $query->execute();
    }
}