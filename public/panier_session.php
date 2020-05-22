<?php if(isset($_SESSION['email'])): ?>
    <div class="panier_session">
        <p class="produitBox">Produits&nbsp;<span class="article_num"><?php if(isset($_SESSION['panierNum'])){echo $_SESSION['panierNum'];}?> </span></p>
        <p class="totalBox">Total&nbsp;<span class="total"><?php if(isset($_SESSION['prixTotal'])){echo $_SESSION['prixTotal'];}?> </span>&nbsp;DH</p>
    </div>
<?php endif; ?>