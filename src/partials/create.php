<?php

    require_once '../config/config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['message'])) {
            $message = $_POST['message'];

            $sql = "INSERT INTO messages (message) VALUES (:message)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':message', $message);

            if ($stmt->execute()) {
                header("Location: ../../public/index.php");
                exit();
            } else {
                echo "Erreur lors de l'ajout du message.";
            }
        } else {
            echo "Le champ 'message' est requis.";
        }

    }

?>
