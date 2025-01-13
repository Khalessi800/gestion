<?php 
require_once "connect.php";
require_once "model_progression.php";

$progression = New Progression($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire pour ajouter une progression</title>
    <link rel="stylesheet" href="css/formp.css">
    <link rel="stylesheet" type="text/css" href="css/success.css"> 

</head>
<body>
    <form method='POST' action="controler/controler_participant.php">
    <label for="id">id_participant: </label>
    <input type="number" name="id participant" placeholder="Enter participant id" required>
    <br>
    
    <label for="id">id_formation:  </label>
    <input type="number" name="id formation" placeholder="Enter course id" required>

    <br>
    
    <label for="score_quiz">score de quiz: </label>
    <input type='number' name="score_quiz" placeholder="Enter quiz score" min="0" max="20" required>
    <br>
    
    <label for="termine">formation termine: </label>
    <input type='checkbox' name='termine' id='termine' required>
    <br>

    <button type="submit" name="submit">Ajouter Progression</button>
    </form>
</body>
</html>
