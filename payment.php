<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécuriser et récupérer les données
    $cardNumber = htmlspecialchars(trim($_POST["cardNumber"]));
    $expiryDate = htmlspecialchars(trim($_POST["expiryDate"]));
    $cvv = htmlspecialchars(trim($_POST["cvv"]));
    $cardHolder = htmlspecialchars(trim($_POST["cardHolder"]));
    $amount = htmlspecialchars(trim($_POST["amount"]));

    $errors = [];

    // Vérification de base
    if (empty($cardNumber) || empty($expiryDate) || empty($cvv) || empty($cardHolder)) {
        $errors[] = "يرجى ملء جميع الحقول.";
    }

    // Vérification format numéro de carte (simple, 16 chiffres ou séparés par des tirets)
    if (!preg_match("/^(\d{4}-){3}\d{4}$|^\d{16}$/", $cardNumber)) {
        $errors[] = "صيغة رقم البطاقة غير صحيحة.";
    }

    // Vérification CVV (3 ou 4 chiffres)
    if (!preg_match("/^\d{3,4}$/", $cvv)) {
        $errors[] = "رمز الأمان غير صحيح.";
    }

    // Affichage des erreurs
    if (!empty($errors)) {
        echo "<h3 style='color: red; text-align: center;'>حدثت الأخطاء التالية:</h3>";
        echo "<ul style='color: red; text-align: center;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "<div style='text-align: center;'><a href='javascript:history.back()'>⬅️ العودة لتصحيح البيانات</a></div>";
        exit();
    }

    // Simuler une confirmation de paiement
    echo "<h2 style='text-align: center; color: green;'>✅ تم الدفع بنجاح!</h2>";
    echo "<p style='text-align: center;'>شكرًا لك، $cardHolder. تم حجز جلستك بنجاح بمبلغ $amount.</p>";
    echo "<div style='text-align: center; margin-top: 20px;'><a href='index1.html'>🏠 العودة للصفحة الرئيسية</a></div>";
}
?>
