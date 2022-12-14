<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=web;charset=utf8', 'root', '');

if (!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["nom"])) {
    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $user = $bdd->prepare('INSERT INTO users (email, password, nom) VALUES (?, ?, ?)');
    $user->execute(array($_POST["email"],$hashed_password, $_POST["nom"]));
    $recupUser = $bdd->prepare('SELECT * FROM users WHERE email=? AND password=? AND nom=?');
    $recupUser->execute(array($_POST["email"], $hashed_password, $_POST["nom"]));
    if ($recupUser->rowCount() > 0) {
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] =$hashed_password;
        $_SESSION["id"] = $recupUser->fetch()["id"];
       // $_SESSION["nom"] = $recupUser->fetch()["nom"];
        header("Location: index.php");
    }else{
        echo "Aucun utilisateur trouvé";
    }
} else {
    header("Location: inscription.html");
    echo "Remplissez tous les champs";
}
