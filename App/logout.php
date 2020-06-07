<?php
session_start();

if (isset($_SESSION)) {
    session_unset();
    require('../fonctions_log.php');
    log_requete('Déconnexion',  __FILE__, $_SERVER['REQUEST_URI']);
    header('Location: /bio_market/index.php');
} else {
    header('Location: /bio_market/index.php');
}
