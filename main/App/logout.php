<?php
session_start();

if (isset($_SESSION)) {
    require('../../fonctions_log.php');
    log_requete('Déconnexion',  __FILE__);
    unset($_SESSION['email']);
    header('Location: /index.php');
} else {
    header('Location: /index.php');
}
