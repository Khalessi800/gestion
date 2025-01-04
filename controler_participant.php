<?php
require 'connect.php'; 
require 'model_participant.php';  
require 'validation copy.php'; 

class Ctr_participant
{
    private Participant $model;

    public function __construct($conn)
    {
        $this->model = new Participant($conn);
        $this->addParticipant();
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
        $formations=$this->model->getFormation();
        include 'form_participant.php';
    }
}

$controller = new Ctr_participant($conn);
?>
