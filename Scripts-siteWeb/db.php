<?php
$servername = "localhost";
$database = "group29";
$username = "group29";
$password = "oJMref4w+u";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->query("SET NAMES utf8");
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>


<!-- $conn = null; -->