<nav class="navbar navbar-expand-lg unique-color-dark navbar-dark">

    <img src="/bio_market/images/logo.png" alt="" id="logo-img" style="cursor:pointer;" class="navbar-brand" width="150x">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="/bio_market/index.php">Acceuil</a></li>
            <?php
            if (!isset($_SESSION['email'])) {
                echo '<li class="nav-item"><a class="nav-link" href="/bio_market/views/creer.php">Compte</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/bio_market/views/login.php">Connexion</a></li>';
            } else {
                echo '<li class="nav-item"><a class="nav-link" href="/bio_market/App/logout.php">Déconnexion</a></li>';
            }
            ?>

            <li class="nav-item"><a class="nav-link" href="/bio_market/views/produits.php">Produits</a></li>
            <?php
            if (isset($_SESSION['email'])) {
                echo '<li class="nav-item"><a class="nav-link" href="/bio_market/views/panier.php">Panier</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/bio_market/views/commandes.php">Commandes</a></li>';
            }
            ?>
            <li class="nav-item"><a class="nav-link" href="/bio_market/views/livreur.php">Livreur</a></li>
        </ul>
    </div>
</nav>

<script>
    const logo = document.getElementById('logo-img');
    logo.onclick = () => {
        window.location.href = 'http://192.168.1.4/bio_market/index.php'
    }
</script>

<!-- d-flex justify-content-end -->