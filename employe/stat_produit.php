<?php
session_start();
require('app/db/db_fonctions.php');
?>

<?php if (isset($_SESSION['cin'])) : ?>
    <?php
    $statProd = statProduit();
    $years = getYears();
    $missingProds = getMissingProds();
    $topTrois = topTroisProd();
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

            .img {
                width: 50px;
            }
        </style>
    </head>

    <body>
        <?php require('public/header.php'); ?>
        <div class="container card my-5">
            <table class="table table-hover table-light table-striped card-body">
                <thead class="thead-dark">
                    <tr>
                        <th>Produit</th>
                        <th>Prix unitaire</th>
                        <th>Nombre d'articles vendus</th>
                        <th>Chiffre d'affaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($statProd as $prod) : ?>
                        <tr>
                            <td><?= $prod['n'] ?></td>
                            <td><?= $prod['p.u'] ?> DH</td>
                            <td><?= $prod['t.a'] ?></td>
                            <td><?= $prod['b.t'] ?> DH</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <small class="card-title">Statistiques générales</small>
        </div>
        <div class="container card my-5">
            <?php foreach ($years as $year) : ?>
                <?php $prods = getProdByYear($year['annee']); ?>
                <table class="table table-hover table-light table-striped card-body">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mois</th>
                            <th>Produit</th>
                            <th>Prix unitaire</th>
                            <th>Nombre d'articles vendus</th>
                            <th>Chiffre d'affaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prods as $prod) : ?>
                            <tr>
                                <td><?= $prod['m'] ?></td>
                                <td><?= $prod['n'] ?></td>
                                <td><?= $prod['p.u'] ?> DH</td>
                                <td><?= $prod['t.a'] ?></td>
                                <td><?= $prod['b.t'] ?> DH</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <small class="card-title">Statistiques générales année (<?= $year['annee'] ?>)</small>
            <?php endforeach; ?>
        </div>

        <div class="container card my-5">
            <table class="table table-hover table-light table-striped card-body">
                <thead class="thead-dark">
                    <tr>
                        <th>Produit</th>
                        <th>Prix unitaire</th>
                        <th>Image</th>
                        <th>Nombre d'articles vendus</th>
                        <th>Chiffre d'affaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($topTrois as $prod) : ?>
                        <?php $img = base64_encode($prod['img']); ?>
                        <tr>
                            <td><?= $prod['n'] ?></td>
                            <td><?= $prod['p.u'] ?> DH</td>
                            <td><img src='data:image/png;base64,<?= $img ?>' alt="" class="img"></td>
                            <td><?= $prod['t.a'] ?></td>
                            <td><?= $prod['b.t'] ?> DH</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <small class="card-title">Les trois produits les plus vendus</small>

        </div>

        <?php foreach ($years as $year) : ?>
            <?php $prods = topProdByYear($year['annee']); ?>
            <div class="container card my-5">
                <table class="table table-hover table-light table-striped card-body">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mois</th>
                            <th>Produit</th>
                            <th>Prix unitaire</th>
                            <th>Image</th>
                            <th>Nombre d'articles vendus</th>
                            <th>Chiffre d'affaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prods as $prod) : ?>
                            <?php $img = base64_encode($prod['i.p']); ?>
                            <tr>
                                <td><?= $prod['m'] ?></td>
                                <td><?= $prod['n'] ?></td>
                                <td><?= $prod['p.u'] ?> DH</td>
                                <td><img src="data:image/png;base64,<?= $img ?>" alt="" class="img"></td>
                                <td><?= $prod['t.a'] ?></td>
                                <td><?= $prod['b.t'] ?> DH</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <small class="card-title">Les trois produits les plus vendus année (<?= $year['annee'] ?>)</small>
            </div>
            <?php $moisList = getMonths($year['annee']); ?>
            <?php foreach ($moisList as $mois) : ?>
                <?php $prods = topProdsByYM($year['annee'], $mois['mois']); ?>
                <div class="container card my-5">
                    <table class="table table-hover table-light table-striped card-body">
                        <thead class="thead-dark">
                            <tr>
                                <th>Produit</th>
                                <th>Prix unitaire</th>
                                <th>Image</th>
                                <th>Nombre d'articles vendus</th>
                                <th>Chiffre d'affaire</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prods as $prod) : ?>
                                <?php $img = base64_encode($prod['img']); ?>
                                <tr>
                                    <td><?= $prod['n'] ?></td>
                                    <td><?= $prod['p.u'] ?> DH</td>
                                    <td><img src="data:image/png;base64,<?= $img ?>" alt="" class="img"></td>
                                    <td><?= $prod['t.a'] ?></td>
                                    <td><?= $prod['b.t'] ?> DH</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <small class="card-title">Les trois produits les plus vendus année (<?= $year['annee'] ?>), mois (<?= $mois['mois'] ?>)</small>
                </div>
            <?php endforeach; ?>

        <?php endforeach; ?>

        <div class="container card my-5">
            <table class="table table-hover table-light table-striped card-body">
                <thead class="thead-dark">
                    <tr>
                        <th>Produit</th>
                        <th>Prix unitaire</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($missingProds as $prod) : ?>
                        <?php $img = base64_encode($prod['image']); ?>
                        <tr>
                            <td><?= $prod['nom'] ?></td>
                            <td><?= $prod['prix_unitaire'] ?> DH</td>
                            <td><img src='data:image/png;base64,<?= $img ?>' alt="" class="img"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <small class="card-title">Produits non vendus</small>
        </div>
        <?php foreach ($years as $year) : ?>
            <?php $prods = getMissingProdsByYear($year['annee']); ?>
            <div class="container card my-5">
                <table class="table table-hover table-light table-striped card-body">
                    <thead class="thead-dark">
                        <tr>
                            <th>Produit</th>
                            <th>Prix unitaire</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prods as $prod) : ?>
                            <?php $img = base64_encode($prod['image']); ?>
                            <tr>
                                <td><?= $prod['nom'] ?></td>
                                <td><?= $prod['prix_unitaire'] ?> DH</td>
                                <td><img src='data:image/png;base64,<?= $img ?>' alt="" class="img"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <small class="card-title">Produits non vendus année (<?= $year['annee'] ?>)</small>
            </div>
            <?php $moisList = getMonths($year['annee']); ?>
            <?php foreach ($moisList as $mois) : ?>
                <?php $prods = getMissingProdsByYM($year['annee'], $mois['mois']); ?>
                <div class="container card my-5">
                    <table class="table table-hover table-light table-striped card-body">
                        <thead class="thead-dark">
                            <tr>
                                <th>Produit</th>
                                <th>Prix unitaire</th>
                                <th>Image</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prods as $prod) : ?>
                                <?php $img = base64_encode($prod['image']); ?>
                                <tr>
                                    <td><?= $prod['nom'] ?></td>
                                    <td><?= $prod['prix_unitaire'] ?> DH</td>
                                    <td><img src="data:image/png;base64,<?= $img ?>" alt="" class="img"></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <small class="card-title">Produits non vendus année (<?= $year['annee'] ?>), mois (<?= $mois['mois'] ?>)</small>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </body>

    </html>

<?php else : ?>
    <?php header('Location: http://192.168.1.4/bio_market/employe/dashboard_login.php');  ?>
<?php endif; ?>