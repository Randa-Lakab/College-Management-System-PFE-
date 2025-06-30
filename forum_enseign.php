<?php
// Vérifier que la requête est bien de type POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Fonction de nettoyage des entrées
    function nettoyer($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Récupération et nettoyage des données du formulaire
    $nom = nettoyer($_POST["nom"] ?? "");
    $prenom = nettoyer($_POST["prenom"] ?? "");
    $occupation = nettoyer($_POST["occupation"] ?? "");
    $sexe = nettoyer($_POST["sexe"] ?? "");
    $type = nettoyer($_POST["type"] ?? "");
    $email = nettoyer($_POST["email"] ?? "");
    $dossier = nettoyer($_POST["dossier"] ?? "");

    // Vérification des champs obligatoires
    if (empty($nom) || empty($prenom) || empty($occupation) || empty($sexe) || empty($type) || empty($email) || empty($dossier)) {
        echo "❌ يرجى ملء جميع الحقول المطلوبة.";
        exit;
    }

    // Validation de l'adresse email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "❌ البريد الإلكتروني غير صالح.";
        exit;
    }

    // Enregistrement dans un fichier texte (tu peux le remplacer par une base de données)
    $ligne = "Nom: $nom | Prénom: $prenom | Occupation: $occupation | Sexe: $sexe | Type: $type | Email: $email | Dossier: $dossier\n";
    file_put_contents("enseignants.txt", $ligne, FILE_APPEND | LOCK_EX);

    // Message de confirmation
    echo "✅ تم إرسال معلومات الأستاذ بنجاح.";
} else {
    echo "❌ طريقة الطلب غير صحيحة.";
}
?>
