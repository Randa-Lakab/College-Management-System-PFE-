<?php
include('connexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_enseignant = $_POST['nom_enseignant'];
    $titre = $_POST['titre'];
    $datetime = $_POST['datetime'];

    $sql = "INSERT INTO sessions (nom_enseignant, titre, datetime)
            VALUES ('$nom_enseignant', '$titre', '$datetime')";

    if ($conn->query($sql) === TRUE) {
        echo "تم إنشاء الجلسة بنجاح.";
    } else {
        echo "خطأ في إنشاء الجلسة: " . $conn->error;
    }

    $conn->close();
}
?>