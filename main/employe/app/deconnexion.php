<?php
session_start();
if (isset($_SESSION['cin'])) {
    session_unset();
    header('Location: http://BioMarket.com/employe/dashboard_login.php');
} else {
    header('Location: http://BioMarket.com/employe/dashboard_login.php');
}
