<?php
session_start();

if (!isset($_SESSION['username'])) {
    $isconnected = 0;
    $username = "";
} else {
    $isconnected = 1;
    $username = $_SESSION['username'];
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: registration/login.php");
}

require("bdd/dbSet.php");

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>SmartCityzen</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
    <div id="root">

        <!-- Header -->
        <header id="header">
            <a class="logo logo_nm" href="index.php">
                <img src="images/SmartCitizen_blanc.png" class="logo_img" />
            </a>
            <nav>
                <a href="#menu"></a>
            </nav>
        </header>

        <!-- Nav -->
        <nav id="menu">
            <ul class="links">
                <li><a href="registration/index.php"> Mon profil </a></li>
                <li><a href="PrendreUnePhoto.php">Prendre une photo </a></li>
                <li><a href="post.php">Publier une proposition </a></li>
                <li><a href="publicationGeneral.php"> Propositions en cours </a></li>
                <li><a href="propositionsValid.php"> Propositions validées </a></li>
                <li><a href="#"> SmartCitizen, c'est quoi ? </a></li>
                <li><a href="index.php?logout='1'">Déconnexion </a></li>
            </ul>
        </nav>

        <!-- Highlights -->
        <section class="mainpage">
            <div>
                <?php

                if ($isconnected == 1) { ?>

                <?php } else { ?>
                    <div class="pasidentif">
                        <div class="title_pasidentif">
                            <h2>Connectez-vous pour utiliser l'application </h2>
                        </div>
                        <div class="buttons_pasident">
                            <a href="registration/" class="link_pasident"> Connexion </a>
                            <a href="registration/register.php" class="link_pasident"> Inscription </a>
                        </div>
                    </div>

                <?php } ?>


                <?php if ($isconnected == 1) { ?>
                    <div class="buttons_mainpage">
                        <a href="PrendreUnePhoto.php" class="button_CTA">Prendre une photo </a>
                        <a href="post.php" class="button_CTA"> Publier une proposition </a>
                        <a href="publicationGeneral.php" class="button_CTA"> Propositions en cours </a>
                        <a href="propositionsValid.php" class="button_CTA"> Propositions validées </a>
                    </div>
                <?php } ?>
            </div>
        </section>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>
            $('.repondre').click(function() {
                var id = $(this).attr('data-rel');
                if ($('#comform-div-' + id).hasClass('hidden')) {
                    $('.repondre').removeClass('button-blue');
                    $(this).addClass('button-blue').css('float', 'left');
                    $('.comform-div').addClass('hidden');
                    $('#comform-div-' + id).find('p').show();
                    $('#comform-div-' + id).removeClass('hidden');
                    return false;
                } else {
                    $('#comform-' + id).submit();
                    return false;
                }
            });
        </script>
    </div>
</body>

</html>