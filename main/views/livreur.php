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
    <title>Document</title>
    <link rel="stylesheet" href="http://BioMarket.com/css/bootstrap.css">
    <script src="http://BioMarket.com/scripts/jquery.js"></script>
    <script src="http://BioMarket.com/scripts/bootstrap.js"></script>
    <link rel="stylesheet" href="http://BioMarket.com/css/global.css">
    <link href="http://BioMarket.com/css/mdnbootstrap.css" rel="stylesheet">

    <style>
        body {
            background-image: linear-gradient(to bottom, white, white);
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
        }
    </style>
</head>

<body>
    <?php require("../public/header.php"); ?>
    <div class="container">
        <a href="loginLivreur.php" class="btn btn-primary">Login</a>
        <a href="demandeLivreur.php" class="btn btn-success">Devenez livreur...</a>
    </div>
    <?php require("../public/footer.php"); ?>
</body>

</html>