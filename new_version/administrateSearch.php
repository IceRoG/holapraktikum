<?php
session_start();

$server = 'mysql:host=mysql5.inf5.de; dbname=db450157_21; charset=utf8';
$username = 'db450157_21';
$password = 'gk2e+KPby13k';

try {
    $connection = new PDO($server, $username, $password);
} catch (PDOException $e) {
    print $e->getMessage();
}

$sqlQuery = 'SELECT jobID, studentName, studentLastName, jobName, companyName, companyCity, ROUND((careRating + companyExperienceRating + jobExperienceRating +
                personalRating) / "4") AS avgRating FROM Job WHERE jobName LIKE "%' . $_POST['search'] . '%" ORDER BY jobID';

$query = $connection->prepare($sqlQuery);
$query->execute();
$output = $query->fetchAll(PDO::FETCH_NUM);

if (count($output) > 0) {
    for ($i = 0; $i < count($output); $i++) {
        echo '<tr data-href="administrateAdminDetails.php?jobID=' . $output[$i][0] . '">';
        for ($j = 0; $j < count($output[0]); $j++) {
            echo "<td>" . $output[$i][$j] . "</td>";
        }
        echo "<td>▸</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td>Keine passenden Daten zum Suchbegriff gefunden!</td></tr>";
}
