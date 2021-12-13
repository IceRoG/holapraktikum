<?php
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    #RaspberryPi
	// require 'databaseinput.ini';
	
	#Inf5
	$server = 'mysql:host=mysql5.inf5.de; dbname=db450157_21';
	$username = 'db450157_21';
	$password = 'gk2e+KPby13k';


    try {
        $verbindung = new PDO($server, $username, $password);
    } catch (PDOException $e) {
        print $e->getMessage();
    }

    $jobID = $_GET['jobID'];

    $sqlQuery = 'SELECT jobName, companyName, companyAddress, companyCity, companyPLZ, companyHomepage, companyEmail, companyTel, applicationType, applicationReq, applicationTime, LEFT(workingHoursStart, 5),
    LEFT(workingHoursEnd, 5), responsibility, careRating, companyExperienceRating, jobExperienceRating, personalRating, teacherRating, teacherComment, created FROM Job WHERE jobID = "' . $jobID . '"';

    $query = $verbindung->prepare($sqlQuery);
    $query->execute();
    $output = $query->fetchAll(PDO::FETCH_NUM);

    if ($output[0][8] == 0) {
        $output[0][8] = "persönlich im Betrieb";
    } elseif ($output[0][8] == 1) {
        $output[0][8] = "telefonisch";
    } elseif ($output[0][8] == 2) {
        $output[0][8] = "per E-Mail";
    } elseif ($output[0][8] == 3) {
        $output[0][8] = "online (Homepage der Firma)";
    } elseif ($output[0][8] == 4) {
        $output[0][8] = "per Post (schriftliche Bewerbung)";
    }

    if ($output[0][10] == 0) {
        $output[0][10] = "mehr als 12 Monate vor Beginn des Praktikums";
    } elseif ($output[0][10] == 1) {
        $output[0][10] = "6 - 12 Monate vor Beginn des Praktikums";
    } elseif ($output[0][10] == 2) {
        $output[0][10] = "3 - 6 Monate vor Beginn des Praktikums";
    } elseif ($output[0][10] == 3) {
        $output[0][10] = "weniger als 3 Monate vor Beginn des Praktikums";
    }

    if ($output[0][13] == 0) {
        $output[0][13] = "Nein";
    } elseif ($output[0][13] == 1) {
        $output[0][13] = "Ja";
    }

    if ($output[0][18] == 1) {
        $output[0][18] = "sehr sinnvoll";
    } elseif ($output[0][18] == 2) {
        $output[0][18] = "sinnvoll";
    } elseif ($output[0][18] == 3) {
        $output[0][18] = "weniger sinnvoll";
    } elseif ($output[0][18] == 4) {
        $output[0][18] = "nicht sinnvoll";
    }

    $attributes = array(
        "Berufsbezeichnung", "Name des Betriebes", "Straße und Hausnnummer", "Ort", "PLZ", "Website", "E-Mail", "Telefonnummer", "Bewerbung erfolgte", "Voraussetzungen",
        "Zeitpunkt der Bewerbung", "tägliche Arbeitszeit", "Hast du im Praktikum eigenverantworliche Tätigkeiten ausüben können?", "Bewertung der Praktikantenbetreuung im Betrieb", " Einblick in den Betrieb", " Einblick in den Beruf", "Persönliche Gesamtbewertung", "Das Praktikum dort war", "Anmerkungen des Lehrers"
    );
    ?>
    <title><?php echo "Praktikumsdatenbank HoLa - " . $output[0][0] ?></title>
    <link rel="icon" href="" />
    <link rel="stylesheet" type="text/css" href="" />
</head>

<body>
    <header id="header">
        <h1>Praktikumsdatenbank der Hohen Landesschule Hanau</h1>
    </header>
    <div id="output">
        <?php
        echo "<h2>" . $output[0][0] . "</h2>";
        ?>
        <div class="category">
            <h3>Betrieb</h3>
            <?php
            for ($i = 1; $i < 11; $i++) {
                if ($i == 5) {
                    echo '<p>' . $attributes[$i] . ': <a href="//' . $output[0][$i] . '"> ' . $output[0][$i] . ' </a></p>';
                } else {
                    echo "<p>" . $attributes[$i] . ": " . $output[0][$i] . "</p>";
                }
            }
            echo "<p>" . $attributes[11] . ":  von " . $output[0][11] . " Uhr bis " . $output[0][12] . " Uhr </p>";
            ?>
        </div>
        <div class="category">
            <h3>Bewertung durch den Schüler (in Schulnoten)</h3>
            <?php
            for ($i = 12; $i < 17; $i++) {
                echo "<p>" . $attributes[$i] . ": " . $output[0][$i + 1] . "</p>";
            }
            echo "<p> durchschnittliche Bewertung: " . round(($output[0][14] + $output[0][15] + $output[0][16] + $output[0][17]) / 4, 0, PHP_ROUND_HALF_UP) . "</p>";
            ?>
        </div>
        <div class="category">
            <h3>Einschätzung durch die Lehrkraft</h3>
            <?php
            for ($i = 17; $i < count($attributes); $i++) {
                echo "<p>" . $attributes[$i] . ": " . $output[0][$i + 1] . "</p>";
            }
            echo "<br> Diese Praktikumsbewertung wurde im Jahr " . $output[0][20] . " erstellt.";

            ?>
        </div>
    </div>
</body>

</html>