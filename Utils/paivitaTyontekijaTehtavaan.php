<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tehtava_id = $_POST['tehtava_id'];
    $tyontekija_id = $_POST['tyontekija_id'];

    // Varmista, että id:t ovat kokonaislukuja (esimerkki validoinnista)
    $tehtava_id = filter_var($tehtava_id, FILTER_SANITIZE_NUMBER_INT);
    $tyontekija_id = $tyontekija_id !== '' ? filter_var($tyontekija_id, FILTER_SANITIZE_NUMBER_INT) : NULL;

    $sql = "UPDATE tehtavataulu SET tyontekija_id = :tyontekija_id WHERE id = :tehtava_id";
    $stmt = $yhteys->prepare($sql);

    // Virheenkäsittely
    try {
        $stmt->execute(['tyontekija_id' => $tyontekija_id, 'tehtava_id' => $tehtava_id]);
        header("Location: ../isannoitsija.php"); // Ohjaa käyttäjän takaisin isännöitsijän sivulle.
        exit();
    } catch (PDOException $e) {
        die('Tietokantavirhe: ' . $e->getMessage()); // Virhetilanteen käsittely.
    }
}

?>
