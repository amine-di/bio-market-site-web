<?php
session_start();
require('../fonctions_log.php');
log_requete('Consultation',  __FILE__);

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
    <link href="http://192.168.1.4/bio_market/css/erreur.css" rel="stylesheet">
</head>

<body>
    <?php require('../public/header.php'); ?>

    <div class="container">
        <div class="card">
            <h1 class="card-header">
                Erreur
            </h1>
            <div class="card-body">
                <h1><?php echo $_GET['errorMsg']; ?></h1>
            </div>
        </div>
    </div>


    <?php require('../public/footer.php'); ?>
</body>

</html>