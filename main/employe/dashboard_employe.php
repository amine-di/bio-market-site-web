<?php
session_start();
require('../../db/db_emp_fonctions.php');
?>
<?php if (isset($_SESSION['cin'])) : ?>

    <?php
    $logs = LogClients();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log</title>
        <link rel="stylesheet" href="http://BioMarket.com/css/bootstrap.css">
        <script src="http://BioMarket.com/scripts/jquery.js"></script>
        <script src="http://BioMarket.com/scripts/bootstrap.js"></script>
        <link rel="stylesheet" href="http://BioMarket.com/css/global.css">
        <link href="http://BioMarket.com/css/mdnbootstrap.css" rel="stylesheet">

        <style>
            body {
                background-image: none !important;
            }

            table {
                width: 95% !important;
                margin: 0 auto 40px auto;
            }

            .url,
            .name {
                max-width: 120px;
                word-wrap: break-word;
            }

            .trs {
                cursor: pointer;
            }

            .fixedFoot {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
            }
        </style>
    </head>

    <body>
        <?php require('public/header.php'); ?>
        <h3><i>Logs</i></h3>
        <div class="container">
            <?php
            $actions = getActions();
            $users = getUsers();
            $ips = getIps();
            // $years = getYears();
            // $months = getMonths();
            ?>

            <label>Action</label>
            <select name="action" id="actions">
                <option>Tout</option>
                <?php foreach ($actions as $action) : ?>
                    <option><?= $action['action_utilisateur'] ?></option>
                <?php endforeach; ?>
            </select>
            <label>Client</label>
            <select name="action" id="users">
                <option>Tout</option>
                <?php foreach ($users as $user) : ?>
                    <option><?= $user['utilisateur'] ?></option>
                <?php endforeach; ?>
            </select>
            <label>Adresse IP</label>
            <select name="action" id="ips">
                <option>Tout</option>
                <?php foreach ($ips as $ip) : ?>
                    <option><?= $ip['adresse_ip'] ?></option>
                <?php endforeach; ?>
            </select>
            <label>Année</label>
            <select name="action" id="years">
                <option>Tout</option>
                <?php
                $current = date("Y");
                for ($i = 1995; $i <= $current; $i++) {
                    echo "<option>$i</option>";
                }
                ?>
            </select>
            <label>Mois</label>
            <select name="action" id="months">
                <option>Tout</option>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo "<option>$i</option>";
                }
                ?>
            </select>
            <label>Jour</label>
            <select name="action" id="days">
                <option>Tout</option>
                <?php
                for ($i = 1; $i <= 31; $i++) {
                    echo "<option>$i</option>";
                }
                ?>
            </select>
            <button id="filtreBtn" class="btn btn-primary">Filtrer</button>

        </div>
        <table class="table table-hover table-light table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Client</th>
                    <th>Action</th>
                    <th>Nom page</th>
                    <th>URL</th>
                    <th>Date requete</th>
                    <th>Adresse IP</th>
                </tr>
            </thead>
            <tbody id="tContent">
                <?php foreach ($logs as $log) : ?>
                    <tr class="trs">
                        <td><?= $log['id'] ?></td>
                        <td><?= $log['utilisateur'] ?></td>
                        <td><?= $log['action_utilisateur'] ?></td>
                        <td class="name"><?= $log['nom_page'] ?></td>
                        <td class="url"><?= $log['url_page'] ?></td>
                        <td><?= $log['date_requete'] ?></td>
                        <td><?= $log['adresse_ip'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php require('../public/footer.php'); ?>
    </body>
    <script src="http://BioMarket.com/employe/public/js/dashboard.js"></script>
    <?php if (count($logs) <= 3) : ?>
        <script>
            document.querySelector('footer').classList.add('fixedFoot');
        </script>
    <?php endif; ?>

    </html>

<?php else : ?>

    <?php header('Location: http://BioMarket.com/employe/dashboard_login.php');  ?>

<?php endif; ?>