<?php
require_once 'connect.php';

function haeTyontekijat($yhteys) {
    try {
        $tyontekijat = [];
        $sql = "SELECT id, CONCAT(etunimi, ' ', sukunimi) AS nimi FROM tyontekijataulu";
        $stmt = $yhteys->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tyontekijat[$row['id']] = $row['nimi'];
        }
        return $tyontekijat;
    } catch (PDOException $e) {
        error_log("Virhe työntekijöiden haussa: " . $e->getMessage());
        return []; // Palauta tyhjä taulukko virhetilanteessa
    }
    
}

