<?php 

$server = "localhost";
$user = "root";
$pass = "";
$db = "inces_inventario";


try {
    
    $conex = new PDO("mysql:host=$server;dbname=$db", $user,$pass);
    
} catch (PDOException $e) {
    echo "Error pa" ;
}

?>