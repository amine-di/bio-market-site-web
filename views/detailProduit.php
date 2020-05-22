<?php
session_start();
require('../db/fonctions_db.php');
$id = $_GET['prod'];
$produit = getProduitParId($id);
$catgrName = "Categorie ".$produit['categorie'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/global.css">
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/detailProduit.css">
</head>
<body>
<?php require('../public/header.php'); ?>
    <div id="categorieNav">
            <h3><?php if(isset($catgrName)){echo $catgrName;}else{echo 'Tous les produits';} ?></h3>
        </div>
    <div id="produit">
        <?php
            echo "<img src='data:image/png;base64,".base64_encode($produit['image'])."' />";
            echo "<div id='prodInfo'>";
                echo "<p class='prodName'>".$produit['nom']."</p>";
                echo "<p class='prodPrice'>".$produit['prix_unitaire']." MAD</p>";
                echo "<p class='prodDesc'>".$produit['description_prod']."</p>";

                if(isset($_SESSION['email'])){
                    echo "<div id='btns'>";
                    echo "<button class='addBtn' id='".$produit['id']."'>Ajouter</button>";
                    echo "</div>";
                }
            echo "</div>";


        ?>
    </div>

    <?php require('../public/panier_session.php'); ?>
    <?php require('../public/session_bar.php'); ?>
    <script src="http://192.168.1.4/bio_market/scripts/detailProduit.js"></script>
</body>
</html>