<?php
    require_once 'connect.php';
      
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id']; 

    try {
        $stmt = $yhteys->prepare("DELETE FROM otayhteyttataulu WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Ohjaa käyttäjä takaisin yhteydenottolistaan tai näytä viesti
        header("Location: ../isannoitsija.php");
        exit;
    } catch (PDOException $e) {
        die("Poisto epäonnistui: " . $e->getMessage());
    }
} else {
    // Jos ID:tä ei ole annettu, ohjaa takaisin
    header("Location: isannoitsija.php");
    exit;
}
?>
