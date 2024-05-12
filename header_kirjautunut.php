
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TEKSTIÄ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="img/icon1.png" type="image/png">
    <link href="Styles/headerstyle.css" rel="stylesheet">
</head>
<body>
    <header class="header text-center p-3 fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="logo" class="custom-logo"></a>
                </div>
                <div class="col-md-8">
                    <nav class="navbar navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Etusivu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="yhteystiedot.php">Yhteystiedot</a>
                                </li>
                                <?php
                                    // Tässä osiossa voit tarkistaa käyttäjän roolin ja lisätä linkin "Omat sivut" vastaavasti
                                    
                                    if (isset($_SESSION['rooli'])) {
                                        switch ($_SESSION['rooli']) {
                                            case 1:
                                                echo '<li class="nav-item"><a class="nav-link" href="asukas.php">Asukassivut</a></li>';
                                                break;
                                            case 2:
                                                
                                                echo '<li class="nav-item"><a class="nav-link" href="isannoitsija.php">Isännöitsijäsivut</a></li>';
                                                break;
                                            case 3:
                                                echo '<li class="nav-item"><a class="nav-link" href="tyontekija.php">Työntekijäsivut</a></li>';
                                                break;
                                        }
                                    }

                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="kirjautuminen_ulos.php">Kirjaudu ulos</a>
                                </li>
                                
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

