<?php
session_start();
require('../db/fonctions_db.php');

if (isset($_SESSION['panier']) && isset($_SESSION['panierNum']) && isset($_SESSION['prixTotal'])) {
    do {
        $rndId = rand();
        $result = checkCommandeId($rndId);
        echo "1<br>";
    } while ($result === 1);

    $numArticles = 0;
    foreach ($_SESSION['panier'] as $prod) {
        $numArticles += $prod['num'];
    }

    $clientId = clientIdParEmail($_SESSION['email']);
    commander($rndId, $clientId['id'], $_SESSION['panierNum'], $numArticles, $_SESSION['prixTotal'], 'non_traite');
    require('../fonctions_log.php');
    log_requete('Commande',  __FILE__, $_SERVER['REQUEST_URI']);

    foreach ($_SESSION['panier'] as $prod) {
        produitCommande($prod['id_produit'], $prod['num'], ($prod['num'] * prixProduit($prod['id_produit'])), $rndId);
    }

    unset($_SESSION['panier']);
    unset($_SESSION['panierNum']);
    unset($_SESSION['prixTotal']);
}
