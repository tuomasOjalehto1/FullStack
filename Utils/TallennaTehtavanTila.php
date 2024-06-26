<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["id"])) {
    require_once 'connect.php';

    // Luetaan JSON-pyyntö joka tulee js tiedostosta CheckBox käsittely
    $postData = file_get_contents('php://input');
    $tehtavat = json_decode($postData, true);

    // Käsitellään kaikkiin tehdyt muutokset
    foreach ($tehtavat as $tehtava) {
        $tehtava_id = $tehtava['tehtava_id'];
        $valmis = $tehtava['valmis'];
        $kommentti = $tehtava['kommentti'];

        // Valmistele SQL-kysely tehtävän tilan ja kommentin päivittämiseksi
        $sql = "UPDATE tehtavataulu SET valmis = :valmis, tyontekijakommentti = :kommentti WHERE id = :tehtava_id AND tyontekija_id = :tyontekija_id";

        // Suorita SQL-kysely
        $stmt = $yhteys->prepare($sql);
        $stmt->execute([
            ':valmis' => $valmis,
            ':kommentti' => $kommentti,
            ':tehtava_id' => $tehtava_id,
            ':tyontekija_id' => $_SESSION["id"]
        ]);
    }

    // Vastaa onnistuneesti AJAX-pyynnölle
    http_response_code(200);
    echo "Tehtävien tilat ja kommentit päivitetty.";
} else {
    // Virheellinen pyyntö tai istunto ei ole asetettu
    http_response_code(400);
    echo "Virheellinen pyyntö.";
}

?>
