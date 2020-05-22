<?php
session_start();
require('../db/fonctions_db.php');

if(isset($_SESSION['panier'])){
    if(isset($_POST['id'])){
        $id = intval($_POST['id']);
        $keyNum = 0;
        foreach($_SESSION['panier'] as $key=>$produit){
            if($produit['id_produit'] === $id){
                $_SESSION['panier'][$key]['num'] = $_SESSION['panier'][$key]['num'] + 1;

                $keyNum =  $key;
            }
        }
        $container = 0;
        foreach($_SESSION['panier'] as $key=>$prod){
            $container += $_SESSION['panier'][$key]['num'] * prixProduit($_SESSION['panier'][$key]['id_produit']);
        }
        $_SESSION['prixTotal'] = $container;
        
        echo json_encode([$_SESSION['panier'][$keyNum]['num'],$_SESSION['prixTotal'],$_SESSION['panierNum']]);
    }
}else{
    header('Location: /bio_market/index.php');
}