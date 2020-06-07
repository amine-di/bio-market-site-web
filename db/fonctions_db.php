<?php

function db_connect()
{
    return new PDO('sqlsrv:Server=(local)\SQLEXPRESS;Database=bio_market', 'yeenix', '123.pol');
}

function nouveauClient($nom, $prenom, $age, $email, $pwd, $telephone, $pays, $ville, $adresse)
{
    $pdo = db_connect();
    $pdo->query("INSERT INTO client(nom,prenom,age,email,pwd,telephone,pays,ville,adresse,statut) 
    VALUES('$nom', '$prenom', $age, '$email', '$pwd', '$telephone', '$pays', '$ville', '$adresse',0);");
}
function loginClient($email, $pwd)
{
    $pdo = db_connect();
    $result = $pdo->query("SELECT COUNT(*) AS num FROM client WHERE email = '$email' AND pwd = '$pwd';")->fetch(PDO::FETCH_ASSOC);

    return $result['num'];
}

function tousLesProduits()
{
    $pdo = db_connect();

    $produits = $pdo->query("SELECT produit.id ,produit.nom, categorie_prod.nom as categorie, produit.prix_unitaire, produit.image, produit.description_prod FROM produit inner join categorie_prod on produit.categorie = categorie_prod.id;")->fetchAll(PDO::FETCH_ASSOC);

    return $produits;
}

function produitParId($id)
{
    $pdo = db_connect();
    $produit = $pdo->query("SELECT produit.nom, categorie_prod.nom as categorie, produit.prix_unitaire, produit.image, produit.description_prod FROM produit inner join categorie_prod on produit.categorie = categorie_prod.id WHERE produit.id = $id;")->fetch(PDO::FETCH_ASSOC);

    return $produit;
}

function prixProduit($id)
{
    $pdo = db_connect();
    $produit = $pdo->query("SELECT prix_unitaire FROM produit WHERE id = $id;")->fetch(PDO::FETCH_ASSOC);

    return $produit['prix_unitaire'];
}

function clientParEmail($email)
{
    $pdo = db_connect();
    $client = $pdo->query("SELECT nom, prenom, telephone, pays, ville, adresse FROM client WHERE email = '$email';")->fetch(PDO::FETCH_ASSOC);

    return $client;
}

function produitParIdNoDesc($id)
{
    $pdo = db_connect();
    $produit = $pdo->query("SELECT produit.nom, categorie_prod.nom as categorie, produit.prix_unitaire, produit.image FROM produit inner join categorie_prod on produit.categorie = categorie_prod.id WHERE produit.id = $id;")->fetch(PDO::FETCH_ASSOC);

    return $produit;
}

function commander($id, $client, $qnt_prod, $qnt_art, $total, $statut)
{
    $pdo = db_connect();
    $pdo->query("INSERT INTO commande(id,client,quantite_produit,quantite_article,prix_total,statut) VALUES($id,$client,$qnt_prod,$qnt_art,$total,'$statut');");
}

function checkCommandeId($rndId)
{
    $pdo = db_connect();
    $result = $pdo->query("SELECT COUNT(*) AS num FROM commande WHERE id = $rndId")->fetch(PDO::FETCH_ASSOC);

    return $result['num'];
}

function clientIdParEmail($email)
{
    $pdo = db_connect();
    $client = $pdo->query("SELECT id FROM client WHERE email = '$email';")->fetch(PDO::FETCH_ASSOC);

    return $client;
}

function produitCommande($idProd, $nbArticle, $prixTotal, $idCommande)
{
    $pdo = db_connect();
    $pdo->query("INSERT INTO produit_commande(produit,nombre_article,prix_total,commande) VALUES($idProd,$nbArticle,$prixTotal,$idCommande);");
}

function getCommandes($email)
{
    $pdo = db_connect();
    $commande = $pdo->query("SELECT id FROM commande WHERE client = (SELECT id FROM client WHERE email = '$email') ORDER BY date_commande DESC;")->fetchAll(PDO::FETCH_ASSOC);
    return $commande;
}

function getCommande($id)
{
    $pdo = db_connect();
    $commande = $pdo->query("SELECT quantite_produit,quantite_article,prix_total,date_commande,statut FROM commande WHERE id = $id;")->fetchAll(PDO::FETCH_ASSOC);

    return $commande;
}

function getCommandeData($id)
{
    $pdo = db_connect();
    $commande = $pdo->query("SELECT produit.nom,produit_commande.nombre_article,produit_commande.prix_total,produit_commande.commande
    from produit_commande inner join produit
    on produit.id = produit_commande.produit
    where commande = '$id';")->fetchAll(PDO::FETCH_ASSOC);
    return $commande;
}

function produitParCategorie($categorie)
{
    $pdo = db_connect();

    $produits = $pdo->query("SELECT produit.id ,produit.nom, categorie_prod.nom as categorie, produit.prix_unitaire, produit.image, produit.description_prod FROM produit inner join categorie_prod on produit.categorie = categorie_prod.id WHERE produit.categorie = $categorie;")->fetchAll(PDO::FETCH_ASSOC);

    return $produits;
}

function getAllCategories()
{
    $pdo = db_connect();
    $categories = $pdo->query("SELECT * FROM categorie_prod;")->fetchAll(PDO::FETCH_ASSOC);

    return $categories;
}

function getProduitParId($id)
{
    $pdo = db_connect();
    $produit = $pdo->query("SELECT produit.id, produit.nom, produit.prix_unitaire,produit.image, produit.description_prod, categorie_prod.nom AS categorie FROM produit INNER JOIN categorie_prod ON produit.categorie = categorie_prod.id WHERE produit.id = $id")->fetch(PDO::FETCH_ASSOC);

    return $produit;
}

function ajouterLivreur($nom, $prenom, $age, $email, $telephone, $pays, $ville, $adresse, $profileImg)
{

    $pdo = db_connect();
    $pImage = "'" . $profileImg . "'";
    $pdo->query("INSERT INTO livreur(nom,prenom,adresse,email,pays,ville,telephone,statut,age,photo) VALUES('$nom','$prenom','$adresse','$email','$pays','$ville','$telephone',0,$age,(SELECT * FROM OPENROWSET(BULK N$pImage, SINGLE_BLOB) as T1))");
}


function verifierStatut($email)
{
    $pdo = db_connect();
    $result = $pdo->query("SELECT statut FROM client WHERE email = '$email';")->fetch(PDO::FETCH_ASSOC);

    return $result;
}
