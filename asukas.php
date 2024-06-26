<?php
session_start();

// Tarkista, onko käyttäjä kirjautunut sisään
// if (!isset($_SESSION['sposti'])) {
//     // Ohjaa kirjautumissivulle, jos käyttäjä ei ole kirjautunut
//     header("location: asukas.php");
//     exit;
// }

// $id = $_SESSION['id'];
?>

<!--Tässä header-->
<?php require_once 'header_kirjautunut.php'; ?>

<!DOCTYPE html>
<html lang="fi">
<head>
  <title>Asukas - R. Autio Oy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    
    <link href="Styles/style.css" rel="stylesheet">
    
</head>
<body>
    <div class="p-5 text-dark text-center"> 
        <h1>Asukassivut</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-8">
                <h2>Tietoa asukkaille</h2>
                <br>
                    <p>Tutustu tarjoamiimme kiinteistöhuoltopalveluihin, joiden tavoitteena on pitää yllä viihtyisää ja toimivaa ympäristöä kaikille asukkaille. Kauttamme hoituvat vikailmoitukset, kiinteistö- ja ulkoaluehuolto, autopaikat sekä saunavuorojen tiedustelut.</p>
            </div>
            <div class="col-sm-4">
                <h3 class="mt-4">Sähköinen lomake</h3> 
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="vikailmoitus.php">Vikailmoituslomake</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12"><br><br>
                <h2>Asumiseen liittyen</h2>
                <br>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                            Autopaikka
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                            <div class="card-body">
                            Taloyhtiömme alueella pysäköinti on sallittu ainoastaan merkityillä pysäköintipaikoilla. Huomioikaa myös mahdolliset vieraspysäköintipaikat ja varatkaa ne vieraidenne käyttöön tarvittaessa.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                            Saunavuoro
                        </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                            Ota yhteyttä sähköpostitse saunavuoron tiedosteluun
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                            Oven avaus tai avaimen kadotessa
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                            Soita kiinteistöhuollon asiakaspalvelun numeroon.
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
<br>
</html>
<?php require_once 'footer.php'; ?>

