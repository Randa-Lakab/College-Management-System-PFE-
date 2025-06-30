<?php
$host = "localhost";
$user = "root";
$password = ""; // Laisse vide si tu n’as pas mis de mot de passe MySQL
$dbname = "gestion_du_college";

$conn = new mysqli($host, $user, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>