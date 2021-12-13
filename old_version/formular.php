<?php
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="de-DE">

<head>
    <script>
        $(document).ready(function() {
            $(window).keydown(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
    <title>Formular - Praktikumsplatz hinzufügen</title>
    <meta charset="utf-8">
    <style>
        input[type=submit] {
            border: 1px solid black;
            border-radius: 10px;
            padding: 10px 32px;
        }
    </style>
</head>

<body>
    <h1>Praktikumsplatz hinzufügen</h1>
    <form accept-charset="utf-8" action="formular.php" method="POST" onSubmit="return confirm('Daten übermitteln?')">
        <fieldset>
            <legend>Anmelden</legend>
            <label for="vorname">Vorname:</label>
            <input type="text" id="vorname" name="vorname" maxlenght="50" required><br>

            <label for="nachname">Nachname:</label>
            <input type="text" id="nachname" name="nachname" maxlenght="50" required><br>

            <!-- <label for="pin">Pin (vom Lehrer):</label>
            <input type="text" id="pin" name="pin" required> -->
        </fieldset>
        <fieldset>
            <legend>Beruf</legend>
            <label for="berBezeichnung">Berufsbezeichnung:</label>
            <input type="text" id="berBezeichung" name="berBezeichnung" maxlenght="50" required>
        </fieldset>
        <fieldset>
            <legend>Betrieb</legend>
            <label for="betriebsname">Name des Betriebs:</label>
            <input type="text" id="betriebsname" name="betriebsname" maxlenght="50" required><br>

            <label for="straßeNr">Straße und Hausnummer:</label>
            <input type="text" id="straßeNr" name="straßeNr" maxlenght="50" required><br>

            <label for="ort">Ort:</label>
            <input type="text" id="ort" name="ort" maxlenght="25" required>

            <label for="plz">und PLZ:</label>
            <input type="text" id="plz" name="plz" minlength="5" maxlength="5" pattern="[0-9]{5}" required><br>

            <label for="homepage">Website</label>
            <input type="text" id="homepage" name="homepage" placeholder="-keine-" maxlenght="50"><br>

            <label for="email">E-Mail-Adresse:</label>
            <input type="email" id="email" name="email" placeholder="-keine-" maxlenght="50"><br>

            <label for="tel">Telefonnummer:</label>
            <input type="text" id="tel" name="tel" placeholder="-keine-" maxlenght="50"><br>

            <label for="bewerbungsart">Bewerbung erfolgte:</label>
            <select id="bewerbungsart" name="bewerbungsart" required>
                <option value="" disabled selected>auswählen...</option>
                <option value="0">persönlich im Betrieb</option>
                <option value="1">telefonisch</option>
                <option value="2">per E-Mail</option>
                <option value="3">online (Homepage der Firma)</option>
                <option value="4">per Post (schriftliche Bewerbung)</option>
            </select><br>

            <label for="voraussetzungen">Voraussetzungen:</label><br>
            <textarea rows="4" cols="50" id="voraussetzungen" name="voraussetzungen" placeholder="-keine-" maxlenght="1000"></textarea><br>

            <label for="bewerbungszeitpunkt">Zeitpunkt der Bewerbung:</label>
            <select id="bewerbungszeitpunkt" name="bewerbungszeitpunkt" required>
                <option value="" disabled selected>auswählen...</option>
                <option value="0">mehr als 12 Monate</option>
                <option value="1">6 - 12 Monate</option>
                <option value="2">3 - 6 Monate</option>
                <option value="3">weniger als 3 Monate</option>
            </select>
            <label for="bewerbungszeitpunkt">vor Beginn des Praktikums</label><br>

            <label for="arbeitszeitAnfang">tägliche Arbeitszeit (z.B. 07:45): von</label>
            <input type="time" id="arbeitszeitAnfang" name="arbeitszeitAnfang">
            <label for="arbeitszeitEnde">bis</label>
            <input type="time" id="arbeitszeitEnde" name="arbeitszeitEnde"><br>
        </fieldset>
        <fieldset>
            <legend>Bewertung durch den Schüler</legend>
            <label for="eigenverantwortlichesArbeiten">Hast du im Praktikum eigenverantworliche Tätigkeiten ausüben können?</label>
            <select id="eigenverantwortlichesArbeiten" name="eigenverantwortlichesArbeiten" required>
                <option value="" disabled selected>--</option>
                <option value="1">Ja</option>
                <option value="0">Nein</option>
            </select><br>

            <label for="bwBetreuung">Bewertung der Praktikantenbetreuung im Betrieb:</label>
            <select id="bwBetreuung" name="bwBetreuung" required>
                <option value="" disabled selected>--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select><br>

            <label for="bwBetrieb">Einblick in den Betrieb:</label>
            <select id="bwBetrieb" name="bwBetrieb" required>
                <option value="" disabled selected>--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select><br>

            <label for="bwBeruf">Einblick in den Beruf:</label>
            <select id="bwBeruf" name="bwBeruf" required>
                <option value="" disabled selected>--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select><br>

            <label for="persoenlich">Persönliche Gesamtbewertung:</label>
            <select id="persoenlich" name="persoenlich" required>
                <option value="" disabled selected>--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select><br>
            <p>(Bewertung in Schulnoten)</p>
        </fieldset>

        <fieldset>
            <legend>Einschätzung durch die Lehrkraft</legend>
            <label for="beurteilung">Das Praktikum dort war:</label>
            <select id="beurteilung" name="beurteilung" required>
                <option value="" disabled selected>--</option>
                <option value="1">sehr sinnvoll</option>
                <option value="2">sinnvoll</option>
                <option value="3">weniger sinnvoll</option>
                <option value="4">nicht sinnvoll</option>
            </select><br>

            <label for="anmerkungen">Anmerkungen des Lehrers:</label><br>
            <textarea rows="4" cols="50" id="anmerkungen" name="anmerkungen" placeholder="-keine-" maxlenght="1000"></textarea><br>
        </fieldset>
        <input type="submit" name="submit">
    </form>

    <p>Das Formular wird anschließend von deinem Lehrer überprüft und übernommen.</p>
    <?php
    // require 'database.ini';
    $server = 'mysql:host=mysql5.inf5.de; dbname=db450157_21; charset=utf8';
    $username = 'db450157_21';
    $password = 'gk2e+KPby13k';

    try {
        $verbindung = new PDO($server, $username, $password);
    } catch (PDOException $e) {
        print $e->getMessage();
    }


    try {
        $verbindung = new PDO($server, $username, $password);
    } catch (PDOException $e) {
        print $e->getMessage();
    }

    if (isset($_POST["submit"])) {
        //Variablen aus Formular
        echo "<br><br><br><p>Anzeigen der Eingabe zum Überprüfen der Variablen:</p><br>";
        $vorname =  $_POST['vorname'];
        $nachname =  $_POST['nachname'];
        //$pin =  $_POST['pin' ];
        $berBezeichnung = $_POST['berBezeichnung'];
        $betriebsname = $_POST['betriebsname'];
        $straßeNr = $_POST['straßeNr'];
        $ort = $_POST['ort'];
        $plz = $_POST['plz'];
        $homepage = $_POST['homepage'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $voraussetzungen = $_POST['voraussetzungen'];
        $bewerbungsart = $_POST['bewerbungsart'];
        $bewerbungszeitpunkt = $_POST['bewerbungszeitpunkt'];
        $arbeitszeitAnfang = $_POST['arbeitszeitAnfang'];
        $arbeitszeitEnde = $_POST['arbeitszeitEnde'];
        $eigenverantwortlichesArbeiten =  $_POST['eigenverantwortlichesArbeiten'];
        $bwBetreuung = $_POST['bwBetreuung'];
        $bwBetrieb = $_POST['bwBetrieb'];
        $bwBeruf = $_POST['bwBeruf'];
        $persoenlich = $_POST['persoenlich'];
        $beurteilung = $_POST['beurteilung'];
        $anmerkungen = $_POST['anmerkungen'];

        //Metadaten
        $datumErstellt = date('Y');
        $IP = $_SERVER['REMOTE_ADDR'];


        echo "studentName: " . $vorname . "<br>";
        echo "studentLastName: " . $nachname . "<br>";
        //echo "pinID: " . $pin . "<br>";
        echo "jobName: " . $berBezeichnung . "<br>";
        echo "companyName: " . $betriebsname . "<br>";
        echo "companyAdress: " . $straßeNr . "<br>";
        echo "companyCity: " . $ort . "<br>";
        echo "companyPLZ: " . $plz . "<br>";
        echo "companyHomepage: " . $homepage . "<br>";
        echo "companyEmail: " . $email . "<br>";
        echo "companyTel: " . $tel . "<br>";
        echo "applicationType: " . $bewerbungsart . "<br>";
        echo "applicationReq: " . $voraussetzungen . "<br>";
        echo "applicationTime: " . $bewerbungszeitpunkt . "<br>";
        echo "workingHoursStart: " . $arbeitszeitAnfang . "<br>";
        echo "workingHoursEnd: " . $arbeitszeitEnde . "<br>";
        echo "resonsibility: " . $eigenverantwortlichesArbeiten . "<br>";
        echo "careRating: " . $bwBetreuung . "<br>";
        echo "companyExperienceRating: " . $bwBetrieb . "<br>";
        echo "jobExperienceRating: " . $bwBeruf . "<br>";
        echo "personalRating: " . $persoenlich . "<br>";
        echo "teacherRating: " . $beurteilung . "<br>";
        echo "teacherComent: " . $anmerkungen . "<br>";
        echo "created(Year): " . $datumErstellt . "<br>";
        echo "IP: " . $IP . "<br><br>";


        //ohne pin
        $sqlBefehl = "INSERT INTO Job(studentName, studentLastName, jobName, companyName, companyAddress, companyCity, companyPLZ,
                                        companyHomepage, companyEmail, companyTel, applicationType, applicationReq, applicationTime, workingHoursStart,
                                        workingHoursEnd, responsibility, careRating, companyExperienceRating, jobExperienceRating,
                                        personalRating, teacherRating, teacherComment, approval, created, IP)
                        VALUES ('$vorname', '$nachname', '$berBezeichnung', '$betriebsname', '$straßeNr', '$ort', '$plz',
                                '$homepage', '$email', '$tel', '$bewerbungsart', '$voraussetzungen', '$bewerbungszeitpunkt', '$arbeitszeitAnfang',
                                '$arbeitszeitEnde', '$eigenverantwortlichesArbeiten', '$bwBetreuung', '$bwBetrieb', '$bwBeruf',
                                '$persoenlich', '$beurteilung', '$anmerkungen', 0, '$datumErstellt', '$IP')";
        $abfrage = $verbindung->prepare($sqlBefehl);

        if ($abfrage->execute() === true) {
            echo "Datensatz erfolgreich in die Datenbank eingefügt!";
            echo '<meta http-equiv="refresh" content="0.5; URL=http://praktikum.inf5.de/submitted.html">';
        } else {
            echo "Fehler.Überprüfe deine Eingabe und sende sie erneut.";
        }
    }

    ?>
</body>

</html>