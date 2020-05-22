<?php
session_start();
require('../db/fonctions_db.php');

if(isset($_SESSION['panier'])){
    $panier = $_SESSION['panier'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/global.css">
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/panier.css">
</head>
<body>
    <?php require('../public/header.php'); ?>
        <div id='cart'>
            <?php 
                if(isset($_SESSION['email'])){
                    if(isset($panier) && count($panier) !== 0){
                        
                        foreach($panier as $produit){
                            $data = produitParId($produit['id_produit']);
                            echo "<div class='prodBox'>";
                                echo "<img src='data:image/png;base64,".base64_encode($data['image'])."' />";

                                echo "<div class='infoBox'>";
                                    echo "<p class='prodName'>".$data['nom']."</p>";
                                    echo "<p><span class='prodLabelValue'>".$data['categorie']."</span></p>";
                                    echo "<p class='prodPrice'>".$data['prix_unitaire']." DH</p>";
                                    echo "<p>".$data['description_prod']."</p>";
                                    echo "<p><span class='prodName'>".$produit['num']."</span></p>";
                                echo "</div>";
                                echo "<div class='crudBtns'>";
                                    echo "<button class='addBtns crudBtn' id='".$produit['id_produit']."'>Ajouter</button>";
                                    echo "<button class='subBtns crudBtn' id='".$produit['id_produit']."'>Enlever</button>";
                                    echo "<button class='delBtns crudBtn' id='".$produit['id_produit']."'>Supprimer</button>";
                                echo "</div>";
                            echo "</div>";
                        }
                    }
                    else{
                        echo "<div class='panier-error-msg'>";
                            echo "<h1>Panier vide</h1>";
                            echo "<a href='produits.php'>Remplissez votre panier ici</a>";
                        echo "</div>";
                    }
                }else{
                    echo "<div class='panier-error-msg'>";
                        echo "<h1>Non connecté</h1>";
                        echo "<a href='login.php'>Connecter vous ici</a>";
                    echo "</div>";
                }
            ?>
        </div>
        <?php if(isset($panier) && count($panier) !== 0): ?>
            <a href="finaliserCommande.php"><button id='finaliserCommande'>Finaliser La Commande</button></a>
        <?php endif; ?>


    <?php require('../public/session_bar.php'); ?>
    <?php require('../public/panier_session.php'); ?>
    <script src="http://192.168.1.4/bio_market/scripts/panier.js"></script>
</body>
</html>
