<?php
$server = 'mysql:host=mysql5.inf5.de; dbname=db450157_21; charset=utf8';
$username = 'db450157_21';
$password = 'gk2e+KPby13k';
$gockel = rand(1, 33);
$spongebob = rand(1, 3);
$ranjid = rand(1, 2);
$forbiddenwords = array(
    "penis", "titten", "titte", "schwanz", "ficken", "sex", "schniedel", "nippel", "nutte", "hurensohn", "hure", "arschloch", "anus", "möpse", "muschi", "vagina", "muschifurz", "pimmel",
    "wixxer", "wichser", "wixer", "klöten", "eier", "hoden", "arschfick", "analsex", "arsch", "scheiße"
);

try {
    $connection = new PDO($server, $username, $password);
} catch (PDOException $e) {
    print $e->getMessage();
}

if (strtolower($_POST['search']) == "gockel") {
    echo '<img class="p-3 mt-5" style="display: block; margin: auto; width:50%" src="res/gockel/gockel_' . $gockel . '.gif">';
    echo '<audio autoplay loop><source src="res/gockelsound.mp3" type="audio/mp3"></audio>';
} elseif (strtolower($_POST['search']) == "batendank") {
    echo '<video style="display: block; margin: auto; width:75%" autoplay><source src="res/fullrickroll.mp4" type="video/mp4"></video>';
} elseif (in_array(strtolower($_POST['search']), $forbiddenwords)) {
    echo '<img class="p-3 mt-5" style="display: block; margin: auto; width:50%" src="res/rickroll.gif">';
    echo '<audio autoplay loop><source src="res/rickrules.mp3" type="audio/mp3"></audio>';
} elseif (strtolower($_POST['search']) == "spongebob") {
    echo '<img class="p-3 mt-5" style="display: block; margin: auto; width:50%;" src="res/spongebob/spongebob_' . $spongebob . '.png">';
} elseif (strtolower($_POST['search']) == "onat") {
    echo '<audio autoplay loop><source src="res/onat.mp3" type="audio/mp3"></audio>';
} elseif (strtolower($_POST['search']) == "ranjid") {
    echo '<img class="p-3 mt-5" style="display: block; margin: auto; width:50%;" src="res/ranjid.jpg">';
    echo '<audio autoplay loop><source src="res/ranjid_' . $ranjid . '.mp3" type="audio/mp3"></audio>';
} elseif (strtolower($_POST['search']) == "pfennigfuchsen" || strtolower($_POST['search']) == "pfennigfuchser" || strtolower($_POST['search']) == "geizhals" || strtolower($_POST['search']) == "geizhals-handschlag" || strtolower($_POST['search']) == "geizhals handschlag") {
    echo '<video style="display: block; margin: auto; height: 500px" autoplay><source src="res/pfennigfuchser.mp4" type="video/mp4"></video>';
} else {
    $sqlQuery = 'SELECT jobID, jobName, companyName, companyCity, ROUND((careRating + companyExperienceRating + jobExperienceRating +
                personalRating) / "4") AS avgRating, teacherRating FROM Job WHERE ' . $_POST['type'] . ' LIKE "%' . $_POST['search'] . '%" AND approval = 1 ORDER BY jobName';

    $query = $connection->prepare($sqlQuery);
    $query->execute();
    $output = $query->fetchAll(PDO::FETCH_NUM);

    for ($i = 0; $i < count($output); $i++) {
        if ($output[$i][5] == 0) {
            $output[$i][5] = "sehr sinnvoll";
        } elseif ($output[$i][5] == 1) {
            $output[$i][5] = "sinnvoll";
        } elseif ($output[$i][5] == 2) {
            $output[$i][5] = "weniger sinnvoll";
        } elseif ($output[$i][5] == 3) {
            $output[$i][5] = "nicht sinnvoll";
        }
    }

    if (count($output) > 0) {
        for ($i = 0; $i < count($output); $i++) {
            echo '<tr data-href="details.php?jobID=' . $output[$i][0] . '">';
            for ($j = 1; $j < count($output[0]); $j++) {
                echo "<td>" . $output[$i][$j] . "</td>";
            }
            echo "<td>▸</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td>Keine passenden Daten zum Suchbegriff gefunden!</td></tr>";
    }
}
?>