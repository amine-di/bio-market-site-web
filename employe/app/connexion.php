<?php
session_start();

require('db/db_fonctions.php');
if (isset($_POST['loginBtnEmp'])) {
    if (!empty($_POST['cin']) && !empty($_POST['code'])) {
        $_POST['code'] = intval($_POST['code']);
        $result = loginEmp($_POST['cin'], $_POST['code']);
        if ($result == 1) {
            $res = checkStatut($_POST['cin']);
            if ($res == 1) {
                $_SESSION['cin'] = $_POST['cin'];
                header('Location: http://192.168.1.4/bio_market/employe/dashboard_employe.php');
            } else {
                header('Location: http://192.168.1.4/bio_market/views/Error404.php?errorMsg=Compte non autorisé');
            }
        } else {
            header('Location: http://192.168.1.4/bio_market/views/Error404.php?errorMsg=Compte n\'existe pas');
        }
    } else {
        header('Location: http://192.168.1.4/bio_market/views/Error404.php?errorMsg=Veuillez remplir tous les champs');
    }
} else {
    header('Location: http://192.168.1.4/bio_market/employe/dashboard_login.php');
}
