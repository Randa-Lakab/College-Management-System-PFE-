<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et sécurisation des données du formulaire

    $sheikh = htmlspecialchars(trim($_POST["sheikh"]));
    $date = htmlspecialchars(trim($_POST["date"]));
    $time = htmlspecialchars(trim($_POST["time"]));
    $notes = htmlspecialchars(trim($_POST["notes"]));

    $errors = [];

    // Vérifications de base
    if (empty($sheikh) || empty($date) || empty($time)) {
        $errors[] = "يرجى ملء جميع الحقول المطلوبة.";
    }

    // Validation de la date (facultatif, selon ton besoin)
    if (strtotime($date) < strtotime(date("Y-m-d"))) {
        $errors[] = "لا يمكن حجز جلسة في تاريخ سابق.";
    }

    // Affichage des erreurs ou redirection
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div style='color: red; text-align: center;'>$error</div>";
        }
        echo "<div style='text-align: center;'><a href='javascript:history.back()'>⬅️ العودة للتصحيح</a></div>";
    } else {
        // Ici tu peux enregistrer la réservation dans une base de données, si tu veux

        // Redirection vers la page de paiement
        header("Location: payai.html");
        exit();
    }
}
?>
