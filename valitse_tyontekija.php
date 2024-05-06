<?php // Otetaan yhteys tietokantaan
require_once 'Utils/connect.php';

// Tarkista, että lomake on lähetetty
if (isset($_POST["submit"])){
    // Lomakkeen tiedot
    $tehtava_id = $_POST['tehtava_id'];
    $valittu_tyontekija_id = $_POST['valintamenu']; // Valintamenun valinta

    // Tallenna valittu työntekijä tietokantaan
    $sql = "UPDATE tehtavataulu SET tyontekija_id = :tyontekija_id WHERE id = :tehtava_id";
    $stmt = $yhteys->prepare($sql);
    $stmt->bindParam(':tyontekija_id', $valittu_tyontekija_id);
    $stmt->bindParam(':tehtava_id', $tehtava_id);
    
    // Suorita kysely
    if ($stmt->execute()) {
        // Ohjaa takaisin edelliselle sivulle tai tee jotain muuta tarpeellista
        header("Location: isannoitsija.php");
        exit();
    } else {
        echo "Virhe tallennettaessa työntekijää.";
    }
} 

?>
