<?php
session_start();

// Katsoo onko post metodia käytetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tarkistetaan onko checkbox ruksattu
    $kaytettavissa = isset($_POST["kaytettavissa"]) ? 1 : 0; 
    
    // Tallennetaan db:hen
    require_once 'connect.php';

    $sql = "UPDATE tyontekijataulu SET omatila = :omatila WHERE id = :tyontekija_id";
    $stmt = $yhteys->prepare($sql);
    $stmt->execute([
        ':omatila' => $kaytettavissa,
        ':tyontekija_id' => $_SESSION["id"]
    ]);

    // Åysyy sivulla
    header("Location: ../tyontekija.php");
    exit();
} else {
    // Pysytään sivulla kuitenkin
    header("Location: ../tyontekija.php");
    exit();
}
?>
