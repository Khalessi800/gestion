<?php
require 'connect.php';
require 'model_formation.php';
class Ctr_formation{
    private $model;
    public function __construct($conn){
        $this->model=new model_formation($conn);
    }

    public function addFormation(){
        if($_SERVER["REQUEST_METHOD"]=='POST'){
            $titre=$_POST['titre'];
            $prix=$_POST['prix'];
            $date_debut=$_POST['date_debut'];
            $date_fin=$_POST['date_fin'];
            $capacite=$_POST['capacite'];

            if($titre && $prix && $date_debut && $date_fin && $capacite){
                try{
                    $this->model->addFormation($titre,$prix,$date_debut,$date_fin,$capacite);
                    echo "formation ajoutee avec succes";
                }catch(Exception $e){
                    echo "Error adding formation: " . $e->getMessage();
                
                }
            }else{
                echo "all fields are required";
            }
         }else{
            echo "invalid request method";
         }

    }

}
 

?>
