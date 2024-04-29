<?php
//Tässä samaan tapaan kuin backend kursssilla index.php tiedososta löytyy esimerkki
try {
   // header("Content-Type: text/html; charset=utf-8");
    $palvelin   = "localhost";
    $tietokanta = "kiinteistohuoltodb";
    $tunnus     = "testiuser";
    $salasana   = "salasana12";

    $yhteys = new PDO("mysql:host=$palvelin;dbname=$tietokanta;charset=utf8", "$tunnus", "$salasana");
    $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Onnistui!";
    
} catch (PDOException $e) {
    print "<p>Tietokantayhteyden avaaminen epäonnistui.</p>" . $e ->getMessage() . $e -> getMessage();
}