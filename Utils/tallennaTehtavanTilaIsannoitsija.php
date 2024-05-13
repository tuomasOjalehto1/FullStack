<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["id"])) {
    require_once 'connect.php';

    $postData = file_get_contents('php://input');
    $tehtavat = json_decode($postData, true);

    foreach ($tehtavat as $tehtava) {
        $tehtava_id = $tehtava['tehtava_id'];
        $valmis = $tehtava['valmis'];

        $sql = "UPDATE tehtavataulu SET valmis = :valmis WHERE id = :tehtava_id";
        $stmt = $yhteys->prepare($sql);
        $stmt->execute([
            ':valmis' => $valmis,
            ':tehtava_id' => $tehtava_id
        ]);
    }

    http_response_code(200);
    echo "Tehtävien tilat päivitetty.";
} else {
    http_response_code(400);
    echo "Virheellinen pyyntö.";
}
?>
