<?php
require('../../db/fonctions_db.php');

if (isset($_POST['creerBtn'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $telephone = $_POST['telephone'];
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $adresse = $_POST['adresse'];

    if (!empty($nom) && !empty($prenom) && !empty($age) && !empty($email) && !empty($pwd) && !empty($telephone) && !empty($pays) && !empty($ville) && !empty($adresse)) {

        nouveauClient($nom, $prenom, $age, $email, $pwd, $telephone, $pays, $ville, $adresse);
        header('Location: ../index.php');
    } else {
        header('Location: /views/Error404.php?errorMsg=Veuillez remplir tous les champs SVP');
    }
} else {
    header('Location: ../index.php');
}
