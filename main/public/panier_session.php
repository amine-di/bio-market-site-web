<?php if (isset($_SESSION['email'])) : ?>
    <a href="../views/panier.php">
        <div class="panier_session">
            <p class="produitBox">

                <body>
                    <img src="../images/cart.svg" width="30px">
                </body>&nbsp;<span class="article_num"><?php if (isset($_SESSION['panierNum'])) {
                                                            echo '<strong>' . $_SESSION['panierNum'] . '</strong>';
                                                        } ?> </span>
            </p>
            <p class="totalBox">&nbsp;<span class="total"><?php if (isset($_SESSION['prixTotal'])) {
                                                                echo $_SESSION['prixTotal'];
                                                            } ?> </span>&nbsp;DH</p>
        </div>
    </a>
<?php endif; ?>