<?php
//session_start();
?>
<div id="sessionBar">
    <?php
    if (isset($_SESSION['email'])) {
        echo "<p>" . $_SESSION['email'] . "</p>";
        echo "<a href='/App/logout.php'>Logout</a>";
    } else {
        echo "<p>Non connecté</p>";
    }
    ?>
</div>