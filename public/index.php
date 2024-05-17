<?php

    require_once '../src/config/config.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chat</title>
        <link rel="stylesheet" href="/css/styles.css">
    </head>
    <body>
        <div class="chat-container">
            <div class="chat-header">
                <h2>Chat Room</h2>
            </div>
            <div class="chat-messages" id="chat-messages">
            <?php

                include '../src/partials/read.php';

                foreach ($messages as $message) {
                    echo '<div class="message">';
                    echo '<span>' . htmlspecialchars($message['message']) . '</span>';
                    echo '<form method="POST" action="../src/partials/delete.php" style="display:inline;">';
                    echo '<input type="hidden" name="id" value="' . $message['id'] . '">';
                    echo '<button class="delete-button">Delete</button>';
                    echo '</form>';
                    echo '</div>';
                }

            ?>


            </div>
            <div class="chat-input">
                <form method="POST" action="../src/partials/create.php">
                    <input type="text" name="message" placeholder="Votre message..." required>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </body>
</html>
