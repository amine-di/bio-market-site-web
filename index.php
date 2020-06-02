<?php
session_start();
require('db/fonctions_db.php');
$categories = getAllCategories();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bio Market</title>
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/global.css">
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/home.css">
</head>

<body>
    <?php require('public/header.php'); ?>
    <div id="backImg"></div>
    <h2 id="catPageTitle">Nos categories</h2>
    <div id="categorieListe">
        <?php
        foreach ($categories as $categorie) {
            echo "<div class='cat'>";
            echo "<h2 class='catTitle'>" . $categorie['nom'] . "</h2>";
            $img = "data:image/png;base64," . base64_encode($categorie['cat_img']) . "";
            echo "<div style='background-image:url(" . $img . ");' class='catImg' id=" . $categorie['id'] . "></div>";
            echo "</div>";
        }
        ?>
        <!--
        <div class="cat">
            <h2>Legume</h2>
            <div class="catImg" style="background-image: url('imagesCategories/legume.png');"></div>
        </div>
        -->
    </div>
    <?php require('public/session_bar.php'); ?>
    <script src="http://192.168.1.4/bio_market/scripts/index.js"></script>
</body>

</html>