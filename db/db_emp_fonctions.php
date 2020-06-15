<?php

function connect_db()
{
    $pdo = new PDO('sqlsrv:Server=(local)\SQLEXPRESS;Database=bio_market', 'yeenix', '123.pol');
    return $pdo;
}
/*FONCTIONS STAT COMMANDES*/

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

    $stat = $pdo->query("SELECT COUNT(*) AS 't.c', SUM(prix_total) AS 'c.a', SUM(quantite_article) AS 't.a', SUM(quantite_produit) AS 't.p' FROM commande")->fetch(PDO::FETCH_ASSOC);


    return $stat;
}

function statCommandeAnnee()
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT YEAR(date_commande) AS 'a',COUNT(*) AS 't.c',SUM(prix_total) AS 'c.a',SUM(quantite_article) AS 't.a', SUM(quantite_produit) AS 't.p'
    FROM commande GROUP BY YEAR(date_commande)")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}

// function statCommandeMois()
// {
//     $pdo = connect_db();

//     $stat = $pdo->query("SELECT DATENAME (MONTH, DATEADD(MONTH, MONTH(date_commande) - 1, '1900-01-01')) AS 'm',COUNT(*) AS 't.c', SUM(prix_total) AS 'c.a', SUM(quantite_article) AS 't.a' FROM commande GROUP BY MONTH(date_commande)")->fetchAll(PDO::FETCH_ASSOC);

//     return $stat;
// }


function statCommandeMois($annee)
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT DATENAME (MONTH, DATEADD(MONTH, MONTH(date_commande) - 1, '1900-01-01')) AS 'm',COUNT(*) AS 't.c',SUM(prix_total) AS 'c.a', SUM(quantite_article) AS 't.a', SUM(quantite_produit) AS 't.p' FROM commande WHERE YEAR(date_commande) LIKE '$annee' GROUP BY MONTH(date_commande)")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}

function statCommandeJour($annee, $mois)
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT FORMAT(date_commande,'dddd') AS 'j.s',DAY(date_commande) AS 'j.m', (client.nom+' '+client.prenom) AS 'c',prix_total AS 'p.t',quantite_produit AS 'q.p',quantite_article AS 'q.a' FROM commande inner join client on client.id = commande.client WHERE MONTH(date_commande) LIKE MONTH('$mois' + ' 1 2010') AND YEAR(date_commande) LIKE '$annee';")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}


/*FONCTIONS STAT PRODUITS*/

function statProduit()
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT (SELECT nom FROM produit WHERE id = produit) AS 'n',(SELECT prix_unitaire FROM produit WHERE id = produit) AS 'p.u',SUM(nombre_article) AS 't.a',SUM(prix_total) AS 'b.t' FROM produit_commande GROUP BY produit ORDER BY 'b.t' DESC")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}


function getYears()
{
    $pdo = connect_db();

    $years = $pdo->query("SELECT DISTINCT YEAR(date_commande) AS 'annee' FROM commande")->fetchAll(PDO::FETCH_ASSOC);

    return $years;
}
function getMonths($annee)
{
    $pdo = connect_db();

    $years = $pdo->query("SELECT DISTINCT DATENAME (MONTH, DATEADD(MONTH, MONTH(date_commande) - 1, '1900-01-01')) AS 'mois' FROM commande WHERE YEAR(date_commande) LIKE '$annee'")->fetchAll(PDO::FETCH_ASSOC);

    return $years;
}


function getProdByYear($annee)
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT DATENAME (MONTH, DATEADD(MONTH, month(commande.date_commande) - 1, '1900-01-01')) AS 'm',
    (SELECT nom FROM produit WHERE id = produit) AS 'n',SUM(nombre_article) AS 't.a',SUM(produit_commande.prix_total) AS 'b.t',
    (SELECT prix_unitaire FROM produit WHERE id = produit) AS 'p.u'
    FROM produit_commande INNER JOIN commande
    ON commande.id = produit_commande.commande
    WHERE YEAR(commande.date_commande) LIKE '$annee'
    GROUP BY produit,year(commande.date_commande),month(commande.date_commande)
    ORDER BY month(commande.date_commande),'b.t' DESC")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}


function getMissingProds()
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT produit.nom,produit.image,produit.prix_unitaire FROM produit 
    WHERE produit.id NOT IN(SELECT produit FROM produit_commande)")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}

