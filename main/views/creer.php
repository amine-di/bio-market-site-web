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
    <title>Creer Compte</title>
    <link rel="stylesheet" href="http://BioMarket.com/css/bootstrap.css">
    <script src="http://BioMarket.com/scripts/jquery.js"></script>
    <script src="http://BioMarket.com/scripts/bootstrap.js"></script>

    <link rel="stylesheet" href="http://BioMarket.com/css/global.css">
    <link rel="stylesheet" href="http://BioMarket.com/css/creer.css">
    <link href="http://BioMarket.com/css/mdnbootstrap.css" rel="stylesheet">
</head>

<body>

    <?php require('../public/header.php'); ?>

    <!-- <form action="/bio_market/App/creer_compte.php" method="post" class='createForm'>
        <input type="text" name="nom" placeholder="Nom..." autocomplete="off" required>
        <input type="text" name="prenom" placeholder="Prenom..." autocomplete="off" required>
        <input type="text" name="age" placeholder="Age..." autocomplete="off" required>
        <input type="email" name="email" placeholder="Email..." autocomplete="off" required>
        <input type="password" name="pwd" placeholder="Mot de Passe..." autocomplete="off" required>
        <input type="text" name="telephone" maxlength="10" placeholder="Telephone..." autocomplete="off" required>
        <input type="text" name="pays" placeholder="Pays..." autocomplete="off" required>
        <input type="text" name="ville" placeholder="Ville..." autocomplete="off" required>
        <input type="text" name="adresse" placeholder="Adresse..." autocomplete="off" required>
        <input type="submit" name="creerBtn" value="Creer Compte" class="btn btn-success">
    </form> -->
    <div class="container formContainer unique-color-dark">
        <!-- Default form register -->
        <form class="text-center p-5" action="/App/creer_compte.php" method="post">

            <p class="h4 mb-4">Nouveau compte</p>

            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" id="defaultRegisterFormFirstName" class="form-control" name="nom" placeholder="Nom...">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="defaultRegisterFormLastName" class="form-control" name="prenom" placeholder="Prenom...">
                </div>
                <!-- Age -->
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="defaultRegisterFormLastName" class="form-control" name="age" placeholder="Age...">
                </div>
            </div>

            <!-- E-mail -->
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" name="email" placeholder="Email...">

            <!-- Password -->
            <input type="password" id="defaultRegisterFormPassword" class="form-control" name="pwd" placeholder="Mot de Passe..." aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                Au mois 8 caractères
            </small>
            <!-- 
        <input type="text" name="telephone" maxlength="10" placeholder="Telephone..." autocomplete="off" required>
        <input type="text" name="pays" placeholder="Pays..." autocomplete="off" required>
        <input type="text" name="ville" placeholder="Ville..." autocomplete="off" required>
        <input type="text" name="adresse" placeholder="Adresse..." autocomplete="off" required> -->

            <div class="form-row mb-4">
                <div class="col">
                    <!-- Telephone -->
                    <input type="text" id="defaultRegisterFormFirstName" class="form-control" name="telephone" maxlength="10" placeholder="Telephone...">
                </div>
                <div class="col">
                    <!-- Pays -->
                    <input type="text" id="defaultRegisterFormLastName" class="form-control" name="pays" placeholder="Pays...">
                </div>
                <div class="col">
                    <!-- Ville -->
                    <input type="text" id="defaultRegisterFormLastName" class="form-control" name="ville" placeholder="Ville...">
                </div>
                <div class="col">
                    <!-- Adresse -->
                    <input type="text" id="defaultRegisterFormLastName" class="form-control" name="adresse" placeholder="Adresse...">
                </div>
            </div>

            <!-- Sign up button -->
            <button class=" btn btn-info my-4 btn-block" type="submit" name="creerBtn">Valider</button>

            <hr>

            <!-- Terms of service -->
            <p>"En cliquant sur
                <em>Valider</em> vous acceptez nos conditions d'utilisation"
                <a href="" target="_blank">Conditions d'utilisation</a>

        </form>
        <!-- Default form register -->
    </div>

    <?php require('../public/session_bar.php'); ?>
    <?php require('../public/footer.php'); ?>
</body>

</html>