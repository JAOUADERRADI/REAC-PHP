<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stored_username = "utilisateur";
    $stored_hashed_password = password_hash("motdepasse", PASSWORD_DEFAULT);

    if ($username === $stored_username && password_verify($password, $stored_hashed_password)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
