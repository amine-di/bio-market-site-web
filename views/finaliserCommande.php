<?php
session_start();
require('../fonctions_log.php');
log_requete('Consultation', __FILE__);

?>

<?php if (isset($_SESSION['panier'])) : ?>
    <?php
    require('../db/fonctions_db.php');

    $numArticles = 0;
    foreach ($_SESSION['panier'] as $produit) {
        $numArticles += $produit['num'];
    }
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
        <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/commande.css">
    </head>

    <body>
        <?php require('../public/header.php'); ?>

        <main class="container">
            <div id="info_produit_commande" class="container">
                <?php
                foreach ($_SESSION['panier'] as $prod) {
                    $produit = produitParIdNoDesc($prod['id_produit']);
                    $totalArticle = ($produit['prix_unitaire'] * $prod['num']);
                    echo "<div class='produit_commande'>";
                    echo "<img src='data:image/png;base64," . base64_encode($produit['image']) . "'/>";
                    echo "<div class='info_produit'>";
                    echo "<p class='nom'>" . $produit['nom'] . "</p>";
                    echo "<p class='cat'>" . $produit['categorie'] . "</p>";
                    echo "<p class='num'>" . $prod['num'] . " articles</p>";
                    echo "<p class='prix'>" . $produit['prix_unitaire'] . " MAD</p>";
                    echo "<p class='prix'>" . $totalArticle . " MAD</p>";
                    echo "</div>";
                    echo "</div>";
                }

                ?>
            </div>
            <div id="info_client_commande">
                <div id="info_client_data">
                    <?php
                    $client = clientParEmail($_SESSION['email']);
                    echo "<p><span class='info_label'>Nom</span> <span class='info_data'>" . $client['nom'] . "</span></p>";
                    echo "<p><span class='info_label'>Prenom</span> <span class='info_data'>" . $client['prenom'] . "</span></p>";
                    echo "<p><span class='info_label'>Téléphone</span> <span class='info_data'>" . $client['telephone'] . "</span></p>";
                    echo "<p><span class='info_label'>Email</span> <span class='info_data'>" . $_SESSION['email'] . "</span></p>";
                    echo "<p><span class='info_label'>Pays</span> <span class='info_data'>" . $client['pays'] . "</span></p>";
                    echo "<p><span class='info_label'>Ville</span> <span class='info_data'>" . $client['ville'] . "</span></p>";
                    echo "<p><span class='info_label'>Adresse</span> <span class='info_data'>" . $client['adresse'] . "</span></p>";
                    ?>
                </div>
            </div>
        </main>
        <div id="commanderBox">
            <button id="commanderBtn">Commander</button>
            <a href="panier.php" class="btn btn-primary return">Retourner au panier...</a>
        </div>
        <script src="http://192.168.1.4/bio_market/scripts/commande.js"></script>
        <?php require('../public/session_bar.php'); ?>
        <?php require('../public/footer.php'); ?>
    </body>

    </html>
<?php else : ?>

    <?php header('Location: ../index.php'); ?>

<?php endif ?>