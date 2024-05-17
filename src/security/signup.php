<?php
require_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if (empty($username) || empty($email) || empty($password)) {
        echo "Veuillez remplir tous les champs.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'insertion : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
