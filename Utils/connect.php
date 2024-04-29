<?php
function luoPDOYhteys($palvelin, $tietokanta, $tunnus, $salasana) {
    try {
        $yhteys = new PDO("mysql:host=$palvelin;dbname=$tietokanta;charset=utf8", $tunnus, $salasana);

        $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $yhteys;
    } catch (PDOException $e) {
        throw new Exception("Tietokantayhteyden avaaminen epäonnistui: " . $e->getMessage());
    }
}
?>