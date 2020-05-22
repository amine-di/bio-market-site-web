<?php
session_start();

if(isset($_SESSION)){
    session_unset();
    header('Location: /bio_market/index.php');
}else{
    header('Location: /bio_market/index.php');
}