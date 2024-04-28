<!DOCTYPE html>
<html lang="fi">
<head>
    <title>Tähän teksti</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TEKSTIÄ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="logo.png" type="image/png">
    <link href="headerstyle.css" rel="stylesheet">
</head>

<body>
    <header class="header bg-light text-center p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a class="navbar-brand" href="index.php"><img src="logo.png" alt="logo" class="custom-logo"></a>
                </div>

                <div class="col-md-11">
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
                                <li class="nav-item">
                                    <a class="nav-link" href="referenssit.php">Referenssit</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="otayhteytta.php">Ota yhteyttä</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Kirjaudu
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="kirjaudu_asukas.php">Asukas</a></li>
                                        <li><a class="dropdown-item" href="kirjaudu_isannoitsija.php">Isännöitsijä</a></li>
                                        <li><a class="dropdown-item" href="kirjaudu_tyontekija.php">Työntekijä</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    
</body>
</html>