function topTroisProd()
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT TOP(3) (SELECT nom FROM produit WHERE id = produit) AS 'n',
    (SELECT prix_unitaire FROM produit WHERE id = produit) AS 'p.u',
    (SELECT image FROM produit WHERE id = produit) AS 'img',
    SUM(nombre_article) AS 't.a',
    SUM(prix_total) AS 'b.t' 
    FROM produit_commande 
    GROUP BY produit 
    ORDER BY 't.a' DESC")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}


function topProdByYear($annee)
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT TOP(3) DATENAME (MONTH, DATEADD(MONTH, month(commande.date_commande) - 1, '1900-01-01')) AS 'm',
    (SELECT nom FROM produit WHERE id = produit) AS 'n',SUM(nombre_article) AS 't.a',SUM(produit_commande.prix_total) AS 'b.t',
    (SELECT prix_unitaire FROM produit WHERE id = produit) AS 'p.u',
    (SELECT image FROM produit WHERE id = produit) AS 'i.p'
    FROM produit_commande INNER JOIN commande
    ON commande.id = produit_commande.commande
    WHERE YEAR(commande.date_commande) LIKE '$annee'
    GROUP BY produit,year(commande.date_commande),month(commande.date_commande)
    ORDER BY 't.a' DESC")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}

function topProdsByYM($annee, $mois)
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT TOP(3) (SELECT nom FROM produit WHERE id = produit) AS 'n',
    (SELECT prix_unitaire FROM produit WHERE id = produit) AS 'p.u',
    (SELECT image FROM produit WHERE id = produit) AS 'img',
    SUM(nombre_article) AS 't.a',
    SUM(produit_commande.prix_total) AS 'b.t' 
    FROM produit_commande INNER JOIN commande
    ON commande.id = produit_commande.commande
    WHERE YEAR(commande.date_commande) LIKE '$annee' AND DATENAME (MONTH, DATEADD(MONTH, MONTH(date_commande) - 1, '1900-01-01')) LIKE '$mois'
    GROUP BY produit, MONTH(commande.date_commande),YEAR(commande.date_commande)
    ORDER BY 't.a' DESC ")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}


function getMissingProdsByYear($annee)
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT produit.nom,produit.image,produit.prix_unitaire 
    FROM produit 
    WHERE produit.id NOT IN(
    SELECT produit_commande.produit 
    FROM produit_commande INNER JOIN commande
    ON commande.id = produit_commande.commande
    WHERE YEAR(date_commande) LIKE '$annee'
    ) ")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}


function getMissingProdsByYM($annee, $mois)
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT produit.nom,produit.image,produit.prix_unitaire 
    FROM produit 
    WHERE produit.id NOT IN(
    SELECT produit_commande.produit 
    FROM produit_commande INNER JOIN commande
    ON commande.id = produit_commande.commande
    WHERE YEAR(date_commande) LIKE '$annee' AND DATENAME (MONTH, DATEADD(MONTH, MONTH(date_commande) - 1, '1900-01-01')) LIKE '$mois'
    ) ")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}


/*STATISTIQUES CLIENT*/

function getStatActions()
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT action_utilisateur AS 'a.u',COUNT(*) AS 'n' FROM tracabilite_web GROUP BY action_utilisateur;")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}

function getStatsByClient()
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT utilisateur AS 'u',action_utilisateur AS 'a.u',COUNT(*) AS n 
    FROM tracabilite_web 
    GROUP BY action_utilisateur,utilisateur 
    ORDER BY utilisateur")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}


function getYearsTrace()
{
    $pdo = connect_db();

    $years = $pdo->query("SELECT DISTINCT YEAR(date_requete) AS 'annee' FROM tracabilite_web")->fetchAll(PDO::FETCH_ASSOC);

    return $years;
}


function getActionsByY($annee)
{
    $pdo = connect_db();

    $stat = $pdo->query("SELECT action_utilisateur AS 'a.u',COUNT(*) AS 'n' 
    FROM tracabilite_web 
    WHERE YEAR(date_requete) LIKE '$annee' 
    GROUP BY action_utilisateur,YEAR(date_requete)")->fetchAll(PDO::FETCH_ASSOC);

    return $stat;
}
