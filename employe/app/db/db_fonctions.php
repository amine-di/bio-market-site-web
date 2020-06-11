<?php

function connect_db()
{
    $pdo = new PDO('sqlsrv:Server=(local)\SQLEXPRESS;Database=bio_market', 'yeenix', '123.pol');
    return $pdo;
}
function loginEmp($cin, $code)
{
    $pdo = connect_db();
    $result = $pdo->query("SELECT COUNT(*) AS res FROM utilisateur WHERE cin = '$cin' AND code = '$code';")->fetch(PDO::FETCH_ASSOC);

    return $result['res'];
}

function checkStatut($cin)
{
    $pdo = connect_db();
    $result = $pdo->query("SELECT statut FROM utilisateur WHERE cin = '$cin';")->fetch(PDO::FETCH_ASSOC);

    return $result['statut'];
}

function LogClients()
{
    $pdo = connect_db();

    $logs = $pdo->query("SELECT * FROM tracabilite_web")->fetchAll(PDO::FETCH_ASSOC);

    return $logs;
}


function logClient($id)
{
    $pdo = connect_db();
    $log = $pdo->query("SELECT * FROM tracabilite_web WHERE id = $id;")->fetch(PDO::FETCH_ASSOC);

    return $log;
}

function logClientEmail($email)
{
    $pdo = connect_db();
    $log = $pdo->query("SELECT * FROM client WHERE email = '$email';")->fetch(PDO::FETCH_ASSOC);

    return $log;
}

function logClientCommandes($id)
{
    $pdo = connect_db();
    $log = $pdo->query("SELECT * FROM commande WHERE client = $id;")->fetchAll(PDO::FETCH_ASSOC);

    return $log;
}


function getActions()
{
    $pdo = connect_db();
    $actions = $pdo->query("SELECT DISTINCT action_utilisateur FROM tracabilite_web;")->fetchAll(PDO::FETCH_ASSOC);

    return $actions;
}
function getUsers()
{
    $pdo = connect_db();
    $users = $pdo->query("SELECT DISTINCT utilisateur FROM tracabilite_web;")->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

function getIps()
{
    $pdo = connect_db();
    $ips = $pdo->query("SELECT DISTINCT adresse_ip FROM tracabilite_web;")->fetchAll(PDO::FETCH_ASSOC);

    return $ips;
}


function queryLog($action, $user, $ip, $year, $month, $day)
{
    $pdo = connect_db();
    $data = $pdo->query("SELECT * FROM tracabilite_web WHERE utilisateur LIKE '$user' AND action_utilisateur LIKE '$action'  AND adresse_ip LIKE '$ip' AND YEAR(date_requete) LIKE '$year' AND MONTH(date_requete) LIKE '$month' AND DAY(date_requete) LIKE '$day';")->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

function getCommandeStat()
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT COUNT(*) AS 't.c', SUM(prix_total) AS 'c.a', SUM(quantite_article) AS 't.a' FROM commande")->fetch(PDO::FETCH_ASSOC);


    return $stat;
}

function statCommandeAnnee()
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT YEAR(date_commande) AS 'a',COUNT(*) AS 't.c',SUM(prix_total) AS 'c.a',SUM(quantite_article) AS 't.a'
    FROM commande GROUP BY YEAR(date_commande)")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}

function statCommandeMois()
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT DATENAME (MONTH, DATEADD(MONTH, MONTH(date_commande) - 1, '1900-01-01')) AS 'm',COUNT(*) AS 't.c', SUM(prix_total) AS 'c.a', SUM(quantite_article) AS 't.a' FROM commande GROUP BY MONTH(date_commande)")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}
