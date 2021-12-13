<?php
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="de-DE">

<head>
    <meta http-eqiuv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Praktikumsdatenbank HoLa</title>
    <link rel="icon" href="" />
    <link rel="stylesheet" type="text/css" href="" />

    <?php

    $server = 'mysql:host=mysql5.inf5.de; dbname=db450157_21; charset=utf8';
    $username = 'db450157_21';
    $password = 'gk2e+KPby13k';

    try {
        $verbindung = new PDO($server, $username, $password);
    } catch (PDOException $e) {
        print $e->getMessage();
    }

    $searchtype = "jobName";

    if (isset($_POST['submitSearch'])) {
        $searchtype = $_POST['searchtype'];
    }

    if ($searchtype == "jobTag") {
        $checkedJobName = null;
        $checkedCompanyName = null;
        $checkedJobTag = "checked";
    } elseif ($searchtype == "companyName") {
        $checkedJobName = null;
        $checkedCompanyName = "checked";
        $checkedJobTag = null;
    } else {
        $checkedJobName = "checked";
        $checkedCompanyName = null;
        $checkedJobTag = null;
    }

    $search = $_POST['search'];

    if (isset($_POST['resetSearch'])) {
        $searchtype = "jobName";
        $search = null;
    }

    $orderBy = "jobName";
    $orderByDirection = "ASC";
    $orderByDirectionButtons = array("ASC", "DESC", "DESC", "DESC", "DESC");
    $orderByDirectionSymbol = array(null, null, null, null, null);

    if (isset($_POST['submitSortjobNameASC'])) {
        $orderBy = "jobName";
        $orderByDirection = "DESC";
        $searchtype = $_POST['searchtype'];
        $search = $_POST['search'];
        if ($searchtype == "jobTag") {
            $checkedJobName = null;
            $checkedCompanyName = null;
            $checkedJobTag = "checked";
        } elseif ($searchtype == "companyName") {
            $checkedJobName = null;
            $checkedCompanyName = "checked";
            $checkedJobTag = null;
        } else {
            $checkedJobName = "checked";
            $checkedCompanyName = null;
            $checkedJobTag = null;
        }
        for ($i = 0; $i < count($orderByDirectionSymbol); $i++) {
            if ($i == 0) {
                $orderByDirectionSymbol[$i] = "↓&#32;";
                $orderByDirectionButtons[$i] = "DESC";
            } else {
                $orderByDirectionSymbol[$i] = null;
                $orderByDirectionButtons[$i] = "DESC";
            }
        }
    } elseif (isset($_POST['submitSortjobNameDESC'])) {
        $orderBy = "jobName";
        $orderByDirection = "ASC";
        $searchtype = $_POST['searchtype'];
        $search = $_POST['search'];
        if ($searchtype == "jobTag") {
            $checkedJobName = null;
            $checkedCompanyName = null;
            $checkedJobTag = "checked";
        } elseif ($searchtype == "companyName") {
            $checkedJobName = null;
            $checkedCompanyName = "checked";
            $checkedJobTag = null;
        } else {
            $checkedJobName = "checked";
            $checkedCompanyName = null;
            $checkedJobTag = null;
        }
        for ($i = 0; $i < count($orderByDirectionSymbol); $i++) {
            if ($i == 0) {
                $orderByDirectionSymbol[$i] = "↑&#32;";
                $orderByDirectionButtons[$i] = "ASC";
            } else {
                $orderByDirectionSymbol[$i] = null;
                $orderByDirectionButtons[$i] = "DESC";
            }
        }
        $orderByDirectionSymbol[$i] = "";
    } elseif (isset($_POST['submitSortcompanyNameASC'])) {
        $orderBy = "companyName";
        $orderByDirection = "DESC";
        $searchtype = $_POST['searchtype'];
        $search = $_POST['search'];
        if ($searchtype == "jobTag") {
            $checkedJobName = null;
            $checkedCompanyName = null;
            $checkedJobTag = "checked";
        } elseif ($searchtype == "companyName") {
            $checkedJobName = null;
            $checkedCompanyName = "checked";
            $checkedJobTag = null;
        } else {
            $checkedJobName = "checked";
            $checkedCompanyName = null;
            $checkedJobTag = null;
        }
        for ($i = 0; $i < count($orderByDirectionSymbol); $i++) {
            if ($i == 1) {
                $orderByDirectionSymbol[$i] = "↓&#32;";
                $orderByDirectionButtons[$i] = "DESC";
            } else {
                $orderByDirectionSymbol[$i] = null;
                $orderByDirectionButtons[$i] = "DESC";
            }
        }
    } elseif (isset($_POST['submitSortcompanyNameDESC'])) {
        $orderBy = "companyName";
        $orderByDirection = "ASC";
        $searchtype = $_POST['searchtype'];
        $search = $_POST['search'];
        if ($searchtype == "jobTag") {
            $checkedJobName = null;
            $checkedCompanyName = null;
            $checkedJobTag = "checked";
        } elseif ($searchtype == "companyName") {
            $checkedJobName = null;
            $checkedCompanyName = "checked";
            $checkedJobTag = null;
        } else {
            $checkedJobName = "checked";
            $checkedCompanyName = null;
            $checkedJobTag = null;
        }
        for ($i = 0; $i < count($orderByDirectionSymbol); $i++) {
            if ($i == 1) {
                $orderByDirectionSymbol[$i] = "↑&#32;";
                $orderByDirectionButtons[$i] = "ASC";
            } else {
                $orderByDirectionSymbol[$i] = null;
                $orderByDirectionButtons[$i] = "DESC";
            }
        }
    } elseif (isset($_POST['submitSortcompanyCityASC'])) {
        $orderBy = "companyCity";
        $orderByDirection = "DESC";
        $searchtype = $_POST['searchtype'];
        $search = $_POST['search'];
        if ($searchtype == "jobTag") {
            $checkedJobName = null;
            $checkedCompanyName = null;
            $checkedJobTag = "checked";
        } elseif ($searchtype == "companyName") {
            $checkedJobName = null;
            $checkedCompanyName = "checked";
            $checkedJobTag = null;
        } else {
            $checkedJobName = "checked";
            $checkedCompanyName = null;
            $checkedJobTag = null;
        }
        for ($i = 0; $i < count($orderByDirectionSymbol); $i++) {
            if ($i == 2) {
                $orderByDirectionSymbol[$i] = "↓&#32;";
                $orderByDirectionButtons[$i] = "DESC";
            } else {
                $orderByDirectionSymbol[$i] = null;
                $orderByDirectionButtons[$i] = "DESC";
            }
        }
    } elseif (isset($_POST['submitSortcompanyCityDESC'])) {
        $orderBy = "companyCity";
        $orderByDirection = "ASC";
        $searchtype = $_POST['searchtype'];
        $search = $_POST['search'];
        if ($searchtype == "jobTag") {
            $checkedJobName = null;
            $checkedCompanyName = null;
            $checkedJobTag = "checked";
        } elseif ($searchtype == "companyName") {
            $checkedJobName = null;
            $checkedCompanyName = "checked";
            $checkedJobTag = null;
        } else {
            $checkedJobName = "checked";
            $checkedCompanyName = null;
            $checkedJobTag = null;
        }
        for ($i = 0; $i < count($orderByDirectionSymbol); $i++) {
            if ($i == 2) {
                $orderByDirectionSymbol[$i] = "↑&#32;";
                $orderByDirectionButtons[$i] = "ASC";
            } else {
                $orderByDirectionSymbol[$i] = null;
                $orderByDirectionButtons[$i] = "DESC";
            }
        }
    } elseif (isset($_POST['submitSortavgRatingASC'])) {
        $orderBy = "avgRating";
        $orderByDirection = "DESC";
        $searchtype = $_POST['searchtype'];
        $search = $_POST['search'];
        if ($searchtype == "jobTag") {
            $checkedJobName = null;
            $checkedCompanyName = null;
            $checkedJobTag = "checked";
        } elseif ($searchtype == "companyName") {
            $checkedJobName = null;
            $checkedCompanyName = "checked";
            $checkedJobTag = null;
        } else {
            $checkedJobName = "checked";
            $checkedCompanyName = null;
            $checkedJobTag = null;
        }
        for ($i = 0; $i < count($orderByDirectionSymbol); $i++) {
            if ($i == 3) {
                $orderByDirectionSymbol[$i] = "↓&#32;";
                $orderByDirectionButtons[$i] = "DESC";
            } else {
                $orderByDirectionSymbol[$i] = null;
                $orderByDirectionButtons[$i] = "DESC";
            }
        }
    } elseif (isset($_POST['submitSortavgRatingDESC'])) {
        $orderBy = "avgRating";
        $orderByDirection = "ASC";
        $searchtype = $_POST['searchtype'];
        $search = $_POST['search'];
        if ($searchtype == "jobTag") {
            $checkedJobName = null;
            $checkedCompanyName = null;
            $checkedJobTag = "checked";
        } elseif ($searchtype == "companyName") {
            $checkedJobName = null;
            $checkedCompanyName = "checked";
            $checkedJobTag = null;
        } else {
            $checkedJobName = "checked";
            $checkedCompanyName = null;
            $checkedJobTag = null;
        }
        for ($i = 0; $i < count($orderByDirectionSymbol); $i++) {
            if ($i == 3) {
                $orderByDirectionSymbol[$i] = "↑&#32;";
                $orderByDirectionButtons[$i] = "ASC";
            } else {
                $orderByDirectionSymbol[$i] = null;
                $orderByDirectionButtons[$i] = "DESC";
            }
        }
    } elseif (isset($_POST['submitSortteacherRatingASC'])) {
        $orderBy = "teacherRating";
        $orderByDirection = "DESC";
        $searchtype = $_POST['searchtype'];
        $search = $_POST['search'];
        if ($searchtype == "jobTag") {
            $checkedJobName = null;
            $checkedCompanyName = null;
            $checkedJobTag = "checked";
        } elseif ($searchtype == "companyName") {
            $checkedJobName = null;
            $checkedCompanyName = "checked";
            $checkedJobTag = null;
        } else {
            $checkedJobName = "checked";
            $checkedCompanyName = null;
            $checkedJobTag = null;
        }
        for ($i = 0; $i < count($orderByDirectionSymbol); $i++) {
            if ($i == 4) {
                $orderByDirectionSymbol[$i] = "↓&#32;";
                $orderByDirectionButtons[$i] = "DESC";
            } else {
                $orderByDirectionSymbol[$i] = null;
                $orderByDirectionButtons[$i] = "DESC";
            }
        }
    } elseif (isset($_POST['submitSortteacherRatingDESC'])) {
        $orderBy = "teacherRating";
        $orderByDirection = "ASC";
        $searchtype = $_POST['searchtype'];
        $search = $_POST['search'];
        if ($searchtype == "jobTag") {
            $checkedJobName = null;
            $checkedCompanyName = null;
            $checkedJobTag = "checked";
        } elseif ($searchtype == "companyName") {
            $checkedJobName = null;
            $checkedCompanyName = "checked";
            $checkedJobTag = null;
        } else {
            $checkedJobName = "checked";
            $checkedCompanyName = null;
            $checkedJobTag = null;
        }
        for ($i = 0; $i < count($orderByDirectionSymbol); $i++) {
            if ($i == 4) {
                $orderByDirectionSymbol[$i] = "↑&#32;";
                $orderByDirectionButtons[$i] = "ASC";
            } else {
                $orderByDirectionSymbol[$i] = null;
                $orderByDirectionButtons[$i] = "DESC";
            }
        }
    }

    ?>

