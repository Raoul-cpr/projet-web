<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=web;charset=utf8', 'root', '');

    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $user = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $user->execute(array($_POST["email"]));
        if($user->rowCount()>0 and password_verify($_POST["password"], $hashed_password)){
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["password"] =  $hashed_password;
           // $_SESSION["nom"] = $user->fetch()["nom"];
            $_SESSION["id"] = $user->fetch()["id"];
         header("Location: index.php");
        }else{
            echo" Aucun utilisateur trouvé";
        }    
}else{
    echo"Les Champs sont vides";
} 
?>
