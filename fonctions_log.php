<?php

function connect_db()
{
    return new PDO('sqlsrv:Server=(local)\SQLEXPRESS;Database=bio_market', 'yeenix', '123.pol');
}

function log_requete($action, $page, $path)
{
    $user = (isset($_SESSION['email'])) ? $_SESSION['email'] : 'Visiteur';
    $pdo = connect_db();
    $pdo->query("INSERT INTO tracabilite_web(utilisateur,action_utilisateur,nom_page,url_page) VALUES('$user','$action','$page','$path');");
}


function sayHi()
{
    echo "HELLO FROM LOG FUNCTIONS";
}
