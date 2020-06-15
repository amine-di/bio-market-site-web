<?php
session_start();
require('../../fonctions_log.php');
log_requete('Consultation',  __FILE__);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Livreur</title>
    <link rel="stylesheet" href="http://BioMarket.com/css/bootstrap.css">
    <script src="http://BioMarket.com/scripts/jquery.js"></script>
    <script src="http://BioMarket.com/scripts/bootstrap.js"></script>
    <link rel="stylesheet" href="http://BioMarket.com/css/global.css">
    <link href="http://BioMarket.com/css/mdnbootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="http://BioMarket.com/css/creer.css">
</head>

<body>
    <?php require('../public/header.php'); ?>


    <div class="container formContainer unique-color-dark w-50">

        <form action="" method="post" class='loginForm text-center p-5'>
            <p class="h4 mb-4">Connexion Livreur</p>
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" name="email" placeholder="Email...">
            <input type="password" id="defaultRegisterFormPassword" class="form-control" name="pwd" placeholder="Mot de Passe..." aria-describedby="defaultRegisterFormPasswordHelpBlock">

            <!-- <input type="email" name="email" placeholder="Email..." autocomplete="off" required>
            <input type="password" name="pwd" placeholder="Mot de Passe..." autocomplete="off" required> -->

            <button class=" btn btn-info my-4 btn-block" type="submit" name="loginBtn">Connexion</button>
        </form>
    </div>

    <?php require('../public/session_bar.php'); ?>
    <?php require('../public/footer.php'); ?>
</body>

</html>