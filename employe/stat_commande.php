<?php
session_start();
require('app/db/db_fonctions.php');

$commandeTotal = getCommandeStat();
$commandeParAn = statCommandeAnnee();
$commandeParMois = statCommandeMois();

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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
        body {
            background-image: none;
        }

        table {
            width: 80% !important;
            margin: 5% auto 0 auto;
            text-align: center;
        }

        p {
            font-style: italic;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php require('public/header.php'); ?>

    <div class="container card my-5">

        <table class="table table-hover table-light table-striped card-body">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre de commandes</th>
                    <th>Chiffre d'affaire</th>
                    <th>Nombre d'articles vendus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $commandeTotal['t.c'] ?></td>
                    <td><?= $commandeTotal['c.a'] ?></td>
                    <td><?= $commandeTotal['t.a'] ?></td>
                </tr>
            </tbody>
        </table>
        <p class="card-title">Statistiques générales</p>
    </div>

    <div class="container card my-5">

        <table class="table table-hover table-light table-striped card-body">
            <thead class="thead-dark">
                <tr>
                    <th>Année</th>
                    <th>Nombre de commandes</th>
                    <th>Chiffre d'affaire</th>
                    <th>Nombre d'articles vendus</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandeParAn as $commande) : ?>
                    <tr>
                        <td><?= $commande['a'] ?></td>
                        <td><?= $commande['t.c'] ?></td>
                        <td><?= $commande['c.a'] ?></td>
                        <td><?= $commande['t.a'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="card-title">Statistiques par années</p>
    </div>

    <div class="container card my-5">

        <table class="table table-hover table-light table-striped card-body">
            <thead class="thead-dark">
                <tr>
                    <th>Mois</th>
                    <th>Nombre de commandes</th>
                    <th>Chiffre d'affaire</th>
                    <th>Nombre d'articles vendus</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandeParMois as $commande) : ?>
                    <tr>
                        <td><?= $commande['m'] ?></td>
                        <td><?= $commande['t.c'] ?></td>
                        <td><?= $commande['c.a'] ?></td>
                        <td><?= $commande['t.a'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="card-title">Statistiques par mois</p>
    </div>


    <script src="public/js/stats.js"></script>
</body>

</html>