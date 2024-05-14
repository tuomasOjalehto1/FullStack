<?php
session_start();
require_once 'Utils/connect.php';
require_once 'Utils/haeTehtavat.php';
require_once 'Utils/haeTyontekijat.php'; 
require_once 'Utils/paivitaTyontekijaTehtavaan.php';

$tyontekijat = haeTyontekijat($yhteys);
$results = haeTehtavat($yhteys);

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
    <link href="Styles/style.css" rel="stylesheet">
</head>
<body>

    <div class="p-5 text-dark text-center"> <!--isännöitsijä sivun header -->
        <h1>Isännöitsijän sivu</h1>
    </div>
    <div class="container mt-5">
        <div class="row g-3">
            <div class="col-sm-8">
                <h3 class="mt-4">Ajankohtaiset tiedotteet ja ilmoitukset:</h3>
                    <p>Tiedotteet taloyhtiön asukkaille esimerkiksi tulevista remonteista, yhtiökokouksista, häiriöistä yms.</p>
                <h3 class="mt-4">Huoltoasiat:</h3>
                    <p>Huoltoyhtiö kirjaa huoltohistorian useilla eri tavoilla varmistaakseen asianmukaisen dokumentoinnin ja ylläpidon. Tässä muutamia yleisiä tapoja:</p>
                    <ul>
                        <li>Huoltokirja tai -ohjelma</li>
                        <li>Kirjalliset raportit: Huoltotoimenpiteistä tehdään kirjallisia raportteja, jotka tallennetaan talonyhtiön arkistoihin</li>
                        <li>Sähköpostiviestit ja muut viestintävälineet: Huoltotöistä ja niiden tuloksista voidaan myös tiedottaa sähköpostitse tai muilla viestintävälineillä.</li>
                    </ul>               
            </div>
            <div class="col-sm-4">
                <h3 class="mt-4">Sähköinen lomake</h3>
                    <br>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="vikailmoitus.php">Vikailmoituslomake</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--Huoltotehtävät -->
    <div class="container mt-5">
    <h2>Huoltotehtävä -lista</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ilmoittajan nimi</th>
                <th>Osoite</th>
                <th>Huoltotyyppi</th>
                <th>Tehtävän id</th>
                <th>Kuvaus</th>
                <th>Työntekijä</th>
                <th>Valmis</th>
                <th>Toiminto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['IlmoittajanEtunimi'] . ' ' . $row['IlmoittajanSukunimi']) ?></td>
                <td><?= htmlspecialchars($row['Osoite']) ?></td>
                <td><?= htmlspecialchars($row['Huoltotyyppi']) ?></td>
                <td><?= htmlspecialchars($row['TehtavaID']) ?></td>
                <td><?= htmlspecialchars($row['Kuvaus']) ?></td>
                <td>
                    <select name="tyontekija_id[<?= $row['TehtavaID'] ?>]" class='form-select'>
                        <option value="">Valitse työntekijä</option>
                        <?php foreach ($tyontekijat as $id => $nimi): ?>
                        <option value="<?= $id ?>" <?= $id == $row['tyontekija_id'] ? 'selected' : '' ?>><?= htmlspecialchars($nimi) ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input type="checkbox" name="valmis[<?= $row['TehtavaID'] ?>]" value="1" <?= $row['valmis'] ? 'checked' : '' ?> class="tehtava-valmis-checkbox">
                </td>
                <td>
                    <form action="Utils/poistaTehtavaIsannoitsijasivu.php" method="post">
                        <input type="hidden" name="delete_id" value="<?= $row['TehtavaID'] ?>">
                        <button type="submit" class="btn btn-outline-danger">Poista</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button id="tallennaMuutoksetNappi" class="btn btn-outline-primary mt-3">Tallenna muutokset</button>
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
        <th class="d-none d-sm-table-cell">Päivämäärä</th>
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
            echo "<button class='btn btn-outline-light btn-md' data-bs-toggle='modal' data-bs-target='#viewMessageModal" . $row['id'] . "' data-bs-backdrop='false'>Näytä viesti</button>";
            echo "</td>";
            echo "<td class='d-none d-sm-table-cell'>" . $row["formatted_date"] . "</td>";
            echo "<td>";
            echo "<form method='post' action='Utils/paivita_status.php'>";
            echo "<select class='form-select' name='status'>";
            echo "<option value='Uusi'" . ($row['status'] == 'Uusi' ? ' selected' : '') . ">Uusi</option>";
            echo "<option value='Käsittelyssä'" . ($row['status'] == 'Käsittelyssä' ? ' selected' : '') . ">Käsittelyssä</option>";
            echo "<option value='Hoidettu'" . ($row['status'] == 'Hoidettu' ? ' selected' : '') . ">Hoidettu</option>";
            echo "</select>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit' class='btn btn-outline-primary mt-1'>Päivitä</button>";
            echo "</form>";
            echo "<form method='post' action='Utils/poista_yhteydenotto.php' style='margin-top: 10px;'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit' class='btn btn-outline-danger'>Poista</button>";
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
            echo "<button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Sulje</button>";
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


<?php require_once 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="Utils/checkBoxKasittelyIsannoitsija.js"></script>
</body>
</html>