</head>

<body>
    <header id="header">
        <h1>Praktikumsdatenbank der Hohen Landesschule Hanau</h1>
    </header>


    Zurzeit funktionieren nur die Suchen nach bestimmten Berufsbezeichnungen und Betrieben. Die Schlüsselwortsuche befindet sich noch im Aufbau!
    <form accept-charset="utf-8" id="searchbar" action="index.php" method="POST">
        <fieldset>
            <legend>Suchleiste</legend>
            <p>Nach was soll gesucht werden?</p>
            <input type="radio" name="searchtype" id="jobName" value="jobName" <?php echo $checkedJobName; ?>>
            <label for="jobTitle">Berufsbezeichnung</label><br>
            <input type="radio" name="searchtype" id="companyName" value="companyName" <?php echo $checkedCompanyName; ?>>
            <label for="jobTitle">Betrieb</label><br>
            <input type="radio" name="searchtype" id="jobTag" value="jobTag" <?php echo $checkedJobTag; ?>>
            <label for="jobName">Schlüsselwörter</label><br>
            <input type="search" placeholder='Suche...' name="search" id="search" value="<?php echo $search; ?>" autofocus>
            <input type="submit" name="submitSearch" id="submitSearch" value="Suchen">
            <input type="submit" name="resetSearch" id="resetSearch" value="Suche zurücksetzen">
        </fieldset>

        <div id="output">
            <?php
            if ($searchtype != "jobTag") {
                $sqlQuery = 'SELECT jobID, jobName, companyName, companyCity, ROUND((careRating + companyExperienceRating + jobExperienceRating +
                personalRating) / "4") AS avgRating, teacherRating, companyHomepage FROM Job WHERE ' . $searchtype . ' LIKE "%' . $search . '%" ORDER BY ' . $orderBy . ' ' . $orderByDirection . '';
            }

            $query = $verbindung->prepare($sqlQuery);
            $query->execute();
            $output = $query->fetchAll(PDO::FETCH_NUM);
            $tableHead = array("Beruf", "Betrieb", "Ort", "Ø-Bewertung&#32;Schüler", "Bewertung&#32;Lehrkraft", "Homepage", "Details");
            $tableHeadAttributes = array("jobName", "companyName", "companyCity", "avgRating", "teacherRating", "companyHomepage");

            echo "<table>";
            echo "<tr>";
            for ($i = 0; $i < count($tableHead) - 2; $i++) {
                echo '<th><input type="submit" name="submitSort' . $tableHeadAttributes[$i] . $orderByDirectionButtons[$i] . '" id="submitSort" value= ' . $orderByDirectionSymbol[$i] . $tableHead[$i] . '></th>';
            }
            echo '<th>' . $tableHead[5] . '</th>';
            echo '<th>Details</th>';
            echo "</tr>";

            for ($i = 0; $i < count($output); $i++) {
                if ($output[$i][5] == 1) {
                    $output[$i][5] = "sehr sinnvoll";
                } elseif ($output[$i][5] == 2) {
                    $output[$i][5] = "sinnvoll";
                } elseif ($output[$i][5] == 3) {
                    $output[$i][5] = "weniger sinnvoll";
                } elseif ($output[$i][5] == 4) {
                    $output[$i][5] = "nicht sinnvoll";
                }
            }

            for ($i = 0; $i < count($output); $i++) {
                echo "<tr>";
                for ($j = 1; $j < count($output[0]) - 1; $j++) {
                    echo "<td>" . $output[$i][$j] . "</td>";
                }
                echo '<td><a href="//' . $output[$i][6] . '">' . $output[$i][6] . '</a></td>';
                echo '<td><a href="/details.php?jobID=' . $output[$i][0] . '">Details</a></td>';
                echo "</tr>";
            }

            echo "</table>";
            ?>
        </div>
    </form>
</body>

</html>