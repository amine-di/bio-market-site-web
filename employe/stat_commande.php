<?php
session_start();
require('app/db/db_fonctions.php');
?>

<?php if (isset($_SESSION['cin'])) : ?>
    <?php
    $commandeTotal = getCommandeStat();
    $commandeParAn = statCommandeAnnee();
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

            small {
                font-style: italic;
                font-weight: bold;
                text-align: center;
                margin: 4% 0;
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
                        <th>Nombre de produits vendus</th>
                        <th>Nombre d'articles vendus</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $commandeTotal['t.c'] ?></td>
                        <td><?= $commandeTotal['c.a'] ?> DH</td>
                        <td><?= $commandeTotal['t.p'] ?></td>
                        <td><?= $commandeTotal['t.a'] ?></td>
                    </tr>
                </tbody>
            </table>
            <small class="card-title">Statistiques générales</small>
        </div>

        <div class="container card my-5">

            <table class="table table-hover table-light table-striped card-body">
                <thead class="thead-dark">
                    <tr>
                        <th>Année</th>
                        <th>Nombre de commandes</th>
                        <th>Chiffre d'affaire</th>
                        <th>Nombre de produits vendus</th>
                        <th>Nombre d'articles vendus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($commandeParAn as $commande) : ?>
                        <tr>
                            <td><?= $commande['a'] ?></td>
                            <td><?= $commande['t.c'] ?></td>
                            <td><?= $commande['c.a'] ?> DH</td>
                            <td><?= $commande['t.p'] ?></td>
                            <td><?= $commande['t.a'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <small class="card-title">Statistiques par années</small>
            <?php foreach ($commandeParAn as $commande) : ?>
                <?php $dataList = statCommandeMois($commande['a']); ?>

                <table class="table table-hover table-light table-striped card-body">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mois</th>
                            <th>Nombre de commandes</th>
                            <th>Chiffre d'affaire</th>
                            <th>Nombre de produits vendus</th>
                            <th>Nombre d'articles vendus</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($dataList as $data) : ?>
                            <tr>
                                <td><?= $data['m'] ?></td>
                                <td><?= $data['t.c'] ?></td>
                                <td><?= $data['c.a'] ?>DH</td>
                                <td><?= $data['t.p'] ?></td>
                                <td><?= $data['t.a'] ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <small>Statistiques année (<?= $commande['a'] ?>)</small>
                <?php foreach ($dataList as $data) : ?>
                    <?php $commandeList = statCommandeJour($commande['a'], $data['m']); ?>

                    <table class="table table-sm table-dark table-striped card-body">
                        <thead class="thead-dark">
                            <tr>
                                <th>Jour semaine</th>
                                <th>Jour mois</th>
                                <th>Client</th>
                                <th>Prix total</th>
                                <th>Nombre de produits vendus</th>
                                <th>Nombre d'articles vendus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($commandeList as $commandeItem) : ?>
                                <tr>
                                    <td><?= $commandeItem['j.s'] ?></td>
                                    <td><?= $commandeItem['j.m'] ?></td>
                                    <td><?= $commandeItem['c'] ?></td>
                                    <td><?= $commandeItem['p.t'] ?> DH</td>
                                    <td><?= $commandeItem['q.p'] ?></td>
                                    <td><?= $commandeItem['q.a'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <small>Commandes année (<?= $commande['a'] ?>), mois (<?= $data['m'] ?>)</small>
                <?php endforeach; ?>
            <?php endforeach; ?>

        </div>
    </body>

    </html>

<?php else : ?>
    <?php header('Location: http://192.168.1.4/bio_market/employe/dashboard_login.php');  ?>
<?php endif; ?>