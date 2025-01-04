<?php
class Participant{
    private $conn;
    private $participant;

    public $idP;
    public $nom;
    public $prenom;
    public $email;
    public $background;
    public $dateInscription;
    public $formation_id;

    public function __construct($conn){
        $this->conn=$conn;

    }

    public function addParticipant() 
    {
        $sql = "INSERT INTO participants () 
                VALUES (?, ?, ?, ?, ?,?)";
        // echo $sql;
        $query = $this->conn->prepare($sql);
        $query->execute([$nom,$prenom,$email,$background,$dateInscription,$formation_id]);
    }
    
    public function deletePaticipant($idP){
        $sql="DELETE from formations where idP=:idP";
        $query=$this->conn->prepare($sql);
        $query->bindParam(':idP',$idP,PDO::PARAM_INT);
        $query->execute();
    }

    public function getFormation(){
        $sql="SELECT idF,nom FROM formations";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>