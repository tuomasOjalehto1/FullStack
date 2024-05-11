

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Katsoo onko checkbox ruksattu
    $kaytettavissa = isset($_POST["kaytettavissa"]) ? true : false;
    
    //Tallentaa tietokantaan
    require_once 'connect.php';

    $sql = "UPDATE tyontekijataulu SET omatila = :omatila WHERE id = :tyontekija_id";
    $stmt = $yhteys->prepare($sql);
    $stmt->execute([
        ':omatila' => $kaytettavissa,
        ':tyontekija_id' => $_SESSION["id"]
    ]);

    
    header("Location: ../tyontekija.php");
    exit();
}
?>
