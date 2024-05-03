<?php
require_once 'Utils/connect.php';

// Hae kaikki tiedot tehtavataulu-taulusta
$sql = "SELECT * FROM tehtavataulu";
$stmt = $yhteys->query($sql);
?>

<!DOCTYPE html>
<html lang="fi">
<head>
  <title>Isännöitsijä</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="p-5 bg-primary text-white text-center"> <!--CSS joku koti taustakuva -->
        <h1>Isännöitsijä</h1>
    </div>
    <div class="container mt-5">
        <div class="row g-3">
            <div class="col-sm-8">
                <h3 class="mt-4">Ajankohtaiset tiedotteet ja ilmoitukset:</h3>
                    <p>Tiedotteet taloyhtiön asukkaille esimerkiksi tulevista remonteista, yhtiökokouksista, häiriöistä yms.</p>
                <h3 class="mt-4">Huoltoasiat:</h3>
                    <p>Huoltohistoria ja tulevien huoltotöiden aikataulutus?? Mitä tälle isännöitsijän sivulle olisi järkevä laittaa?</p>                
            </div>
            <div class="col-sm-4">
                <h3 class="mt-4">Sähköinen lomake</h3>
                    <br>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="vikailmoitus.php">Huoltopyyntö</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
  <!-- Näytä tiedot taulukkomuodossa TÄMÄ VASTA Alulla SusannaN:llä-->
  <div class="container mt-5">
    <h2>Huoltotehtävä -lista</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Etunimi</th>
          <th>Sukunimi</th>
          <th>Osoite</th>
          <th>Huoltotyyppi</th>
          <th>Kuvaus</th>
          <th>Työntekijä</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Tarkistetaan onko hakutuloksia
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["etunimi"] . "</td>";
                echo "<td>" . $row["sukunimi"] . "</td>";
                echo "<td>" . $row["osoite"] . "</td>";
                # echo "<td>" . $row["ilmoittajanid"] . "</td>"; TULEE toisesta taulusta

                // Muutetaan huoltopyynnontyyppi numerosta tekstiksi
                $huoltotyyppi = "";
                switch ($row["huoltopyynnontyyppi"]) {
                    case 1:
                        $huoltotyyppi = "Huolto- tai korjaus";
                        break;
                    case 2:
                        $huoltotyyppi = "Siivous";
                        break;
                    case 3:
                        $huoltotyyppi = "Ulkoalueiden hoito";
                        break;
                    default:
                        $huoltotyyppi = "Tuntematon tyyppi";
                        break;
                }

                echo "<td>" . $huoltotyyppi . "</td>";
                echo "<td>" . $row["kuvaus"] . "</td>";
                
            }
        } else {
            echo "<tr><td colspan='7'>Ei tehtäviä</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>

