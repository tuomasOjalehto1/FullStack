<?php
// Aloita istunto
session_start();

// Tarkista onko käyttäjä kirjautunut sisään
//if (isset($_SESSION['kirjautunut']) && $_SESSION['kirjautunut'] === true) {
    // Voit tehdä tarvittavat uloskirjautumistoimet tässä, esim. istunnon lopetus
//    session_unset(); // Poista istunnon muuttujat
 //   session_destroy(); // Lopeta istunto

    // Ohjaa käyttäjä takaisin index.php-sivulle
//    header("Location: index.php");
//    exit;
//} else {
    // Jos käyttäjä ei ollut kirjautunut, voi tehdä tarvittavat toimet, esim. ohjata muualle tai näyttää viestin
//    echo "Et ole kirjautunut käyttäjänä.";
//}

session_start();
session_unset();
session_destroy();

header("location: index.php");
exit;
?>
