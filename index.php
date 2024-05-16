<?php
require_once 'Utils/connect.php';
?>
<?php session_start(); ?>

<?php
// Tarkista, onko käyttäjä kirjautunut sisään
if (isset($_SESSION['sposti'])) {
    // Käyttäjä on kirjautunut sisään, sisällytä kirjautuneen headerin
    require_once 'header_kirjautunut.php';
} else {
    // Käyttäjä ei ole kirjautunut sisään, sisällytä tavallinen header
    require_once 'header.php';
}
?>


<!DOCTYPE html>
<html lang="fi">
<head>
  <title>Kiinteistöhuolto R. Autio Oy</title>
  <meta charset="utf-8">
  <meta name="description" content="Kiinteistöhuolto R. Autio Oy tarjoaa monipuoliset kiinteistönhuoltopalvelut Helsingissä. Palveluihimme kuuluvat huolto-, korjaus- ja siivouspalvelut sekä taloyhtiöiden ylläpitopalvelut. Ammattitaitoinen tiimimme varmistaa, että kiinteistösi pysyy erinomaisessa kunnossa. Tutustu palveluihimme ja ota yhteyttä!">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="Styles/style.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Tervetuloa R. Autio Oy:n maailmaan!</h1>
                <p class="lead">Täällä kiinteistöhuolto saa uuden merkityksen.</p>

                <p><strong>Sitoumuksemme:</strong> Olemme sitoutuneita tarjoamaan ensiluokkaista palvelua asiakkaillemme, olipa kyse sitten pienestä taloyhtiöstä tai laajasta liikekiinteistöstä.</p>
            
                <p><strong>Lupauksemme:</strong> R. Autio Oy on luotettava ja ammattitaitoinen kumppani, joka huolehtii kiinteistösi kunnosta ja turvallisuudesta.</p>
                
                <p><strong>Tiimimme:</strong> Tiimimme koostuu alansa huippuosaajista, jotka ovat omistautuneita työlleen ja asiakkaidemme tarpeiden täyttämiselle.</p>
                
                <p><strong>Arvostamme:</strong> Huolehdimme kiinteistösi arvosta ja viihtyisyydestä, jotta sinä voit keskittyä olennaiseen.</p>
                
                <p><strong>Periaatteemme:</strong> Toimintamme perustuu tinkimättömään laatuun, tehokkuuteen ja ympäristöystävällisiin käytäntöihin.</p>
                
                <p><strong>Vastuullisuus:</strong> Haluamme olla osa ratkaisua kestävän kehityksen ja ympäristövastuun saralla.</p>
                
                <p><strong>Turvallisuus:</strong> Anna meidän huolehtia kiinteistösi hyvinvoinnista, niin voit luottaa siihen, että se on hyvissä käsissä.</p>
                
                <p><strong>Yhteistyön voima:</strong> Yhteistyössä R. Autio Oy:n kanssa kiinteistösi on turvattu ja hoidettu – tulevaisuuteen asti.</p>
                
            </div>

            <div class="col-md">
                <br>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/piha.jpg" class="d-block w-100 img-fluid rounded" alt="Lehtien haravoiminen">
                        </div>
                        <div class="carousel-item">
                            <img src="img/talonmies.jpg" class="d-block w-100 img-fluid rounded" alt="Talonmies työssään">
                        </div>
                        <div class="carousel-item">
                            <img src="img/siivous.jpg" class="d-block w-100 img-fluid rounded" alt="Siivoustyöt">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>


            <div id="kommentti" class="row">
                <div class="col-sm-12 col-md-12 col-xl-12">
                    <q>R. Autio Oy:llä huolto pelaa!</q>
                    <p id="vasen"><i>Tyytyväinen asukas</i></p>
                </div>
            </div>
    
            <div class="row mt-5 p-3 rounded">
        <div class="col-sm-12 text-center">
            <h5>Kiinteistöhuolto Oy tarjoaa kattavat kiinteistönhuoltopalvelut yrityksille ja yksityisille taloyhtiöille. Palveluihimme kuuluvat muun muassa:</h5>
            <ul id="lista">
                <li>Talonmiespalvelut ja huolto</li>
                <li>Siivouspalvelut</li>
                <li>Pihanhoito ja lumityöt</li>
                <li>Kiinteistöjen kunnossapito</li>
            </ul>
        </div>   
    </div>
    <div class="row mt-5 bg-light p-3 rounded">
            <div class="col-sm-12 col-md-6">
                <h4>Yhteystiedot:</h4>
                <p><b>Osoite:</b> Pohjolankatu 23, 00610 Helsinki</p>
                <p><b>Aukioloajat:</b></p>
                <p>Ma - Pe: 9:00 - 17:00</p>
                <p>La - Su: Suljettu</p>
                <p><b>Sähköposti:</b> info@kiinteistohuolto.fi</p>
                <p><b>Puhelin:</b> 010 123 4567</p>
                <p><b>Päivystyspuhelin:</b> 020 123 4567</p>
            </div>
            <div class="col-sm-12 col-md-6">
                <!-- Google Maps upotus -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1981.9381130676595!2d24.9485304!3d60.2148548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469209bc1cfaee61%3A0xd122eff7d29009ba!2sPohjolankatu%2023%2C%2000610%20Helsinki!5e0!3m2!1sfi!2sfi!4v1715238159045!5m2!1sfi!2sfi" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    </div>
</div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
<br>
</html>
<?php require_once 'footer.php'; ?>