<?php
session_start();
require('../db/fonctions_db.php');

if (isset($_POST['loginBtn'])) {

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];


    if (!empty($email) && !empty($pwd)) {

        $result = loginClient($email, $pwd);

        if ($result == 1) {
            $statut = verifierStatut($email);
            if ($statut['statut'] == 1) {
                $_SESSION['email'] = $email;
                header('Location: /bio_market/index.php');
            } else {
                header('Location: /bio_market/views/Error404.php?errorMsg=Ce compte n\'a pas été validé');
            }
        } else {
            header('Location: /bio_market/views/Error404.php?errorMsg=Ce compte n\'existe pas');
        }
    } else {
        header('Location: /bio_market/views/Error404.php?errorMsg=Veuillez remplir tous les champs SVP');
    }
} else {
    header('Location: /bio_market/index.php');
}
