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
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/login.css">
</head>
<body>

    <?php require('../public/header.php'); ?>
    <form action="/bio_market/App/login_compte.php" method="post" class='loginForm'>
    <h2>Login</h2>
        <input type="email" name="email" placeholder="Email..." autocomplete="off" required>
        <input type="password" name="pwd" placeholder="Mot de Passe..." autocomplete="off" required>
        <input type="submit" name="loginBtn" value="Login">
    </form>
    <?php require('../public/session_bar.php'); ?>
</body>
</html>