<?php
require_once 'connect.php';

// Tarkista, että kutsu on POST-metodilla ja että delete_id on asetettu
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    try {
        // Valmistele DELETE-kysely tietokantaan
        $sql = "DELETE FROM tehtavataulu WHERE id = :id";
        $stmt = $yhteys->prepare($sql);
        $stmt->bindValue(':id', $delete_id, PDO::PARAM_INT);

        // Suorita poistokysely
        $stmt->execute();

        // Ohjaa takaisin pääsivulle onnistuneen poiston jälkeen
        header("Location: ../isannoitsija.php");
        exit();
    } catch (PDOException $e) {
        // Tulosta virheilmoitus, jos poisto epäonnistuu
        echo "Poistaminen epäonnistui: " . $e->getMessage();
    }
} else {
    // Ohjaa takaisin isännöitsijän sivulle, jos delete_id:tä ei ole annettu tai metodi ei ole POST
    header("Location: ../isannoitsija.php");
    exit();
}
?>
