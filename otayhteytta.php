<?php
require_once 'Utils/connect.php';


// Tarkistetaan, onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Otetaan vastaan lomakkeen tiedot ja suodatetaan ne
    $etunimi = filter_input(INPUT_POST, 'etunimi', FILTER_SANITIZE_STRING);
    $sukunimi = filter_input(INPUT_POST, 'sukunimi', FILTER_SANITIZE_STRING);
    $puhelin = filter_input(INPUT_POST, 'puhelin', FILTER_SANITIZE_STRING);
    $yritys = filter_input(INPUT_POST, 'yritys', FILTER_SANITIZE_STRING);
    $sposti = filter_input(INPUT_POST, 'sposti', FILTER_SANITIZE_EMAIL);
    $viesti = filter_input(INPUT_POST, 'viesti', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Valmistellaan SQL-lause tietojen tallentamista varten
    try {
        $stmt = $yhteys->prepare("INSERT INTO otayhteyttataulu (etunimi, sukunimi, puhelin, yritys, sposti, viesti) VALUES (:etunimi, :sukunimi, :puhelin, :yritys, :sposti, :viesti)");
        $stmt->bindParam(':etunimi', $etunimi);
        $stmt->bindParam(':sukunimi', $sukunimi);
        $stmt->bindParam(':puhelin', $puhelin);
        $stmt->bindParam(':yritys', $yritys);
        $stmt->bindParam(':sposti', $sposti);
        $stmt->bindParam(':viesti', $viesti);
        
        $stmt->execute();

        $message = "<p class='alert alert-success text-center'>Viesti lähetetty onnistuneesti! Olemme sinuun pian yhteydessä.</p>";
    } catch(PDOException $e) {
        $message = "<p class='alert alert-danger text-center'>Tietokantaan lisääminen epäonnistui: " . $e->getMessage() . "</p>";
    }
    }

?>
<!--Tässä header-->
<?php require_once 'header.php'; ?>

<!DOCTYPE html>
<html lang="fi">
<head>
  <title>Ota yhteyttä</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2 class="mb-3 text-center">Ota yhteyttä</h2>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-10 padding">
                        <p>Täytä alla oleva lomake, niin olemme sinuun yhteydessä. Keskustellaan lisää siitä, miten voimme olla avuksi.</p>
                        <!-- onkohan tämä oikein -->
                        <form action="otayhteytta.php" method="post"> 

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
                        <br>
                        <!-- Viestin sijoitus täällä -->
                        <?php if (!empty($message)) echo $message; ?>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php require_once 'footer.php'; ?>