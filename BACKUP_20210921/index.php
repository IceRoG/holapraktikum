<!DOCTYPE html>

<html lang="de-DE">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="res/index.png">
    <script src="js/jquery-3.6.0.js"></script>
    <title>Praktikumsdatenbank HoLa</title>
    <?php
    $autofocus = "autofocus";
    $searchtype = "jobName";

    if (isset($_POST['submit'])) {
        $searchtype = $_POST['searchtype'];
        $search = $_POST['search'];
        $autofocus = "";
    }

    if ($searchtype == "companyName") {
        $checkedJobName = null;
        $checkedCompanyName = "checked";
    } else {
        $checkedJobName = "checked";
        $checkedCompanyName = null;
    }

    ?>

</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <header class="container-fluid pt-3 pb-4 sticky-top">
                <div>
                    <h1 class="text-white fw-bold"><a class="text-reset text-decoration-none" href="index.php">Praktikumsdatenbank der Hohen Landesschule Hanau</a></h1>
                </div>
                <div>
                    <form accept-charset="utf-8" action="index.php" method="POST">
                        <div class="input-group mt-3 mb-3 col">
                            <img class="input-group-text bg-white border border-end-0 rounded-end rounded-pill" src="res/search.svg">
                            <input class="form-control border border-start-0 input" type="search" placeholder="Suche..." id="search" name="search" value="<?php echo $search; ?>" <?php echo $autofocus ?> autocomplete="off">
                            <span class="bg-white rounded-start rounded-pill">
                                <input class="input-group-text btn btn-outline-primary rounded-start rounded-pill" type="submit" name="submit" value="Suchen">
                            </span>
                        </div>
                        <div class="grid row justify-content-start">
                            <div class="col-auto">
                                <div class="input-group">
                                    <div class="bg-white input-group-text border border-end-0 rounded-end rounded-pill">
                                        <input class="form-check-input" type="radio" name="searchtype" value="jobName" id="jobName" onclick="changeSearchtype(this.id)" <?php echo $checkedJobName; ?>>
                                    </div>
                                    <input class="form-control border-0 searchtype-btn bg-white border border-start-0 rounded-start rounded-pill" type="button" value="Suche nach Berufen" onclick="changeSearchtype('jobName')">
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="input-group">
                                    <div class="bg-white input-group-text border border-end-0 rounded-end rounded-pill">
                                        <input class="form-check-input" type="radio" name="searchtype" value="companyName" id="companyName" onclick="changeSearchtype(this.id)" <?php echo $checkedCompanyName; ?>>
                                    </div>
                                    <input class="form-control searchtype-btn bg-white border border-start-0 rounded-start rounded-pill" type="button" value="Suche nach Betrieben" onclick="changeSearchtype('companyName')">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </header>
            <main class="container-fluid p-3">
                <table class="table table-bordered table-striped table-hover table-sortable">
                    <thead>
                        <tr>
                            <th scope="col">Beruf</th>
                            <th scope="col">Betrieb</th>
                            <th scope="col">Ort</th>
                            <th scope="col">Ø-Bewertung Schüler</th>
                            <th scope="col">Bewertung Lehrkraft</th>
                            <td scope="col"></td>
                        </tr>
                    </thead>
                    <tbody id="output">
                    </tbody>
                </table>
                <script src="js/index.js"></script>
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

                    $(document).ready(function() {
                        $(document.body).on("click", "tr[data-href]", function() {
                            window.location.href = this.dataset.href;
                        });
                    });

                    function removeSort() {
                        document.querySelectorAll(`th`).forEach((th) => th.classList.remove("th-sort-asc", "th-sort-desc"));
                    }

                    var searchtype = "jobName";

                    if (document.getElementById("jobName").checked == true) {
                        searchtype = "jobName";
                    } else {
                        searchtype = "companyName";
                    }

                    $(document).ready(function() {
                        $.ajax({
                            type: 'POST',
                            url: 'search.php',
                            data: {
                                search: $("#search").val(),
                                type: searchtype,
                            },
                            success: function(data) {
                                $("#output").html(data);
                                removeSort();
                            }
                        });
                    });

                    function changeSearchtype(id) {
                        if (id == "jobName") {
                            searchtype = "jobName";
                            document.getElementById("jobName").checked = true;
                            document.getElementById("companyName").checked = false;
                        } else {
                            searchtype = "companyName";
                            document.getElementById("jobName").checked = false;
                            document.getElementById("companyName").checked = true;
                        }
                        $(document).ready(function() {
                            $.ajax({
                                type: 'POST',
                                url: 'search.php',
                                data: {
                                    search: $("#search").val(),
                                    type: searchtype,
                                },
                                success: function(data) {
                                    $("#output").html(data);
                                    removeSort();
                                }
                            });
                        });
                    }

                    $(document).ready(function() {
                        $("#search").keyup(function() {
                            $.ajax({
                                type: 'POST',
                                url: 'search.php',
                                data: {
                                    search: $("#search").val(),
                                    type: searchtype,
                                },
                                success: function(data) {
                                    $("#output").html(data);
                                    removeSort();
                                }
                            });
                        });
                    });
                </script>
            </main>
        </div>
        <footer class="container-fluid bg-light pt-3">
            <div class="grid">
                <div class="row text-center fs-6">
                    <div class="col">
                        <p class="fw-bold">Kontakt</p>
                        <hr>
                        <p>Schreib uns gerne eine E-Mail unter: <br>
                            <a href="mailto:praktikumsdb@hola-gymnasium.de">praktikumsdb@hola-gymnasium.de</a>
                        </p>
                    </div>
                    <div class="col">
                        <p class="fw-bold">Ersteller</p>
                        <hr>
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
                        <p class="fw-bold">Lehrer-Login</p>
                        <hr>
                        <a href="login.php">Hier geht's zum Lehrer-Login!</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>