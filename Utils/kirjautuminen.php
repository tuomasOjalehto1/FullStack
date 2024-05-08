<?php
session_start();

// Otetaan yhteys tietokantaan
require_once 'connect.php';

if (isset($_SESSION['kayttajatunnus'])) {
    header("location: index.php");
    exit; // Keskeytetään suoritus, jos käyttäjä on jo kirjautunut
}

if (isset($_POST['submit'])) {
    if ($_POST['kayttajatunnus'] == '' || $_POST['salasana'] == '') {
        echo '<script>alert("Tietoja puuttuu!");</script>';
    } else {
        $kayttajatunnus = $_POST['kayttajatunnus'];
        $salasana = $_POST['salasana'];

        // Haetaan käyttäjä tietokannasta käyttäjätunnuksen perusteella
        $query = $yhteys->prepare("SELECT * FROM kayttaja_ja_salasana WHERE kayttajatunnus = :kayttajatunnus");
        $query->execute([':kayttajatunnus' => $kayttajatunnus]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // Tarkistetaan löytyykö käyttäjää ja onko salasana oikein (tekstimuodossa)
        if ($user && $salasana == $user['salasana']) {
            // Kirjautuminen onnistui, tallennetaan käyttäjäsessio
            $_SESSION['kayttajatunnus'] = $user['kayttajatunnus'];

            // Ohjataan roolin perusteella oikealle sivulle
            switch ($user['rooli']) {
                case 1:
                    // Haetaan asiakkaan id
                    $query_asiakas = $yhteys->prepare("SELECT id FROM asiakastaulu WHERE sposti = :email");
                    $query_asiakas->execute([':email' => $user['sposti']]);
                    $asiakas = $query_asiakas->fetch(PDO::FETCH_ASSOC);

                    // Tallennetaan id session muuttujaan
                    $_SESSION["id"] = $asiakas['id'];

                    // Debugging output to confirm session variables
                    echo "User ID set: " . $_SESSION["id"];

                    header("location: ../asukas.php");
                    exit;
                case 2:
                    header("location: ../isannoitsija.php");
                    exit;
                case 3:
                    // Haetaan työntekijän id tyontekijataulusta
                    $query_tyontekija = $yhteys->prepare("SELECT id FROM tyontekijataulu WHERE sposti = :email");
                    $query_tyontekija->execute([':email' => $user['sposti']]);
                    $tyontekija = $query_tyontekija->fetch(PDO::FETCH_ASSOC);

                    // Tallennetaan id session muuttujaan
                    $_SESSION["id"] = $tyontekija['id'];

                    // Debugging output to confirm session variables
                    echo "User ID set: " . $_SESSION["id"];

                    header("location: ../tyontekija.php");
                    exit;
                default:
                    echo '<script>alert("Virheellinen rooli!");</script>';
                    break;
            }
        } else {
            echo '<script>alert("Käyttäjätunnus tai salasana on väärin!");</script>';
        }
    }
}
?>
