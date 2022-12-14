<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=web;charset=utf8', 'root', '');
if (!$_SESSION["email"] && !$_SESSION["password"]) {
    header("Location: index.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Message</title>
</head>

<body>
    <section align="center">
        <?php
        ?>
        <h3>

            <?php echo $_SESSION["email"] ?>
        </h3>

        <p>Utiliateur inscrit </p>

        <p>Cliqué pour discuter </p>
        <br>
        <?php

        $users = $bdd->query('SELECT * FROM users');
        while ($user = $users->fetch()) {
        ?>
            <a href="message.php?id=<?php echo $user["id"]; ?>">
                <p><?php echo $user["nom"] ?></p>
            </a>
        <?php
        }
        ?>
        <br>
        <p align="center"><a href="logout.php">Se deconnecter</a></p>

    </section>

</body>

</html>