<?php
require_once 'Utils/connect.php';


// Hae kaikki tiedot tehtavataulu-taulusta
$sql = "SELECT * FROM tehtavataulu";
$stmt = $yhteys->query($sql);

// Hae työntekijät tyontekijataulu -taulusta
$sql_tyontekijat = "SELECT id, etunimi, sukunimi FROM tyontekijataulu"; 
$stmt_tyontekijat = $yhteys->query($sql_tyontekijat);
?>

<!--Tässä header-->
<?php require_once 'header_kirjautunut.php'; ?>

<!DOCTYPE html>
<html lang="fi">
<head>
  <title>Isännöitsijä - R. Autio Oy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="Styles/style.css" rel="stylesheet">
</head>
<body>
    <div class="header p-5 text-dark text-center"> <!--isännöitsijä sivun header -->
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
  <!-- Näytä tiedot taulukkomuodossa TÄMÄ kesken SusannaN:llä-->
  <div class="container mt-5">
    <h2>Huoltotehtävä -lista</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Ilmoittajan nimi</th>
          <th>Osoite</th>
          <th>Huoltotyyppi</th>
          <th>Tehtävän id</th>
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
                echo "<td>" . $row["etunimi"] . " " . $row["sukunimi"] ."</td>";
                echo "<td>" . $row["osoite"] . "</td>";
                
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
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["kuvaus"] . "</td>";

                // Tehdään valikkonappi työntekijän valinnalle
                echo "<td>";
                echo "<form method='post' action='Utils/valitse_tyontekija.php'>";
                echo "<select class='form-select' id='valintamenu' name='valintamenu'>";

                if ($stmt_tyontekijat->rowCount() > 0) {
                    while ($row_tyontekija = $stmt_tyontekijat->fetch(PDO::FETCH_ASSOC)) {
                // Lisää työntekijän nimi ja aseta arvoksi työntekijän id TÄSSÄ JOKIN BUGI ON JA PYSYY koska näkyy vaan ekalla rivillä:( 
                        echo "<option value='" . $row_tyontekija['id'] . "'>" . $row_tyontekija['etunimi'] . " " . $row_tyontekija['sukunimi'] . "</option>";
                    }
                }
                echo "</select>";
                echo "<br>";
                echo "<input type='submit' value='Valitse'>";
                echo "</form>";
                echo "</td>";

            }
        } else {
            echo "<tr><td colspan='7'>Ei tehtäviä</td></tr>";
        }

        ?>
      </tbody>
    </table>
  </div>


    <!-- Tästä alkaa yhdeydenottolomakkeen tiedot -->

    <?php
    try {
        $stmt = $yhteys->prepare("SELECT *, DATE_FORMAT(luontipvm, '%d.%m.%Y') as formatted_date FROM otayhteyttataulu ORDER BY luontipvm DESC");
        $stmt->execute();
    } catch (PDOException $e) {
        die("SQL-kyselyn suoritus epäonnistui: " . $e->getMessage());
    }
    ?>

<div class="container mt-5">
    <h2>Yhteydenottotiedot</h2>
    <table class="table table-striped">
    <thead>
    <tr>
        <th class="d-none d-xl-table-cell">Etunimi</th>
        <th>Sukunimi</th>
        <th class="d-none d-md-table-cell">Puhelin</th>
        <th class="d-none d-lg-table-cell">Yritys</th>
        <th>Sähköposti</th>
        <th>Viesti</th>
        <th>Päivämäärä</th>
        <th>Toiminnot</th>
    </tr>
</thead>
<tbody>
    <?php
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td class='d-none d-xl-table-cell'>" . htmlspecialchars($row["etunimi"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["sukunimi"]) . "</td>";
            echo "<td class='d-none d-md-table-cell'>" . htmlspecialchars($row["puhelin"]) . "</td>";
            echo "<td class='d-none d-lg-table-cell'>" . htmlspecialchars($row["yritys"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["sposti"]) . "</td>";
            echo "<td>";
            echo "<button class='btn btn-light btn-md' data-bs-toggle='modal' data-bs-target='#viewMessageModal" . $row['id'] . "' data-bs-backdrop='false'>Näytä viesti</button>";
            echo "</td>";
            echo "<td>" . $row["formatted_date"] . "</td>";
            echo "<td>";
            echo "<form method='post' action='Utils/paivita_status.php'>";
            echo "<select class='form-select' name='status'>";
            echo "<option value='Uusi'" . ($row['status'] == 'Uusi' ? ' selected' : '') . ">Uusi</option>";
            echo "<option value='Käsittelyssä'" . ($row['status'] == 'Käsittelyssä' ? ' selected' : '') . ">Käsittelyssä</option>";
            echo "<option value='Hoidettu'" . ($row['status'] == 'Hoidettu' ? ' selected' : '') . ">Hoidettu</option>";
            echo "</select>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit' class='btn btn-primary mt-1'>Päivitä</button>";
            echo "</form>";
            echo "<form method='post' action='Utils/poista_yhteydenotto.php' style='margin-top: 10px;'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit' class='btn btn-danger'>Poista</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";

            echo "<div class='modal fade' data-bs-backdrop='false' id='viewMessageModal" . $row['id'] . "' tabindex='-1' aria-labelledby='viewMessageModalLabel" . $row['id'] . "' aria-hidden='true'>";
            echo "<div class='modal-dialog'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='viewMessageModalLabel" . $row['id'] . "'>Viesti</h5>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo nl2br(htmlspecialchars($row['viesti']));
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Sulje</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<tr><td colspan='8'>Ei yhteydenottoja</td></tr>";
    }
    ?>

</tbody>
</table>
</div>

</body>
</html>
<?php require_once 'footer.php'; ?>

