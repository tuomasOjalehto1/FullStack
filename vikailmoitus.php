<?php
require_once 'Utils/connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vikailmoitus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="p-5 bg-primary text-white text-center"> <!--CSS toinen kiva taustakuva tai väri-->
        <h1>Vikailmoituslomake</h1>
    </div>
    <div class="container mt-5">
        <p>Lomakkeen kautta tehtyjä huoltopyyntöjä käsitellään arkisin toimistomme aukioloaikana. Mikäli asiasi vaatii välitöntä reagointia (esimerkiksi vesivahinko tai oven avauspyyntö) soita asiakaspalveluumme. </p>
        <br>    
        <form action="/###.php"> <!--FORM 1-->
          <label for="valintamenu" class="form-label"><h4>Valitse listalta vikailmoitustyyppi:</h4></label>
            <select class="form-select" id="valintamenu" name="valintamenu">
                <option>Kiinteistö</option>
                <option>Yleiset tilat</option>
                <option>Piha-alue</option> <!-- Tää näytti kivalta lomakkeella, en tiedä tarvitseeko valintaa liittää sen kummemmin mihinkään jatkon kannalta??-->
            </select>
        </form>
    </div>
    <div class="container mt-3">
        <h4>Ilmoituksen tekijän tiedot:</h4>
        <form action="/###.php"> <!--FORMIN 2, TOIMIIKO JOS KAKSI FORMIA YHDISTETÄÄNKÖ-->
          <div class="row">
            <div class="col">
                <label for="nimi">Nimi:</label>
              <input type="text" class="form-control" placeholder="Nimesi:" name="nimi" required>
            </div>
            <div class="col">
                <label for="comment">Sähköposti:</label>
              <input type="text" class="form-control" placeholder="Syötä sähköposti" name="sposti" required>
            </div>
            <div class="container mt-3">
                <h4>Kuvaile asia tai ongelma:</h4>
                    <label for="osoite">Osoite, mitä ilmoitus koskee:</label>
                    <input type="text" class="form-control" placeholder="Osoite:" name="osoite" required>
        <form action="/###.php"> <!--FORM 3-->
            <div class="mb-3 mt-3">
            <label for="comment">Kuvaus:</label>
            <textarea class="form-control" rows="6" id="kuvaus" placeholder="Lyhyt kuvaus viasta tai huoltotarpeesta:"name="text"></textarea>
            </div>
            <button type="laheta" class="btn btn-primary">Lähetä</button>
        </form>
              </div>
          </div>
      </div>
</body>
</html>

