<!DOCTYPE html>
<html lang="fi">
<head>
  <title>Kiinteistöhuolto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<!--Tässä header-->
<?php require_once 'header.php'; ?>

  <!-- Tekstikenttä perustiedoille -->
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <h2>Tervetuloa Kiinteistöhuolto Oy:lle</h2>
        <p>
          Kiinteistöhuolto Oy tarjoaa kattavat kiinteistönhuoltopalvelut yrityksille ja yksityisille. Palveluihimme kuuluvat muun muassa:
        </p>
        <ul>
          <li>Talonmiespalvelut ja huolto</li>
          <li>Siivouspalvelut</li>
          <li>Pihanhoito ja lumityöt</li>
          <li>Kiinteistöjen kunnossapito</li>
        </ul>
        <p>Ota yhteyttä:</p>

        <!-- Yhteystiedot (kovakoodattu esimerkki) -->
        <ul>
          <li>
            <strong>Esimerkki Työntekijä</strong><br>
            Tehtävä: Talonmies<br>
            Puhelin: 010 123 4567<br>
            Sähköposti: esimerkki.tyontekija@kiinteistohuolto.fi
          </li>
          <li>
            <strong>Toinen Esimerkki</strong><br>
            Tehtävä: Siivooja<br>
            Puhelin: 020 987 6543<br>
            Sähköposti: toinen.esimerkki@kiinteistohuolto.fi
          </li>
          <!-- Lisää tarvittaessa lisää kovakoodattuja yhteystietoja -->
        </ul>

      </div>
    </div>
  </div>

  <!-- Tähän se footer -->
  <?php require_once 'footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
