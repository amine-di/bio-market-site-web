<?php
session_start();
require('../fonctions_log.php');
log_requete('Consultation',  __FILE__);
require('../db/fonctions_db.php');

$categories = getAllCategories();


if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
    if ($_GET['categorie'] === "Tout") {
        $produits = tousLesProduits();
    } else {
        $produits = produitParCategorie($_GET['categorie']);
        if ($produits === []) {
            $catgrName = "Désolé aucun produit trouvé";
        } else {
            $cat = $produits[0]['categorie'];
            $catgrName = "Categorie " . $cat;
        }
    }
} else {
    $produits = tousLesProduits();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/produits.css">
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/bootstrap.css">
    <script src="http://192.168.1.4/bio_market/scripts/jquery.js"></script>
    <script src="http://192.168.1.4/bio_market/scripts/bootstrap.js"></script>
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/global.css">
    <link href="http://192.168.1.4/bio_market/css/mdnbootstrap.css" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(to bottom, white, white);
        }
    </style>
</head>

<body>
    <?php require('../public/header.php'); ?>
    <div id="categorieNav">
        <h3><?php if (isset($catgrName)) {
                echo $catgrName;
            } else {
                echo 'Tous les produits';
            } ?></h3>
        <select id="categorieSelect" class="unique-color-dark">
            <option>Categorie...</option>
            <option value="Tout">Tout</option>
            <?php
            foreach ($categories as $categorie) {
                echo "<option value=" . $categorie['id'] . ">" . $categorie['nom'] . "</option>";
            }
            ?>
        </select>
    </div>
    <div id="produits">
        <?php
        foreach ($produits as $produit) {
            echo "<div class='produit'>";
            echo "<img src='data:image/png;base64," . base64_encode($produit['image']) . "' class='produitImg' id='" . $produit['id'] . "'>";
            echo "<p class='nom'>" . $produit['nom'] . "</p>";
            echo "<p class='prix'>" . $produit['prix_unitaire'] . " MAD</p>";
            if (isset($_SESSION['email'])) {
                echo "<button class='btn btn-primary' onclick=ajouterPanier(" . $produit['id'] . ")>Ajouter</button>";
            }
            echo "</div>";
        }
        ?>
    </div>

    <?php require('../public/panier_session.php'); ?>
    <?php require('../public/session_bar.php'); ?>
    <?php require('../public/footer.php'); ?>
    <script src="http://192.168.1.4/bio_market/scripts/produits.js"></script>
</body>

</html>