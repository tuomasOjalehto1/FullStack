<?php
session_start();

$id = $_SESSION['id'];

require_once 'Utils/connect.php';

// Hae kaikki tiedot tehtavataulu-taulusta
$sql = "SELECT * FROM tehtavataulu WHERE tyontekija_id = {$_SESSION['id']}";
$stmt = $yhteys->query($sql);
?>
<!-- Header -->
<?php require_once 'header.php'; ?>

<!DOCTYPE html>
<html lang="fi">
<head>
  <title>Kiinteistöhuolto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>
<body>
  

  <!-- Näytä tiedot taulukkomuodossa -->
  <div class="container mt-5">
    <h2>Kaikki tehtävät</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Ilmoittajan ID</th>
          <th>Etunimi</th>
          <th>Sukunimi</th>
          <th>Osoite</th>
          <th>Huoltotyyppi</th>
          <th>Kuvaus</th>

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
                
                // Poistamis nappi
                echo "<td>";
                //Osoittaa oikeaan tiedostoon
                echo "<form method='post' action='Utils/PoistaTehtava.php'>";
                echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' class='btn btn-danger'>Poista tehtävä</button>";
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

  <!-- Footer -->
  <?php require_once 'footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
//Herjaa ettei löydä closea jos kättää tätä
//$yhteys->close();
?>
