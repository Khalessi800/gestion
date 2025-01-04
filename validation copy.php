<?php

function validateParticipantData($nom, $prenom, $email, $background, $dateInscription)
{
    if (!isset($nom) || !isset($prenom) || !isset($email) || !isset($background) || !isset($dateInscription))
    {
        return "All fields are required";
    }

    if (strlen($nom) < 2 || strlen($nom > 100) )
    {
        return "nom must be between 2 and 100 characters";
    }

    if (strlen($prenom) < 1 || strlen($prenom > 254))
    {
        return "prenom must be between 2 and 254 characters";
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return "invalid email format";
    }

    if(!empty($background) && strlen($background)<10){
        return "background must be at least 10 caratcters";
    }

    return true; 
}
?>