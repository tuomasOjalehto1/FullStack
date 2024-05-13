<?php
require_once 'connect.php';

/**
 * Hakee kaikki tehtävät tietokannasta muunnellen huoltotyyppiä.
 * 
 * @param PDO $yhteys Tietokantayhteyden PDO-olio.
 * @return array Lista tehtävistä assosiaatiotaulukkoina.
 */
function haeTehtavat($yhteys) {
    $results = [];
    $sql = "SELECT t.id AS TehtavaID, t.ilmoittajanid, t.etunimi AS IlmoittajanEtunimi, t.sukunimi AS IlmoittajanSukunimi, 
            t.osoite AS Osoite, t.kuvaus AS Kuvaus, t.tyontekija_id, t.valmis, ty.etunimi AS TyontekijanEtunimi, ty.sukunimi AS TyontekijanSukunimi,
            CASE t.huoltopyynnontyyppi 
                WHEN 1 THEN 'Huolto- tai korjaus'
                WHEN 2 THEN 'Siivous'
                WHEN 3 THEN 'Ulkoalueiden hoito'
                ELSE 'Tuntematon tyyppi'
            END AS Huoltotyyppi
            FROM tehtavataulu t
            LEFT JOIN tyontekijataulu ty ON t.tyontekija_id = ty.id";
    try {
        $stmt = $yhteys->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Tietokantavirhe: ' . $e->getMessage());
    }
    return $results;
}

?>
