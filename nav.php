<?php if (isset($_SESSION['id'])) { ?>

    <nav>
        <a href="post.php">publier</a>
        <p>
            <?php echo $_SESSION['pseudo'] ?>
        </p>
        <div>
            <img src="img/<?php echo $_SESSION['images']; ?>" alt="profil pic">
        </div>
        <form method="post">
            <button class="deconnexion" name="logout">Deconnexion</button>
        </form>

    </nav>
<?php } else { ?>

    <nav>
        <button><a href="connexion.php">Connexion</a></button>
    </nav>

<?php } ?>

<?php

if (isset($_POST['logout'])) {
    session_destroy();
    echo "<script> location.href='connexion.php'</script>";
}

?>