<nav class="navbar navbar-expand-lg unique-color-dark navbar-dark">

    <img src="/images/logo.png" alt="" id="logo-img" style="cursor:pointer;" class="navbar-brand" width="150x">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="/employe/dashboard_employe.php">Acceuil</a></li>
            <?php
            if (!isset($_SESSION['cin'])) {
                if ($_SERVER['REQUEST_URI'] !== '/employe/dashboard_login.php') {
                    echo '<li class="nav-item"><a class="nav-link" href="/employe/dashboard_login.php">Connexion</a></li>';
                }
            } else {
                echo '<li class="nav-item"><a class="nav-link" href="/employe/stat_commande.php">Statistiques commandes</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/employe/stat_produit.php">Statistiques produits</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/employe/stat_client.php">Statistiques clients</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/employe/app/deconnexion.php">Déconnexion</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>

<script>
    const logo = document.getElementById('logo-img');
    logo.onclick = () => {
        window.location.href = 'http://BioMarket.com/index.php'
    }
</script>

<!-- d-flex justify-content-end -->