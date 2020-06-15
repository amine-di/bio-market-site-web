<?php
session_start();
require('../../../db/db_emp_fonctions.php');
if (isset($_SESSION['cin'])) {
    if (isset($_GET['action']) && isset($_GET['user']) && isset($_GET['ip'])) {
        if ($_GET['action'] !== 'Tout') {
            $action = $_GET['action'];
        } else {
            $action = '%';
        }
        if ($_GET['user'] !== 'Tout') {
            $user = $_GET['user'];
        } else {
            $user = '%';
        }
        if ($_GET['ip'] !== 'Tout') {
            $ip = $_GET['ip'];
        } else {
            $ip = '%';
        }
        if ($_GET['year'] !== 'Tout') {
            $year = $_GET['year'];
        } else {
            $year = '%';
        }
        if ($_GET['month'] !== 'Tout') {
            $month = $_GET['month'];
        } else {
            $month = '%';
        }
        if ($_GET['day'] !== 'Tout') {
            $day = $_GET['day'];
        } else {
            $day = '%';
        }
        $data = queryLog($action, $user, $ip, $year, $month, $day);

        echo json_encode($data);
    }
} else {
}
