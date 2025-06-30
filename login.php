<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $username = htmlspecialchars($username);
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);

    $errors = [];

    if (empty($username) || empty($email) || empty($password)) {
        $errors[] = "يرجى ملء جميع الحقول.";
    }

    if (!preg_match("/^[\x{0621}-\x{064A}\s]+$/u", $username)) {
        $errors[] = "الاسم يجب أن يحتوي على حروف عربية فقط.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "صيغة البريد الإلكتروني غير صحيحة.";
    }

    if (strlen($password) < 8) {
        $errors[] = "كلمة المرور يجب أن تتكون من 8 أحرف على الأقل.";
    }

    if (empty($errors)) {
        // (optionnel) enregistrer l'utilisateur dans la session ou la base de données ici

        // Redirection vers Read More Courses.html
        header("Location: Read More Courses.html");
        exit(); // Très important : arrête le script après redirection
    } else {
        // Affichage des erreurs
        foreach ($errors as $error) {
            echo "<div style='text-align:center; color: red;'>$error</div>";
        }
    }
}
?>
