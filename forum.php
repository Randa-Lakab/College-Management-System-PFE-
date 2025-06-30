<?php
// Vérifie si le formulaire est soumis via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et sécurisation des données
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $age = (int) $_POST['age'];
    $sexe = isset($_POST['sexe']) ? htmlspecialchars(trim($_POST['sexe'])) : '';
    $type_sys = htmlspecialchars(trim($_POST['type_sys']));
    $contact = htmlspecialchars(trim($_POST['contact']));
    $dossier_medical = htmlspecialchars(trim($_POST['dossier_medical']));

    // Vérification des champs obligatoires
    if (
        empty($nom) || empty($prenom) || $age <= 0 || $age > 130 ||
        empty($sexe) || empty($type_sys) || empty($contact) || empty($dossier_medical)
    ) {
        echo "<h2 style='color: red;'>❌ يرجى ملء جميع الحقول بشكل صحيح.</h2>";
        exit;
    }

    // Exemple de traitement (par exemple : enregistrer dans un fichier ou une base de données)
    // Ici on enregistre dans un fichier texte pour simplifier
    $data = "Nom: $nom\nPrénom: $prenom\nÂge: $age\nSexe: $sexe\nType: $type_sys\nContact: $contact\nDossier médical: $dossier_medical\n---\n";

    file_put_contents("inscriptions.txt", $data, FILE_APPEND | LOCK_EX);

    echo "<h2 style='color: green;'>✅ تم إرسال المعلومات بنجاح !</h2>";
    echo "<a href='index.html'>العودة إلى الصفحة الرئيسية</a>";
} else {
    echo "<h2 style='color: red;'>طريقة الإرسال غير صالحة.</h2>";
}
?>
