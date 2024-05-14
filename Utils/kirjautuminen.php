<?php
session_start();

// Otetaan yhteys tietokantaan
require_once 'connect.php';

if (isset($_SESSION['sposti'])) {
    $_SESSION['error'] = "Olet jo kirjautunut sisään.";
    header("location: ../index.php");
    exit; // Keskeytetään suoritus, jos käyttäjä on jo kirjautunut
}

if (isset($_POST['submit'])) {
    if ($_POST['sposti'] == '' || $_POST['salasana'] == '') {
        $_SESSION['error'] = "Tietoja puuttuu.";
        header("location: ../kirjautumissivu.php");
        exit;
    } else {
        $kayttajatunnus = $_POST['sposti'];
        $salasana = $_POST['salasana'];

        // Haetaan käyttäjä tietokannasta käyttäjätunnuksen perusteella
        $query = $yhteys->prepare("SELECT * FROM kayttaja_ja_salasana WHERE sposti = :sposti");
        $query->execute([':sposti' => $kayttajatunnus]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // Tarkistetaan löytyykö käyttäjää ja onko salasana oikein (tekstimuodossa)
        if ($user && $salasana == $user['salasana']) {
            // Kirjautuminen onnistui, tallennetaan käyttäjäsessio
            $_SESSION['sposti'] = $user['sposti'];
            $_SESSION['rooli'] = $user['rooli']; // Tallennetaan myös rooli sessiomuuttujaan

            // Ohjataan roolin perusteella oikealle sivulle
            switch ($user['rooli']) {
                case 1:
                     // Haetaan asiakkaan id asiakastaulusta käyttäjän sähköpostiosoitteen perusteella
                    $query_asiakas = $yhteys->prepare("SELECT id FROM asiakastaulu WHERE sposti = :sposti");
                    $query_asiakas->execute([':sposti' => $user['sposti']]);
                    $asiakas = $query_asiakas->fetch(PDO::FETCH_ASSOC);

                    if ($asiakas) {
                        $_SESSION["id"] = $asiakas["id"];
                        header("location: ../asukas.php");
                        exit;
                    } else {
                        $_SESSION['error'] = "Asiakasta ei löytynyt.";
                        header("location: ../kirjautumissivu.php");
                        exit;
                    }
                    break;
                case 2:
                    //Haetaan isännöitsijä
                    $query_isannoitsija = $yhteys->prepare("SELECT id FROM tyontekijataulu WHERE sposti = :sposti");
                    $query_isannoitsija->execute([':sposti' => $user['sposti']]);
                    $isannoitsija = $query_isannoitsija->fetch(PDO::FETCH_ASSOC);

                    if ($isannoitsija) {
                        $_SESSION["id"] = $isannoitsija["id"];
                        header("location: ../isannoitsija.php");
                        exit;
                    } else {
                        $_SESSION['error'] = "Isännöitsijää ei löytynyt.";
                        header("location: ../kirjautumissivu.php");
                        exit;
                    }
                    break;
                case 3:
                    // Haetaan työntekijän id tyontekijataulusta käyttäjän sähköpostiosoitteen perusteella
                    $query_tyontekija = $yhteys->prepare("SELECT id FROM tyontekijataulu WHERE sposti = :sposti");
                    $query_tyontekija->execute([':sposti' => $user['sposti']]);
                    $tyontekija = $query_tyontekija->fetch(PDO::FETCH_ASSOC);

                    if ($tyontekija) {
                        $_SESSION["id"] = $tyontekija["id"];
                        header("location: ../tyontekija.php");
                        exit;
                    } else {
                        $_SESSION['error'] = "Työntekijää ei löytynyt.";
                        header("location: ../kirjautumissivu.php");
                        exit;
                    }
                    break;
                default:
                    $_SESSION['error'] = "Virheellinen rooli.";
                    header("location: ../kirjautumissivu.php");
                    exit;
                    break;
            }
        } else {
            $_SESSION['error'] = "Käyttäjätunnus tai salasana on väärin.";
            header("location: ../kirjautumissivu.php");
            exit;
        }
    }
}

// Varmista virheiden näyttäminen
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
