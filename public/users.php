<?php

    require_once '../src/config/config.php';


    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<p>{$row['username']}</p>";
            echo "<a href='envoyer_message.php?recipient_id={$row['id']}'>Envoyer un message</a>";
            echo "</div>";
        }
    } else {
        echo "Aucun utilisateur trouvé.";
    }
?>
