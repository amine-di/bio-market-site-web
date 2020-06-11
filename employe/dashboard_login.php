<?php
session_start();

?>
<?php if (isset($_SESSION['cin'])) : ?>
    <?php header('Location: http://192.168.1.4/bio_market/employe/dashboard_employe.php'); ?>

<?php else : ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion employe</title>
        <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/bootstrap.css">
        <script src="http://192.168.1.4/bio_market/scripts/jquery.js"></script>
        <script src="http://192.168.1.4/bio_market/scripts/bootstrap.js"></script>
        <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/global.css">
        <link href="http://192.168.1.4/bio_market/css/mdnbootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/creer.css">
    </head>

    <body>
        <?php require('public/header.php'); ?>


        <div class="container formContainer unique-color-dark w-50">

            <form action="/bio_market/employe/app/connexion.php" method="post" class='loginForm text-center p-5'>
                <p class="h4 mb-4">Connexion employe</p>
                <input type="text" id="defaultRegisterFormEmail" class="form-control mb-4" name="cin" placeholder="CIN...">
                <input type="password" id="defaultRegisterFormPassword" class="form-control" name="code" placeholder="Code..." aria-describedby="defaultRegisterFormPasswordHelpBlock">

                <!-- <input type="email" name="email" placeholder="Email..." autocomplete="off" required>
            <input type="password" name="pwd" placeholder="Mot de Passe..." autocomplete="off" required> -->

                <button class=" btn btn-info my-4 btn-block" type="submit" name="loginBtnEmp">Connexion</button>
            </form>
        </div>

        <?php require('../public/session_bar.php'); ?>
        <?php require('../public/footer.php'); ?>
    </body>

    </html>

<?php endif; ?>