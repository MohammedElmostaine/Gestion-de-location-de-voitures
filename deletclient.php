<?php
include "config.php"
?>
<?php

if ($connection->connect_error) {
    die("Erreur de connexion : " . $connection->connect_error);
}

// Vérifier si l'id est passé en paramètre
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Préparer la requête de suppression
    $stmt = mysqli_query($connection,"DELETE FROM clients WHERE Nclient = '$id'");
    header("Location: index.php");


} 

?>
