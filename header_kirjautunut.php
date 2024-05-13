
<head>
    <link href="Styles/headerstyle.css" rel="stylesheet">
    <link rel="icon" href="img/icon1.png" type="image/png">
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
