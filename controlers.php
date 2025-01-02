<?php
require 'connect.php';
require 'model_formation.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $titre=$_POST['titre'];
    $prix=$_POST['prix'];
    $date_debut=$_POST['date_debut'];
    $date_fin=$_POST['date_fin'];
    $capacite=$_POST['capacite'];

    $formation=new model_formation($conn);
    $formation->addFormation($titre,$prix,$date_debut,$date_fin,$capacite);

    echo "formation ajoutee avec succes";
}

?>