<?php
session_start();
require('../../db/fonctions_db.php');

if (isset($_SESSION['panier'])) {
    if (isset($_POST['id'])) {
        $id = intval($_POST['id']);
        $elmKey = null;
        $trigger = false;
        foreach ($_SESSION['panier'] as $key => $produit) {
            if ($produit['id_produit'] === $id) {
                if ($_SESSION['panier'][$key]['num'] === 1) {
                    unset($_SESSION['panier'][$key]);
                    $_SESSION['panierNum'] = count($_SESSION['panier']);
                } else {
                    $_SESSION['panier'][$key]['num'] = $_SESSION['panier'][$key]['num'] - 1;
                    $elmKey = $key;
                    $trigger = true;
                }
            }
        }
        $container = 0;
        foreach ($_SESSION['panier'] as $key => $prod) {
            $container += $_SESSION['panier'][$key]['num'] * prixProduit($_SESSION['panier'][$key]['id_produit']);
        }
        $_SESSION['prixTotal'] = $container;
        if ($trigger === true) {
            echo json_encode([$_SESSION['prixTotal'], $_SESSION['panier'][$elmKey]['num']]);
        } else {
            echo json_encode([$_SESSION['prixTotal'], 0, $_SESSION['panierNum']]);
        }
    }
} else {
    header('Location: /bio_market/index.php');
}
