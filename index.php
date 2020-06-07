<?php
session_start();
require('fonctions_log.php');
log_requete('Consultation',  __FILE__, $_SERVER['REQUEST_URI']);
require('db/fonctions_db.php');
$categories = getAllCategories();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bio Market</title>
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/bootstrap.css">
    <script src="http://192.168.1.4/bio_market/scripts/jquery.js"></script>
    <script src="http://192.168.1.4/bio_market/scripts/bootstrap.js"></script>
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/home.css">
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/global.css">
    <link href="http://192.168.1.4/bio_market/css/mdnbootstrap.css" rel="stylesheet">
</head>

<body>
    <?php require('public/header.php'); ?>
    <div id="backImg">
        <div id="backData">
            <h1>Bio Market</h1>
            <p><strong><i>Le magasin naturel</i></strong></p>
            <a href="http://192.168.1.4/bio_market/views/creer.php" class="btn btn-success hover-opacity">Compte</a>
            <a href="http://192.168.1.4/bio_market/views/login.php" class="btn btn-primary hover-opacity">Connexion</a>
        </div>
    </div>
    <div class="container">
        <div class="about-header">
            <h2 class="cat-title">Nos Catégories</h2>
            <span class="line"></span>
        </div>
        <div class="container">
            <div class="flex-container">
                <?php
                foreach ($categories as $categorie) {
                    echo "<div class='flex-item'>";
                    $img = "data:image/png;base64," . base64_encode($categorie['cat_img']) . "";
                    echo "<figure>";
                    echo "<img src='" . $img . "' id='" . $categorie['id'] . "' class='catImg'>";
                    echo "<figcaption>" . $categorie['nom'] . "</figcaption>";
                    echo "</figure>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
    <?php require('public/session_bar.php'); ?>
    <?php require('public/footer.php'); ?>
    <script src="http://192.168.1.4/bio_market/scripts/index.js"></script>
</body>

</html>