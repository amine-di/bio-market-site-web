<?php
session_start();
if (isset($_SESSION['cin'])) {
    session_unset();
    header('Location: http://192.168.1.4/bio_market/employe/dashboard_login.php');
} else {
    header('Location: http://192.168.1.4/bio_market/employe/dashboard_login.php');
}
