<?php
$server="localhost";
$dbname="Centre de formations";
$username="root";
$password="";
try{
    $conn = new PDO("mysql:host=localhost;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}catch(PDOException $e){
    echo "erreur dans la connexion: ".$e->getMessage();

}
 
?>