<?php


// Ollaan samassa kansiossa joten Utils/ ei tarvita
require_once 'connect.php';

// Tarkista, onko saatu POST-pyyntö delete_id-parametrilla
if(isset($_POST['delete_id'])){
    // Hae poistettavan tehtävän ID lomakkeen kentästä
    $delete_id = $_POST['delete_id'];

    try {
        // Valmistele DELETE-kysely tietokantaan
        $sql = "DELETE FROM tehtavataulu WHERE id = :id";
        $stmt = $yhteys->prepare($sql);
        $stmt->bindValue(':id', $delete_id, PDO::PARAM_INT);
        
        // Suorita poistokysely
        $stmt->execute();

        // Ohjaa takaisin pääsivulle onnistuneen poiston jälkeen
        header("location: ../index.php");
        exit();
    } catch (PDOException $e) {
        // Virheen käsittely, jos poisto epäonnistuu
        echo "Poistaminen epäonnistui: " . $e->getMessage();
        exit();
    }
} else {
    // Jos delete_id-parametria ei ole asetettu, ohjaa takaisin pääsivulle
    header("location: ../tyontekija.php");
    exit();
}
?>
