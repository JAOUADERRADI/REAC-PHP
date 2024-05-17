<?php

    require_once '../config/config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];

        $sql = "DELETE FROM messages WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header("Location: ../../public/index.php");
        } else {
            echo "Erreur lors de la suppression du message.";
        }
    }

?>

