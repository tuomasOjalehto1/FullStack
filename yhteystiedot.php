<!--Tässä header-->
<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="fi">
<head>
  <title>Yhteystiedot - R. Autio Oy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="Styles/style.css" rel="stylesheet">
</head>
<body>


<div class="container mt-5">
  <div class="row text-center" id="yritysnimi">
    <h2>Yhteystiedot - R. Autio Oy</h2>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <p>
        Kiinteistöhuolto Oy tarjoaa kattavat kiinteistönhuoltopalvelut yrityksille ja yksityisille taloyhtiöille. Palveluihimme kuuluvat muun muassa:
      </p>
      <ul>
        <li>Talonmiespalvelut ja huolto</li>
        <li>Siivouspalvelut</li>
        <li>Pihanhoito ja lumityöt</li>
        <li>Kiinteistöjen kunnossapito</li>
      </ul>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-sm-12 col-md-12">
      <h4>Työntekijämme:</h4>
      
      <div class="row mt-5 tyontekija">
        <div class="col-sm-3">
          <img src="img/tyontekija1.jpg" class="rounded-circle" alt="Työntekijän kuva" style="max-width: 150px;">
        </div>
        <div class="col-sm-6 mt-2">
          <h5>Esimerkki Työntekijä</h5>
          <p>Tehtävä: Huoltohenkilö</p>
          <p>Puhelin: 010 123 4567</p>
          <p>Sähköposti: esimerkki.tyontekija@kiinteistohuolto.fi</p>
        </div>
      </div>
      
      <div class="row mt-5 tyontekija">
        <div class="col-sm-3">
          <img src="img/tyontekija2.jpg" class="rounded-circle" alt="Työntekijän kuva" style="max-width: 150px;">
        </div>
        <div class="col-sm-6 mt-2">
          <h5>Toinen Esimerkki</h5>
          <p>Tehtävä: Huoltohenkilö</p>
          <p>Puhelin: 020 987 6543</p>
          <p>Sähköposti: toinen.esimerkki@kiinteistohuolto.fi</p>
        </div>
      </div>

      <!-- Lisää tarvittaessa lisää työntekijöitä tähän -->
      
    </div>
  </div>

  <!-- Lisää muita sisältöjä tai osioita tarvittaessa -->

  <div class="row mt-5">
    <div class="col-sm-12 col-md-6">
      <h4>Yhteystiedot:</h4>
      <p><b>Puhelin:</b> 010 123 4567</p>
      <p><b>Sähköposti:</b> info@kiinteistohuolto.fi</p>
      <p><b>Osoite:</b> Pohjolankatu 23, 00610 Helsinki</p>
      h4>Aukioloajat:</h4>
      <p>Maanantai - Perjantai: 9:00 - 17:00</p>
      <p>Lauantai: Suljettu</p>
      <p>Sunnuntai: Suljettu</p>
    </div>
    <div class="col-sm-12 col-md-6">
      <!-- Google Maps upotus -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1981.9381130676595!2d24.9485304!3d60.2148548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469209bc1cfaee61%3A0xd122eff7d29009ba!2sPohjolankatu%2023%2C%2000610%20Helsinki!5e0!3m2!1sfi!2sfi!4v1715238159045!5m2!1sfi!2sfi" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</div>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!-- Tähän se footer -->
<?php require_once 'footer.php'; ?>
