<?php
session_start();
require('app/db/db_fonctions.php');
?>

<?php if (isset($_SESSION['cin']) && isset($_GET['log']) && isset($_GET['client'])) : ?>
    <?php
    $log = logClient($_GET['log']);
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
        <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/creer.css">
        <style>
            body {
                background-image: none !important;
            }

            table {
                margin: 0 auto;
            }

            .url,
            .name {
                max-width: 120px;
                word-wrap: break-word;
            }
        </style>
    </head>

    <body>
        <?php require('public/header.php'); ?>
        <div class="container">
            <h3><i>Log</i></h3>
            <table class="table table-light table-hover">
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
                <tr class="">
                    <td><?= $log['id'] ?></td>
                    <td><?= $log['utilisateur'] ?></td>
                    <td><?= $log['action_utilisateur'] ?></td>
                    <td class="name"><?= $log['nom_page'] ?></td>
                    <td class="url"><?= $log['url_page'] ?></td>
                    <td><?= $log['date_requete'] ?></td>
                    <td><?= $log['adresse_ip'] ?></td>
                </tr>
            </table>
            <?php if ($log['utilisateur'] !== 'Visiteur') : ?>
                <?php $client = logClientEmail($log['utilisateur']); ?>
                <h3><i>Client</i></h3>
                <table class="table table-light table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Mot de passe</th>
                            <th>Telephone</th>
                            <th>Pays</th>
                            <th>Ville</th>
                            <th>Adresse</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tr class="">
                        <td><?= $client['id'] ?></td>
                        <td><?= $client['nom'] ?></td>
                        <td><?= $client['prenom'] ?></td>
                        <td class="name"><?= $client['age'] ?></td>
                        <td class="url"><?= $client['email'] ?></td>
                        <td><?= $client['pwd'] ?></td>
                        <td><?= $client['telephone'] ?></td>
                        <td><?= $client['pays'] ?></td>
                        <td><?= $client['ville'] ?></td>
                        <td><?= $client['adresse'] ?></td>
                        <td><?= $client['statut'] ?></td>
                    </tr>
                </table>
                <h3><i>Commandes client</i></h3>
                <?php $commandes = logClientCommandes($client['id']); ?>
                <table class="table table-light table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Client</th>
                            <th>Quantite produit</th>
                            <th>Quantite article</th>
                            <th>Prix total (DH)</th>
                            <th>Date commande</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <?php foreach ($commandes as $commande) : ?>
                        <tr class="">
                            <td><?= $commande['id'] ?></td>
                            <td><?= $commande['client'] ?></td>
                            <td><?= $commande['quantite_produit'] ?></td>
                            <td><?= $commande['quantite_article'] ?></td>
                            <td><?= $commande['prix_total'] ?></td>
                            <td><?= $commande['date_commande'] ?></td>
                            <td><?= $commande['statut'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php else : ?>
                <h1>Aucune donnée</h1>
            <?php endif; ?>
        </div>

        <?php require('../public/footer.php'); ?>
    </body>
    <?php if ($_GET['client'] == 'Visiteur') : ?>
        <script>
            document.querySelector('footer').style.position = 'fixed';
            document.querySelector('footer').style.width = '100%';
            document.querySelector('footer').bottom = 0;
            document.querySelector('footer').left = 0;
            document.querySelector('footer').right = 0;
        </script>
    <?php endif; ?>

    </html>


<?php else : ?>

    <?php header('Location: http://192.168.1.4/bio_market/employe/dashboard_login.php');  ?>

<?php endif; ?>