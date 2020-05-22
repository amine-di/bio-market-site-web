<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/global.css">
    <link rel="stylesheet" href="http://192.168.1.4/bio_market/css/creer.css">
</head>
<body>
    <?php require('../public/header.php');?> 
    <h1 style="text-align:center;">Devenez livreur</h1>
    <form action="/bio_market/App/devenir_livreur.php" method="post" class='createForm' enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="Nom..." autocomplete="off" required>
        <input type="text" name="prenom" placeholder="Prenom..." autocomplete="off" required>
        <input type="text" name="age" placeholder="Age..." autocomplete="off" required>
        <input type="email" name="email" placeholder="Email..." autocomplete="off" required>
        <input type="text" name="telephone" maxlength="10" placeholder="Telephone..." autocomplete="off" required>
        <input type="text" name="pays" placeholder="Pays..." autocomplete="off" required>
        <input type="text" name="ville" placeholder="Ville..." autocomplete="off" required>
        <input type="text" name="adresse" placeholder="Adresse..." autocomplete="off" required>
        <input type="file" name="profileImg" required>
        <input type="submit" name="creerBtn" value="Creer Compte">
    </form>
</body>
</html>