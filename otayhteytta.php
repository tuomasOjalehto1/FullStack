<?php
require_once 'Utils/connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ota yhteyttä</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="p-5 bg-primary text-white text-center">
        <h1>Ota yhteyttä</h1>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 padding">
            <p>Täytä alla oleva lomake, niin olemme sinuun yhteydessä. Keskustellaan lisää siitä, miten voimme olla avuksi.</p>
              <form action="XXX.php">
                <div class="mb-3 mt-3">
                    <div class="row">
                        <div class="col">
                            <label for="etunimi" class="form-label"></label>
                            <input type="text" class="form-control" id="etunimi" placeholder="Etunimi" name="etunimi" required>                         
                        </div>
                        <div class="col">
                            <label for="sukunimi" class="form-label"></label>
                            <input type="text" class="form-control" id="sukunimi" placeholder="Sukunimi" name="sukunimi" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="puhelin" class="form-label"></label>
                            <input type="text" class="form-control" id="puhelin" placeholder="Puhelinnumero" name="puhelin" required>
                        </div>
                        <div class="col">
                            <label for="yritys" class="form-label"></label>
                            <input type="text" class="form-control" id="yritys" placeholder="Yritys/organisaatio/taloyhtiö" name="yritys">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="sposti" class="form-label"></label>
                            <input type="text" class="form-control" id="sposti" placeholder="Sähköpostiosoite" name="sposti" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="viesti"></label>
                            <textarea class="form-control" rows="5" id="viesti" placeholder="Viestisi" name="viesti" required></textarea>
                        </div>
                    </div>
                </div>               
                <button type="submit" class="btn btn-primary">Lähetä</button>
              </form> 
              
            </div>
          </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>

