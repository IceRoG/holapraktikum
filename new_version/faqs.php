<?php
header("Content-Type: text/html; charset=utf-8");

session_start();
?>

<!DOCTYPE html>

<html lang="de-DE">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="icon" href="res/index.png" />
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>FAQs - Praktikumsdatenbank HoLa</title>
    <?php
    if ($_SESSION['userid'] == "") {
        echo '<meta http-equiv="refresh" content="0; URL=login/index.php">';
    }
    if ($_SESSION['changePwFirst'] == 1) {
        echo '<meta http-equiv="refresh" content="0; URL=changePassword.php">';
    }
    ?>
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <header class="container-fluid pt-3 pb-4">
                <div>
                    <h1 class="text-white fw-bold">
                        <a class="text-reset text-decoration-none" href="index.php">Praktikumsdatenbank der Hohen Landesschule Hanau</a>
                    </h1>
                </div>
                <div>
                    <h2 class="text-white">
                        FAQs - Häufig gestellte Fragen
                    </h2>
                </div>
                <div>
                    <h4 class="text-white">
                        Sie sind angemeldet als: <?php echo $_SESSION['userid']; ?>
                    </h4>
                </div>
                <form style=" position: absolute; top: 22px; right: 20px; z-index: 100;" accept-charset="utf-8" action="logout.php" method="POST">
                    <div class="input-group">
                        <img class="input-group-text rounded-end rounded-pill" src="res/box-arrow-left.svg">
                        <span class="bg-white rounded-start rounded-pill">
                            <input class="input-group-text btn btn-outline-primary rounded-start rounded-pill" type="submit" name="submit" value="Logout">
                        </span>
                    </div>
                </form>
            </header>
            <main class="container-fluid p-3">
                <h3 class="fw-bold">Hier finden Sie Antworten auf häufig gestellte Fragen</h3>
                <h4 class="pt-3 fw-bold">Klassen und Kurse verwalten:</h4>
                <div class="pt-3">
                    <div class="accordion" id="accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <strong>1. Wie kann ich eine neue Klasse bzw. einen neuen Kurs erstellen?</strong>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    Sie können eine neue Klasse bzw. einen neuen Kurs erstellen, indem Sie den Klassen- bzw. Kursnamen in das vorgesehene Feld eintragen und auf &bdquo;Anlegen&ldquo; klicken.
                                    Bitte beachten Sie, dass jede Klasse bzw. jeder Kurs nur einmal erstellt werden darf. Dopplungen sind demnach nicht möglich.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <strong>2. Beim Versuch, eine Klasse oder einen Kurs zu erstellen, erhalte ich eine Fehlermeldung. Was kann ich tun?</strong>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    Die betreffende Klasse bzw. der betreffende Kurs kann sehr wahrscheinlich nicht angelegt werden, da bereits eine Klasse bzw. ein Kurs mit demselben Namen angelegt wurde.
                                    Dieser kann beispielsweise noch aus dem vorherigen Jahr stammen. Überprüfen Sie bitte daher in Ihrer Klassen- und Kursliste auf der Verwaltungsseite zunächst, ob
                                    bereits eine Klasse oder ein Kurs mit dem gewünschten Namen existiert. Wenn dies der Fall ist, können Sie die alte Klasse oder den alten Kurs löschen. Aber Achtung: Alle nicht
                                    freigegebenen Praktikumsbewertungen, die zu der zu löschenden Klasse oder dem zu löschenden Kurs gehören, gehen dabei verloren. Falls der Klassen- bzw. Kursname nicht in Ihrer Klassen-
                                    und Kursliste steht und dennoch nicht angelegt werden kann, können Sie sich gerne an unseren Support (<a href="mailto:praktikumsdb@hola-gymnasium.de">praktikumsdb@hola-gymnasium.de</a>) wenden.
                                    Alternativ können Sie auch einfach einen leicht veränderten Klassen- bzw. Kursnamen eingeben (z.B. 9a_1 statt 9a).
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <strong>3. Wie kann ich eine Klasse oder einen Kurs wieder löschen?</strong>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    Sie können eine Klasse bzw. einen Kurs löschen, indem Sie den betreffenden Klassen- oder Kursnamen in das vorgesehene Feld eintragen und auf &bdquo;Löschen&ldquo; klicken. Aber Achtung: Alle nicht
                                    freigegebenen Praktikumsbewertungen, die zu der zu löschenden Klasse oder dem zu löschenden Kurs gehören, gehen dabei verloren.
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4 class="pt-3 fw-bold">PIN:</h4>
                        <div class="pt-3">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <strong>4. Wo finde ich die PIN für die jeweiligen Klassen und Kurse?</strong>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        Die PIN finden Sie in Klammern neben dem jeweiligen Kurs- bzw. Klassennamen in Ihrer Klassen- und Kursliste auf der Verwaltungsseite.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <strong>5. Meine Schüler erhalten die Fehlermeldung, dass die PIN schon zu häufig verwendet wurde. Was kann ich tun?</strong>
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        Eine PIN darf jeweils nur 30 Mal verwendet werden. Wenn dennoch nicht alle Schüler Ihre Praktikumsbewertung eintragen konnten (z.B. weil ein Schüler aus Spaß mehrere Praktikumsbewertungen angelegt hat),
                                        können Sie einfach einen neuen Kurs mit leicht verändertem Klassen- bzw. Kursnamen erstellen (z.B. 9a_1 für 9a). Dadurch erhalten Sie eine neue gültige PIN.
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4 class="pt-3 fw-bold">Praktikumsbewertungen erstellen und verwalten:</h4>
                            <div class="pt-3">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            <strong>6. Wo können meine Schüler ihre Praktikumsbewertung erstellen?</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Ihre Schüler können ihre Praktikumsbewertung unter dem Link &bdquo;<a href="form/index.php">holapraktikum/form/</a>&ldquo; eintragen.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSeven">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                            <strong>7. Wo finde ich die von meinen Schülern erstellten Praktikumsbewertungen?</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Sie finden die Praktikumsbewertungen Ihrer Schüler unter der von Ihnen erstellten Klasse bzw. unter dem von Ihnen erstellten Kurs in Ihrer Klassen- und Kursliste auf der Verwaltungsseite.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingEight">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                            <strong>8. Wie kann ich zu einer Praktikumsbewertung meiner Schüler meine Bewertung hinzufügen?</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Klicken Sie in Ihrer Klassen- und Kursliste auf der Verwaltungsseite auf die Praktikumsbewertung, zu der Sie eine Bewertung hinzufügen möchten. Anschließend finden Sie, wenn Sie herunterscrollen,
                                            die Formularfelder für die Lehrer-Bewertung.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingNine">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                            <strong>9. Wie kann ich die Praktikumsbewertungen meiner Schüler freigeben?</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Klicken Sie in Ihrer Klassen- und Kursliste auf der Verwaltungsseite auf die Praktikumsbewertung, zu der Sie eine Bewertung hinzufügen möchten. Anschließend finden Sie, wenn Sie herunterscrollen,
                                            die Möglichkeit, die betreffende Praktikumsbewertung freizugeben. Sie müssen jedoch zuerst Ihre Bewertung zur Praktikumsbewertung hinzufügen, um die Freigabe durchzuführen. Eine getätigte Freigabe kann nicht wieder rückgängig gemacht werden.
                                            Sollten Sie versehentlich eine Praktikumsbewertung freigegeben haben, obwohl Sie dies nicht wollten, so wenden Sie sich bitte an unseren Support (<a href="mailto:praktikumsdb@hola-gymnasium.de">praktikumsdb@hola-gymnasium.de</a>).
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTen">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                            <strong>10. Wie kann ich falsche Eingaben in den Praktikumsbewertungen meiner Schüler korrigieren?</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Klicken Sie in Ihrer Klassen- und Kursliste auf der Verwaltungsseite auf die Praktikumsbewertung, die Sie bearbeiten möchten. Anschließend finden Sie, wenn Sie herunterscrollen,
                                            die Möglichkeit, die betreffende Praktikumsbewertung zu bearbeiten. Vergessen Sie jedoch nicht, die Korrektur zu speichern. Eine Korrektur können Sie speichern, indem Sie auf die entsprechende Schaltfläche (&bdquo;Speichern&ldquo;) klicken.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingEleven">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                            <strong>11. Wie kann ich falsche Eingaben in den Praktikumsbewertungen meiner Schüler korrigieren, nachdem ich diese freigegeben habe?</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Bereits freigegebene Praktikumsbewertungen können nur noch vom Administrator bearbeitet werden. Wenn Sie eine bereits freigegebene Praktikumsbewertung finden, welche Fehler enthält, können Sie sich gerne an unseren
                                            Support (<a href="mailto:praktikumsdb@hola-gymnasium.de">praktikumsdb@hola-gymnasium.de</a>) wenden. Dieser hat Kontakt zum Administrator, welcher jeden Fehler in den Praktikumsbewertungen gerne korrigiert.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFifteen">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                                            <strong>12. Wie kann ich eine unechte bzw. falsche Praktikumsbewertung meiner Schüler löschen?</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseFifteen" class="accordion-collapse collapse" aria-labelledby="headingFifteen" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Klicken Sie in Ihrer Klassen- und Kursliste auf der Verwaltungsseite auf die Praktikumsbewertung, die Sie löschen möchten. Anschließend finden Sie, wenn Sie herunterscrollen,
                                            die Möglichkeit, die betreffende Praktikumsbewertung zu löschen. Aber Achtung: Der Löschvorgang kann nicht wieder rückgängig gemacht werden.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSixteen">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                                            <strong>13. Wie kann ich eine unechte bzw. falsche Praktikumsbewertung meiner Schüler löschen, nachdem ich diese freigegeben habe?</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseSixteen" class="accordion-collapse collapse" aria-labelledby="headingSixteen" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Bereits freigegebene Praktikumsbewertungen können nur noch vom Administrator gelöscht werden. Wenn Sie eine bereits freigegebene Praktikumsbewertung finden, welche unecht bzw. falsch ist, können Sie sich gerne an unseren
                                            Support (<a href="mailto:praktikumsdb@hola-gymnasium.de">praktikumsdb@hola-gymnasium.de</a>) wenden. Dieser hat Kontakt zum Administrator, welcher jede unechte bzw. falsche Praktikumsbewertung gerne löscht.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwelve">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                            <strong>14. Kann ich eine Freigabe von Praktikumsbewertungen meiner Schüler wieder rückgängig machen?</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Eine getätigte Freigabe kann nicht wieder rückgängig gemacht werden. Sollten Sie versehentlich eine Praktikumsbewertung freigegeben haben,
                                            obwohl Sie dies nicht wollten, so wenden Sie sich bitte an unseren Support (<a href="mailto:praktikumsdb@hola-gymnasium.de">praktikumsdb@hola-gymnasium.de</a>).
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4 class="pt-3 fw-bold">Mein Benutzeraccount:</h4>
                            <div class="pt-3">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThirteen">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                            <strong>15. Wie kann ich mein Passwort ändern?</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseThirteen" class="accordion-collapse collapse" aria-labelledby="headingThirteen" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Sie finden im Fußbereich der Verwaltungsseite unten rechts die Möglichkeit, ihr Passwort zu ändern. Für eine Änderung des Passwortes benötigen Sie Ihr aktuelles Passwort.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFourteen">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                            <strong>16. Kann ich meinen Benutzernamen ändern?</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="headingFourteen" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Alle Benutzernamen sind wie das folgende Beispiel aufgebaut: &bdquo;m.mustermann&ldquo;. Eine Änderung der Benutzernamen ist an sich nicht vorgesehen. Sollten Sie dennoch eine Änderung Ihres
                                            Benutzernamens wünschen (z.B. weil Sie einen neuen Nachnamen angenommen haben), so wenden Sie sich bitte an unseren Support (<a href="mailto:praktikumsdb@hola-gymnasium.de">praktikumsdb@hola-gymnasium.de</a>).
                                            Dieser kann Ihren Benutzernamen vom Administrator ändern lassen.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-3 mt-3 mb-3">
                    <a class="input-group-text btn btn-outline-primary rounded-pill" href="administrate.php">Zurück zur Verwaltungsseite</a>
                </div>
            </main>
            <script>
                $(document).ready(function() {

                    var back_to_top_button = ['<a href="#top" class="back-to-top rounded" style="font-size: 18px; font-weight: bold; background: #ff7f00; color: white; text-decoration: none; position: fixed; bottom: 20px;right: 20px;padding: 1em;z-index: 100;">▲</a>'].join("");
                    $("body").append(back_to_top_button)


                    $(".back-to-top").hide();


                    $(function() {
                        $(window).scroll(function() {
                            if ($(this).scrollTop() > 100) {
                                $('.back-to-top').fadeIn();
                            } else {
                                $('.back-to-top').fadeOut();
                            }
                        });

                        $('.back-to-top').click(function() {
                            $('body,html').animate({
                                scrollTop: 0
                            }, 200);
                            return false;
                        });
                    });
                });
            </script>
        </div>
        <footer class="container-fluid bg-light pt-3">
            <div class="grid">
                <div class="row text-center fs-6">
                    <div class="col">
                        <p class="fw-bold">Kontakt</p>
                        <hr />
                        <p>
                            Schreiben Sie uns gerne eine E-Mail unter: <br />
                            <a href="mailto:praktikumsdb@hola-gymnasium.de">praktikumsdb@hola-gymnasium.de</a>
                        </p>
                    </div>
                    <div class="col">
                        <p class="fw-bold">Ersteller</p>
                        <hr />
                        <div class="row">
                            <p class="col">Marc Pfeiffer</p>
                            <p class="col">Maximilian Partin</p>
                        </div>
                        <div class="row">
                            <p class="col">Roman Grigoriev</p>
                            <p class="col">Marcel Maier</p>
                        </div>
                    </div>
                    <div class="col">
                        <p class="fw-bold">Passwort ändern</p>
                        <hr />
                        <a href="changePassword.php">Hier können Sie Ihr Passwort ändern!</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>