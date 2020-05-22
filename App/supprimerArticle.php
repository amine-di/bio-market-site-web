<?php
session_start();
require('../db/fonctions_db.php');

if(isset($_SESSION['panier'])){
    if(isset($_POST['id'])){
        $id = intval($_POST['id']);

        foreach($_SESSION['panier'] as $key=>$produit){
            
            if($_SESSION['panier'][$key]['id_produit'] === $id){
                unset($_SESSION['panier'][$key]);
                $_SESSION['panierNum'] = count($_SESSION['panier']);
            }
            
        }
        $container = 0;
        foreach($_SESSION['panier'] as $key=>$prod){
            $container += $_SESSION['panier'][$key]['num'] * prixProduit($_SESSION['panier'][$key]['id_produit']);
        }
        $_SESSION['prixTotal'] = $container;

        echo json_encode([$_SESSION['prixTotal'],$_SESSION['panierNum']]);

    }
}else{
    header('Location: /bio_market/index.php');
}