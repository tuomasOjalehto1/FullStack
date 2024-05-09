<?php
require_once 'Utils/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'], $_POST['status'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

    // Päivitä tietokantaa uudella statuksella
    $sql = "UPDATE otayhteyttataulu SET status = :status WHERE id = :id";
    $stmt = $yhteys->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        // Ohjaa käyttäjä takaisin samaan sivuun viestin päivityksen jälkeen
        header("Location: isannoitsija.php");
        exit;
    } else {
        echo "Päivitys epäonnistui.";
    }
}
?>
