<?php 
session_start();


?>

<?php if(isset($_SESSION['email'])): ?>
    <?php
require('../db/fonctions_db.php');

$data = getCommandes($_SESSION['email']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/global.css">
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/commandes.css">
    <title>Commandes</title>
</head>
<body>
    <?php require('../public/header.php'); ?>
    <h1>Commandes</h1>

    <div id="mainDivs">
        <div id="commandes">
            <select id="commandeCombo">
                <?php
                    foreach($data as $cmd){
                        echo "<option id=".$cmd['id']." class='commandes'>".$cmd['id']."</option>";
                    }
                ?>
            </select>
        </div>
        <div id="commandeInfo">

            <table id="t1">
                <thead>
                    <tr id="t1Content">
                        <th>Nombre produits</th>
                        <th>Nombre articles</th>
                        <th>Prix total</th>
                        <th>Date commande</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody id="tBodyCommande">
                    
                </tbody>
            </table>
            
            <table id="t2">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Nombre articles</th>
                        <th>Prix total articles</th>
                        <th>Commande</th>
                    </tr>
                </thead>
                <tbody id="tBody">
                    
                </tbody>
            </table>
            <div><h3 id="commandePrixFinal"></h3></div>
        </div>
    </div>


    <?php require('../public/session_bar.php'); ?>
    <script src="http://192.168.1.4/bio_market/scripts/commandes.js"></script>
</body>
</html>

<?php else: ?>
    <?php
        header('Location: login.php');
    ?>
<?php endif; ?>


