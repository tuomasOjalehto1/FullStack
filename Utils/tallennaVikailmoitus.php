<?php

require "connect.php";

if(isset($_POST["talleta"])) {
    try {
        // Haetaan lomakkeen data
        $etunimi = $_POST['etunimi'];
        $sukunimi = $_POST['sukunimi'];
        $puhelin = $_POST['puhelin'];
        $sposti = $_POST['sposti'];
        $huoltotyyppi = $_POST['huoltotyyppi'];
        $kuvaus = $_POST['kuvaus'];
        

        // Haetaan spostin perusteella data mitä ei ole lomakkeessa
        $sqlqueryAsiakasId = "SELECT id, osoite FROM asiakastaulu WHERE sposti = :sposti";
        $stmt = $yhteys->prepare($sqlqueryAsiakasId);
        $stmt->bindValue(':sposti', $sposti, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $asiakasId = $result['id'];
            $osoite = $result['osoite'];

            // Tallennetaan tietokantaan
            $sqlquery = "INSERT INTO tehtavataulu (etunimi, sukunimi, puhelin, osoite, huoltopyynnontyyppi, kuvaus, ilmoittajanid) 
                         VALUES (:etunimi, :sukunimi, :puhelin, :osoite, :huoltotyyppi, :kuvaus, :asiakasId)";
            $insertStmt = $yhteys->prepare($sqlquery);
            $insertStmt->bindValue(':etunimi', $etunimi, PDO::PARAM_STR);
            $insertStmt->bindValue(':sukunimi', $sukunimi, PDO::PARAM_STR);
            $insertStmt->bindValue(':puhelin', $puhelin, PDO::PARAM_STR);
            $insertStmt->bindValue(':osoite', $osoite, PDO::PARAM_STR);
            $insertStmt->bindValue(':huoltotyyppi', $huoltotyyppi, PDO::PARAM_INT);
            $insertStmt->bindValue(':kuvaus', $kuvaus, PDO::PARAM_STR);
            $insertStmt->bindValue(':asiakasId', $asiakasId, PDO::PARAM_INT);

            if ($insertStmt->execute()) {
                session_start();
                $_SESSION['message'] = "Vikailmoitus tallennettu onnistuneesti!";
                header("Location: ../vikailmoitus.php");
                exit();
            } else {
                echo "Virhe tallennettaessa: " . $insertStmt->errorInfo()[2];
            }
                    } else {
                        session_start();
                        $_SESSION['error'] = "Asiakasta ei löytynyt annetulla sähköpostiosoitteella.";
                        header("Location: ../vikailmoitus.php");
                        exit();
                    }
                } catch (PDOException $e) {
                    die("Database error: " . $e->getMessage());
                }
            } else {
                echo "Virhe: Lomaketta ei lähetetty oikein.";
            }
?>
