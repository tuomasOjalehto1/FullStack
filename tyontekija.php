<?php
require_once 'Utils/connect.php';

// Hae kaikki tiedot tehtavataulu-taulusta
$sql = "SELECT * FROM tehtavataulu";
$stmt = $yhteys->query($sql);
?>

<!DOCTYPE html>
<html lang="fi">
<head>
  <title>Kiinteistöhuolto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <!-- Header -->
  <?php require_once 'header.php'; ?>

  <!-- Näytä tiedot taulukkomuodossa -->
  <div class="container mt-5">
    <h2>Kaikki tehtävät</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Osoite</th>
          <th>Kuvaus</th>
          <!-- Lisää tarvittavat sarakkeet tarpeen mukaan -->
        </tr>
      </thead>
      <tbody>
        <?php
        // Tarkistetaan onko hakutuloksia
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["osoite"] . "</td>";
                echo "<td>" . $row["kuvaus"] . "</td>";
                // Lisää muut sarakkeet tarpeen mukaan
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Ei tehtäviä</td></tr>";
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
// Sulje tietokantayhteys
$conn->close();
?>
