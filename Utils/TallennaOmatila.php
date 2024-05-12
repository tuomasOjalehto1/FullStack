<?php
session_start();

// Varmista, että istunto on alustettu ja $_SESSION['id'] on saatavilla
if (!isset($_SESSION['id'])) {
    // Ohjaa tarvittaessa käyttäjä kirjautumissivulle tms.
    header("Location: kirjautumissivu.php");
    exit();
}

// Katsoo onko post-metodia käytetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tarkistetaan onko checkbox ruksattu
    $kaytettavissa = isset($_POST["kaytettavissa"]) ? 1 : 0; 
    
    // Tallennetaan tietokantaan
    require_once 'connect.php';

    $sql = "UPDATE tyontekijataulu SET omatila = :omatila WHERE id = :tyontekija_id";
    $stmt = $yhteys->prepare($sql);
    $stmt->execute([
        ':omatila' => $kaytettavissa,
        ':tyontekija_id' => $_SESSION["id"]
    ]);

    // Ohjaa takaisin työntekijä.php-sivulle
    header("Location: ../tyontekija.php");
    exit();
} else {
    // Jos ei ollut POST-metodia, ohjaa sivulle takaisin
    header("Location: ../tyontekija.php");
    exit();
}
?>
