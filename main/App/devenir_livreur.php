<?php
require('../../db/fonctions_db.php');

if (isset($_POST['creerBtn'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $adresse = $_POST['adresse'];
    $Img = $_FILES['profileImg'];

    if (!empty($nom) && !empty($prenom) && !empty($age) && !empty($email) && !empty($telephone) && !empty($pays) && !empty($ville) && !empty($adresse) && !empty($Img)) {
        $randName = 'C:\TMP\\' . $Img['name'];
        move_uploaded_file($Img['tmp_name'], $randName);
        ajouterLivreur($nom, $prenom, $age, $email, $telephone, $pays, $ville, $adresse, $randName);
        unlink($randName);
        header('Location: ../index.php');
    }
}
