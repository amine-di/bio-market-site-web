<?php
session_start();
require('app/db/db_fonctions.php');
?>

<?php if (isset($_SESSION['cin'])) : ?>
    <?php
    $statsActions = getStatActions();
    $statsByClient = getStatsByClient();
    $years = getYearsTrace();
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
                        <th>Action</th>
                        <th>Chiffre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($statsActions as $action) : ?>
                        <tr>
                            <td><?= $action['a.u'] ?></td>
                            <td><?= $action['n'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <small class="card-title">Statistiques générales</small>
        </div>
        <?php foreach ($years as $year) : ?>
            <?php $stats = getActionsByY($year['annee']); ?>
            <div class="container card my-5">

                <table class="table table-hover table-light table-striped card-body">
                    <thead class="thead-dark">
                        <tr>
                            <th>Action</th>
                            <th>Chiffre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stats as $stat) : ?>
                            <tr>
                                <td><?= $stat['a.u'] ?></td>
                                <td><?= $stat['n'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <small class="card-title">Statistiques année (<?= $year['annee']; ?>)</small>
            </div>

        <?php endforeach; ?>
        <div class="container card my-5">

            <table class="table table-hover table-light table-striped card-body">
                <thead class="thead-dark">
                    <tr>
                        <th>Utilisateur</th>
                        <th>Action</th>
                        <th>Chiffre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($statsByClient as $stat) : ?>
                        <tr>
                            <td><?= $stat['u'] ?></td>
                            <td><?= $stat['a.u'] ?></td>
                            <td><?= $stat['n'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <small class="card-title">Statistiques par client</small>
        </div>
    </body>

    </html>

<?php else : ?>
    <?php header('Location: http://192.168.1.4/bio_market/employe/dashboard_login.php');  ?>
<?php endif; ?>