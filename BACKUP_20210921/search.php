<?php
$server = 'mysql:host=mysql5.inf5.de; dbname=db450157_21; charset=utf8';
$username = 'db450157_21';
$password = 'gk2e+KPby13k';

try {
    $connection = new PDO($server, $username, $password);
} catch (PDOException $e) {
    print $e->getMessage();
}

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
