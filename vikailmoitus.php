<!DOCTYPE html>
<html lang="fi">
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
        <form action="/###.php" method="POST"> <!--FORM 1 VALINTAMENU huoltotyypille-->
          <label for="valintamenu" class="form-label"><h4>Valitse listalta vikailmoituksen tyyppi:</h4></label>
            <select class="form-select" id="valintamenu" name="valintamenu">
                <option>Kiinteistö</option>
                <option>Yleiset tilat</option>
                <option>Piha-alue</option> 
            </select>
        </form>
    </div>
    <div class="container mt-3">
      <h4>Ilmoituksen jättäjän tiedot:</h4>
        <form action="/###.php" method="POST"> <!--FORM 2 Ilmoituksen jättäjän tiedot-->
          
              <div class="row">
                  <div class="col">
                      <label for="etunimi" class="form-label">Etunimi:</label>
                      <input type="text" class="form-control" id="etunimi" placeholder="Etunimi" name="etunimi" required>                         
                  </div>
                  <div class="col">
                      <label for="sukunimi" class="form-label">Sukunimi:</label>
                      <input type="text" class="form-control" id="sukunimi" placeholder="Sukunimi" name="sukunimi" required>
                  </div>
              </div>
              <div class="row">
                  <div class="col">
                      <label for="puhelin" class="form-label">Puhelinnumero:</label>
                      <input type="text" class="form-control" id="puhelin" placeholder="Puhelinnumero" name="puhelin" required>
                  </div>
                  <div class="col">
                      <label for="sposti" class="form-label">Sähköpostiosoite:</label>
                      <input type="text" class="form-control" id="sposti" placeholder="Sähköpostiosoite" name="sposti">
                  </div>

                    <div class="mt-3">
            <h4>Valitse huoltotyyppi:</h4>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="huoltotyyppi" id="huolto" value="1" required>
                <label class="form-check-label" for="huolto">
                    Huolto tai korjaus
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="huoltotyyppi" id="siivous" value="2">
                <label class="form-check-label" for="siivous">
                    Siivous
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="huoltotyyppi" id="ulkoalueet" value="3">
                <label class="form-check-label" for="ulkoalueet">
                    Ulkoalueiden hoito
                </label>
            </div>
        </div>
            <label for="comment">Kuvaus:</label>
                <textarea class="form-control" rows="6" id="kuvaus" placeholder="Lyhyt kuvaus viasta tai huoltotarpeesta:"name="kuvaus"></textarea>
            </div>
                <button name="talleta" type="submit" class="btn btn-primary">Lähetä</button>
        </form>
              </div>
          </div>
    </div>
</body>
</html>
