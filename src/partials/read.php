<?php

    $sql = "SELECT * FROM messages ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>