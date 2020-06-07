<?php
session_start();
require('../fonctions_log.php');
log_requete('Consultation',  __FILE__, $_SERVER['REQUEST_URI']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/bootstrap.css">
    <script src="http://192.168.1.4/bio_market/scripts/jquery.js"></script>
    <script src="http://192.168.1.4/bio_market/scripts/bootstrap.js"></script>
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/global.css">
    <link href="http://192.168.1.4/bio_market/css/mdnbootstrap.css" rel="stylesheet">
    <link href="http://192.168.1.4/bio_market/css/creer.css" rel="stylesheet">
</head>

<body>
    <?php require('../public/header.php'); ?>
    <div class="container formContainer unique-color-dark">
        <form action="/bio_market/App/devenir_livreur.php" method="post" class="text-center p-5" enctype="multipart/form-data">
            <p class="h4 mb-4">Livreur</p>
            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" id="defaultRegisterFormFirstName" class="form-control" name="nom" placeholder="Nom...">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="defaultRegisterFormLastName" class="form-control" name="prenom" placeholder="Prenom...">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="defaultRegisterFormLastName" class="form-control" name="age" placeholder="Age...">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input id="defaultRegisterFormLastName" class="form-control" type="file" name="profileImg">
                </div>
            </div>
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" name="email" placeholder="Email...">

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
                <!-- <input type="text" name="nom" placeholder="Nom..." autocomplete="off" required>
            <input type="text" name="prenom" placeholder="Prenom..." autocomplete="off" required>
            <input type="text" name="age" placeholder="Age..." autocomplete="off" required>
            <input type="email" name="email" placeholder="Email..." autocomplete="off" required>
            <input type="text" name="telephone" maxlength="10" placeholder="Telephone..." autocomplete="off" required>
            <input type="text" name="pays" placeholder="Pays..." autocomplete="off" required>
            <input type="text" name="ville" placeholder="Ville..." autocomplete="off" required>
            <input type="text" name="adresse" placeholder="Adresse..." autocomplete="off" required>
            <input type="file" name="profileImg" required>
            <input type="submit" name="creerBtn" value="Creer Compte"> -->
        </form>
    </div>
    <?php require('../public/footer.php'); ?>
</body>

</html>