<?php
    $servername="localhost";
    $username="root";
    $password="";

    try {
        $db = new PDO("mysql:host=$servername;dbname=banque", $username, $password);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed";
    }
?>

