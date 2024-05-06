<?php
session_start();

// Otetaan yhteys tietokantaan
require_once 'connect.php';

if(isset($_SESSION['kayttajatunnus'])){
    header("location: index.php");
    exit; // Keskeytetään suoritus, jos käyttäjä on jo kirjautunut
}

if(isset($_POST['submit'])){
    if($_POST['kayttajatunnus'] == '' || $_POST['salasana'] == ''){
        echo '<script>alert("Tietoja puuttuu!");</script>';
    }else{
        $kayttajatunnus = $_POST['kayttajatunnus'];
        $salasana = $_POST['salasana'];
    
        // Haetaan käyttäjä tietokannasta käyttäjätunnuksen perusteella
        $query = $yhteys->prepare("SELECT * FROM kayttaja_ja_salasana WHERE kayttajatunnus = :kayttajatunnus");
        $query->execute([':kayttajatunnus' => $kayttajatunnus]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        // Tarkistetaan löytyykö käyttäjää ja onko salasana oikein (tekstimuodossa)
        if($user && $salasana == $user['salasana']){
            // Kirjautuminen onnistui, tallennetaan käyttäjäsessio
            $_SESSION['kayttajatunnus'] = $user['kayttajatunnus'];
            
            // Ohjataan roolin perusteella oikealle sivulle
            switch($user['rooli']){
                case 1:
                    header("location: ../asukas.php");
                    exit;
                case 2:
                    header("location: ../isannoitsija.php");
                    exit;
                case 3:
                    header("location: ../tyontekija.php");
                    exit;
                default:
                    echo '<script>alert("Virheellinen rooli!");</script>';
                    break;
            }
        } else {
            echo '<script>alert("Käyttäjätunnus tai salasana on väärin!");</script>';
        }
    }
}
?>