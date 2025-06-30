<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "gestion_du_college";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Exemple d'insertion (à adapter selon ta table enseignants)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $conn->real_escape_string(trim($_POST['nom']));
    $prenom = $conn->real_escape_string(trim($_POST['prenom']));
    $sexe = $conn->real_escape_string($_POST['sexe']);
    $occupation = $conn->real_escape_string(trim($_POST['occupation']));
    $contact = $conn->real_escape_string(trim($_POST['contact']));
    $type_de_sys = $conn->real_escape_string($_POST['type_de_sys']);
    $dossier = $conn->real_escape_string(trim($_POST['dossier']));

    $sql = "INSERT INTO enseignants (nom, prenom, sexe, occupation, contact, type_de_sys, dossier)
            VALUES ('$nom', '$prenom', '$sexe', '$occupation', '$contact', '$type_de_sys', '$dossier')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>الأستاذ تم إضافته بنجاح!</p>";
    } else {
        echo "<p style='color:red;'>خطأ: " . $conn->error . "</p>";
    }
}
?>
