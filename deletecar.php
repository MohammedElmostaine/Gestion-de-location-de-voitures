<?php
include "config.php"
?>
<?php

if ($connection->connect_error) {
    die("Erreur de connexion : " . $connection->connect_error);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = mysqli_query($connection,"DELETE FROM voitures WHERE Nimmatriculation = '$id'");
    header("Location: voiturelist.php");


} 

?>
