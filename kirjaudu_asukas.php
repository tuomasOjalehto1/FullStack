<?php
session_start();

// Otetaan yhteys tietokantaan
require_once 'Utils/connect.php';

if(isset($_SESSION['kayttajatunnus'])){
    header("location: index.php");
    exit; // Lisää tämä, jotta koodi ei jatka suorittamista
}
  
if(isset($_POST['submit'])){
    if($_POST['kayttajatunnus'] == '' OR $_POST['salasana'] == ''){
        echo '<script>alert("Tietoja puuttuu!");</script>';
    }else{
        $kayttajatunnus = $_POST['kayttajatunnus'];
        $salasana = $_POST['salasana'];
    
        // Haetaan käyttäjä tietokannasta käyttäjätunnuksen perusteella
        $kirjaudu = $yhteys->prepare("SELECT * FROM kayttaja_ja_salasana WHERE kayttajatunnus = :kayttajatunnus");
        $kirjaudu->execute([':kayttajatunnus' => $kayttajatunnus]);
  
        $data = $kirjaudu->fetch(PDO::FETCH_ASSOC);
        
  
        // Tarkistetaan löytyykö käyttäjää
        if($kirjaudu->rowCount() > 0){
            // Tarkistetaan salasana
            if(password_verify($salasana, $data['salasana'])){
                // Tarkistetaan rooli
                if($data['rooli'] == 1){
                    // Kirjautuminen onnistui ja rooli on 1, tallennetaan käyttäjäsessio ja ohjataan etusivulle
                    $_SESSION['kayttajatunnus'] = $data['kayttajatunnus'];
                    header("location: asukas.php");
                    echo "Kirjautunut";
                }else{
                    echo '<script>alert("Käyttäjätunnus tai salasana on väärin!");</script>';
                }
            }else{
                echo '<script>alert("Käyttäjätunnus tai salasana on väärin!");</script>';
            }
        }else{
            echo '<script>alert("Käyttäjätunnus tai salasana on väärin!");</script>';
        }
    }

}


?>


<?php require_once 'header.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kirjaudu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="p-5 bg-primary text-white text-center">
        <h1>Kirjaudu</h1>
        <h3>Asukas</h3>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <main class="form-signin w-50 m-auto">
            <form method="POST" action="asukas.php">
                <div class="mb-3 row">
                    <div class="form-floating">
                        <input type="text" name="kayttajatunnus" class="form-control" id="floatingInput" placeholder="nimi@esimerkki.fi">
                        <label for="floatingInput">Käyttäjätunnus</label>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="form-floating">
                        <input type="password" name="salasana" class="form-control" id="floatingPassword" placeholder="Salasana">
                        <label for="floatingPassword">Salasana</label>
                    </div>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Kirjaudu</button>
                <!--<h6 class="mt-3">Jos sinulla ei ole käyttäjätunnusta  <a href="register.php">Luo tunnus</a></h6>-->
            
            
            </form>
            </main>
          </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>

<?php require_once 'footer.php'; ?>

