<?php
session_start();
require('../db/fonctions_db.php');

if(isset($_SESSION['email']) && isset($_POST['idCommande'])){
    $commande = getCommande($_POST['idCommande']);
    $data = getCommandeData($_POST['idCommande']);
    echo json_encode([$commande,$data]);
    
}