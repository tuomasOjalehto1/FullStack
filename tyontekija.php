<?php
session_start();

if (!isset($_SESSION['omatila'])) {
  $_SESSION['omatila'] = 0; // Voit asettaa oletusarvon tarpeen mukaan
}
require_once 'Utils/connect.php';
require_once 'Utils/haeTehtavat.php';
require_once 'Utils/haeTyontekijat.php'; 
require_once 'Utils/paivitaTyontekijaTehtavaanTyontekijaSivu.php';

// Hae kaikki tiedot joihin tallennettu tämän työntekijän id tehtavataulu-taulusta
$sql = "SELECT * FROM tehtavataulu WHERE tyontekija_id = :tyontekija_id";
$stmt = $yhteys->prepare($sql);
$stmt->execute([':tyontekija_id' => $_SESSION["id"]]);

$tyontekijat = haeTyontekijat($yhteys);
$results = haeTehtavat($yhteys);

?>
<!-- Header -->
<?php require_once 'header_kirjautunut.php'; ?>

<!DOCTYPE html>
<html lang="fi">
<head>
  <title>Työntekijä - R. Autio Oy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="Styles/style.css" rel="stylesheet">


  <!--Javascirpt tiedosto jolla käsitellään sitä onko checkbox ruksattu-->
  <script src="Utils/CheckBoxKasittely.js"></script>
</head>
<body>

  <!-- Näytä tiedot taulukkomuodossa -->
  <div class="container mt-5">
  <div class="table-responsive">
    <h2>Kaikki omat tehtävät</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Ilmoittajan ID</th>
          <th>Etunimi</th>
          <th>Sukunimi</th>
          <th>Osoite</th>
          <th>Huoltotyyppi</th>
          <th>Kuvaus</th>
          <th>Työntekijän kommentti</th>
          <th>Valmis</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Tarkistetaan onko hakutuloksia
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["ilmoittajanid"] . "</td>";
                echo "<td>" . $row["etunimi"] . "</td>";
                echo "<td>" . $row["sukunimi"] . "</td>";
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
                echo "<td>" . $row["kuvaus"] . "</td>";

                
                // Työntekijän kommentti
                echo "<td>";
                echo "<textarea name='kommentti_" . $row['id'] . "' id='kommentti_" . $row['id'] . "' rows='3' cols='30'>" . $row['tyontekijakommentti'] . "</textarea>";
                echo "</td>";


                // Valmis-checkbox
                echo "<td>";
                echo "<input type='checkbox' name='valmis' " . ($row['valmis'] == 1 ? 'checked' : '') . ">";
                echo "</td>";


                
                // Poistamis nappi
                echo "<td>";
                //Osoittaa oikeaan tiedostoon
                echo "<form method='post' action='Utils/PoistaTehtava.php'>";
                echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' class='btn btn-outline-danger'>Poista tehtävä</button>";
                echo "</form>";
                echo "</td>";

                echo "</tr>";


            }
        } else {
            echo "<tr><td colspan='7'>Ei tehtäviä</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  </div>
        
    
  <div class="container mt-3">
  <h3 class="mb-4">Tallenna tehtävien tilat</h3>
    <form id="tehtavatForm" method="post" action="Utils/TallennaTehtavanTila.php">
      <button type="button" id="lahetaTehtavat" class="btn btn-outline-primary mt-3">Tallenna muutokset</button>
    </form>

  </div>

  
  <div class="container mt-5">
  <h3 class="mb-4">Omat tiedot</h3>
  <form method="post" action="Utils/TallennaOmatila.php">
    <div class="form-check">
      <?php
          
          // Haetaan työntekijän omatila-arvo tietokannasta
          $sqlOmaTila = "SELECT omatila FROM tyontekijataulu WHERE id = :tyontekija_id";
          $stmtOmaTila = $yhteys->prepare($sqlOmaTila);
          $stmtOmaTila->execute([':tyontekija_id' => $_SESSION["id"]]);
          
          $omatila = $stmtOmaTila->fetchColumn(); // Haetaan omatila-arvo
          
          // Tarkistetaan, onko omatila true vai false
          $checked = ($omatila == 1) ? 'checked' : '';
          

      ?>
      <input class="form-check-input" type="checkbox" id="kaytettavissa" name="kaytettavissa" <?php echo $checked; ?>>
      <label class="form-check-label" for="kaytettavissa">Käytettävissä</label>
    </div>
    <button type="submit" class="btn btn-outline-success mt-3">Tallenna</button>
  </form>






  
     <!--Työntekijä pystyy lisäämään tehtävän -->

    <div class="col-sm-4">
      <h3 class="mt-4">Lisää tehtävä sähköisellä lomakkeella</h3>
      <br>
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="vikailmoitus.php">Vikailmoituslomake</a>
          </li>
        </ul>
    </div>

</div>


<!--Työntekijä pystyy ottamaan tehtävän itselleen -->

<div class="container mt-5">
<div class="table-responsive">
    <h2>Kaikki huoltotehtävät</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ilmoittajan nimi</th>
                <th>Osoite</th>
                <th>Huoltotyyppi</th>
                <th>Tehtävän id</th>
                <th>Kuvaus</th>
                <th>Työntekijä</th>
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
                <form action="Utils/paivitaTyontekijaTehtavaanTyontekijaSivu.php" method="post">
                    <input type="hidden" name="tehtava_id" value="<?= $row['TehtavaID'] ?>">
                    <select name="tyontekija_id" onchange="this.form.submit()" class='form-select'>
                        <option value="">Valitse työntekijä</option>
                        <?php foreach ($tyontekijat as $id => $nimi): ?>
                        <option value="<?= $id ?>" <?= $id == $row['tyontekija_id'] ? 'selected' : '' ?>><?= htmlspecialchars($nimi) ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>


  <!-- Footer -->
  <?php require_once 'footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<br>
</html>

<?php
//Herjaa ettei löydä closea jos kättää tätä
//$yhteys->close();
?>