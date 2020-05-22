<?php
session_start();
header('Access-Control-Allow-Origin: *');
require('../db/fonctions_db.php');

if(isset($_POST['id'])){

    $produit = intval($_POST['id']);
    $exists = false;

    if(isset($_SESSION['panier'])){
        
        foreach($_SESSION['panier'] as $key=>$prod){
            if($prod['id_produit'] === $produit){
                $_SESSION['panier'][$key]['num'] = $_SESSION['panier'][$key]['num'] + 1; 
                $exists = true;
            }
        }
        if($exists === false){
            array_push($_SESSION['panier'],['id_produit'=>$produit,'num'=>1]);
            $exists = true;
            $_SESSION['panierNum'] = count($_SESSION['panier']);
            
            $container = 0;
            foreach($_SESSION['panier'] as $key=>$prod){
                $container += $_SESSION['panier'][$key]['num'] * prixProduit($_SESSION['panier'][$key]['id_produit']);
            }
            $_SESSION['prixTotal'] = $container;
            echo json_encode([$_SESSION['panierNum'],$_SESSION['prixTotal']]);
        }else{
            $_SESSION['panierNum'] = count($_SESSION['panier']);

            $container = 0;
            foreach($_SESSION['panier'] as $key=>$prod){
                $container += $_SESSION['panier'][$key]['num'] * prixProduit($_SESSION['panier'][$key]['id_produit']);
            }
            $_SESSION['prixTotal'] = $container;
            echo json_encode([$_SESSION['panierNum'],$_SESSION['prixTotal']]);
        }
    }else{
        $_SESSION['panier'] = [];
        $_SESSION['panierNum'] = 1;

        $_SESSION['prixTotal'] = prixProduit($produit);
        
        array_push($_SESSION['panier'],['id_produit'=>$produit,'num'=>1]);

        echo json_encode([$_SESSION['panierNum'],$_SESSION['prixTotal']]);
    }

}