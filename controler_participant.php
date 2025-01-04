<?php
require 'connect.php'; 
require 'model_participant.php';  
require 'model_formation.php';
require 'validation copy.php'; 

class Ctr_participant
{
    private Participant $model;
    private Formation $formation;

    public function __construct($conn)
    {
        $this->model = new Participant($conn);
        $this->formation=new Formation($conn);
        #$this->addParticipant();
    }

    public function addParticipant() 
    {
        if ($_SERVER["REQUEST_METHOD"] != 'POST')
        {
            echo "Invalid request method";
            return;
        }

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $background = $_POST['background'];
        $dateInscription = $_POST['dateInscription'];
        $formation_id=$_POST['formation_souhaitee'];

        $validationResult = validateParticipantData($nom, $prenom, $email, $background,$formation_id);
        if ($validationResult !== true)
        {
            echo $validationResult; 
            return;
        }

        try
        {
            $this->model->addParticipant($nom, $prenom, $email, $background, $dateInscription,$formation_id);
            echo "participant added successfully"; 
        }
        catch (Exception $e)
        {
            echo "Error adding participant: " . $e->getMessage();
        }
    }

    public function show(){
        $formations=$this->formation->getFormation();
        include 'form_participant.php';
    }
}

$controller = new Ctr_participant($conn);
?>
