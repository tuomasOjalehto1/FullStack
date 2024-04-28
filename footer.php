<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="footerstyle.css" rel="stylesheet"> 
</head>
<body>
    <footer class="footer bg-light text-center p-3">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <h5 class="mb-3">Yritys</h5>
                    <p class="my-1">Lyhyt kuvaus yrityksestä.</p>
                    <p class="my-1">Y-tunnus</p>
                </div>

                <div class="col-md-4">
                    <h5 class="mb-3">Linkit</h5>
                    <ul class="list-unstyled text-center">
                        <li class="my-1"><a href="index.php" class="link-dark text-decoration-none">Etusivu</a></li> 
                        <li class="my-1"><a href="yhteysteidot.php" class="link-dark text-decoration-none">Yhteystiedot</a></li> 
                        <li class="my-1"><a href="otayhteytta.php" class="link-dark text-decoration-none">Ota yhteyttä</a></li> 
                        <li class="my-1"><a href="referenssit.php" class="link-dark text-decoration-none">Referenssit</a></li> 
                        <li class="my-1"><a href="kirjaudu_asukas.php" class="link-dark text-decoration-none">Kirjaudu asukkaana</a></li>
                        <li class="my-1"><a href="kirjaudu_isannoitsija.php" class="link-dark text-decoration-none">Kirjaudu isännöitsijänä</a></li>
                        <li class="my-1"><a href="kirjaudu_tyontekija.php" class="link-dark text-decoration-none">Kirjaudu työntekijänä</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h5 class="mb-3">Yhteystiedot</h5>
                    <p class="my-1">Yrityksen nimi</p>
                    <p class="my-1">Puhelinnumero</p>
                    <p class="my-1">Katu, postinumero, Kaupunki</p>
                </div>

            </div>
        </div>

        <div class="container text-center">
            <p>&copy; <?php echo date("Y"); ?> Yrityksen Nimi. Kaikki oikeudet pidätetään.</p>
        </div>
    </footer>
</body>
</html>
