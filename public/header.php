<header>
        <!--<h1>Bio Market</h1>-->
        <img src="/bio_market/images/logo.png" alt="" id="logo-img" style="cursor:pointer;">
        <nav>
            <div id="container">
                <img src="/bio_market/images/bg.jpg" id="bgMenu">
                <ul>
                    <li><a href="/bio_market/index.php">Acceuil</a></li>
                    <li><a href="/bio_market/views/creer.php">Creer Compte</a></li>
                    <li><a href="/bio_market/views/login.php">Login</a></li>
                    <li><a href="/bio_market/views/produits.php">Produits</a></li>
                    <li><a href="/bio_market/views/panier.php">Panier</a></li>
                    <li><a href="/bio_market/views/commandes.php">Commandes</a></li>
                    <li><a href="/bio_market/views/livreur.php">Fournisseur</a></li>
                </ul>
            </div>
        </nav>
</header>

<script>
    const logo = document.getElementById('logo-img');
    logo.onclick = ()=>{
    window.location.href='http://192.168.1.4/bio_market/index.php'
}
</script>