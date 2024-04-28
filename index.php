<?php
// Lisää polku oikein Utils-kansioon ja sen sisällä olevaan connect.php-tiedostoon
require_once 'Utils/connect.php';

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
  <!-- Header Section -->
  <header>
    <div class="p-5 bg-primary text-white text-center">
      <h1>Kiinteistöhuolto</h1>
      <h3>Isännöintipalvelut ammattitaidolla</h3>
    </div>
  </header>

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
        <p>Puhelin: 010 123 4567</p>
        <p>Sähköposti: info@kiinteistohuolto.fi</p>
        <p>Osoite: Esimerkkikatu 123, 00100 Helsinki</p>

        <!-- Google Maps upotus -->
        <div class="mb-3">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1989.7592137427973!2d24.935686316141184!3d60.17006303155632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46920b1ce6ab71bf%3A0x7c98c66a7b7b75c8!2sHelsinki%20Central%20Station!5e0!3m2!1sen!2sfi!4v1648041996317!5m2!1sen!2sfi" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </div>

  <!-- Tähän se footer -->
  <!-- <footer class="p-3 bg-dark text-white text-center">
    <p>&copy; 2024 Kiinteistöhuolto Oy</p>
  </footer> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
