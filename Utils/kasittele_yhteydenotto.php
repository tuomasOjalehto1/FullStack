<?php
require_once 'connect.php';

// Tarkistetaan, onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Otetaan vastaan lomakkeen tiedot ja suodatetaan ne
    $etunimi = filter_input(INPUT_POST, 'etunimi', FILTER_SANITIZE_STRING);
    $sukunimi = filter_input(INPUT_POST, 'sukunimi', FILTER_SANITIZE_STRING);
    $puhelin = filter_input(INPUT_POST, 'puhelin', FILTER_SANITIZE_STRING);
    $yritys = filter_input(INPUT_POST, 'yritys', FILTER_SANITIZE_STRING);
    $sposti = filter_input(INPUT_POST, 'sposti', FILTER_SANITIZE_EMAIL);
    $viesti = filter_input(INPUT_POST, 'viesti', FILTER_SANITIZE_STRING);

    // Valmistellaan SQL-lause tietojen tallentamista varten
    try {
        $stmt = $yhteys->prepare("INSERT INTO otayhteyttataulu (etunimi, sukunimi, puhelin, yritys, sposti, viesti) VALUES (:etunimi, :sukunimi, :puhelin, :yritys, :sposti, :viesti)");
        $stmt->bindParam(':etunimi', $etunimi);
        $stmt->bindParam(':sukunimi', $sukunimi);
        $stmt->bindParam(':puhelin', $puhelin);
        $stmt->bindParam(':yritys', $yritys);
        $stmt->bindParam(':sposti', $sposti);
        $stmt->bindParam(':viesti', $viesti);
        
        $stmt->execute();

        $message = "<p class='alert alert-success text-center'>Viesti lähetetty onnistuneesti! Olemme sinuun pian yhteydessä.</p>";
    } catch(PDOException $e) {
        $message = "<p class='alert alert-danger text-center'>Tietokantaan lisääminen epäonnistui: " . $e->getMessage() . "</p>";
    }
}
?>