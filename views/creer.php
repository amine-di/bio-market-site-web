<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer Compte</title>
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/global.css">
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/creer.css">
</head>
<body>

    <?php require('../public/header.php'); ?>
    <h2>Formulaire de création de compte</h2>

    <form action="/bio_market/App/creer_compte.php" method="post" class='createForm'>
        <input type="text" name="nom" placeholder="Nom..." autocomplete="off" required>
        <input type="text" name="prenom" placeholder="Prenom..." autocomplete="off" required>
        <input type="text" name="age" placeholder="Age..." autocomplete="off" required>
        <input type="email" name="email" placeholder="Email..." autocomplete="off" required>
        <input type="password" name="pwd" placeholder="Mot de Passe..." autocomplete="off" required>
        <input type="text" name="telephone" maxlength="10" placeholder="Telephone..." autocomplete="off" required>
        <input type="text" name="pays" placeholder="Pays..." autocomplete="off" required>
        <input type="text" name="ville" placeholder="Ville..." autocomplete="off" required>
        <input type="text" name="adresse" placeholder="Adresse..." autocomplete="off" required>
        <input type="submit" name="creerBtn" value="Creer Compte">
    </form>
    <?php require('../public/session_bar.php'); ?>
</body>
</html>