<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=web;charset=utf8', 'root', '');
if (!$_SESSION["email"] and !$_SESSION["password"]) {
    header("Location: index.html");
}

if (isset($_GET["id"]) and !empty($_GET["id"])) {
    $getId = $_GET["id"];
    $recupUser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $recupUser->execute(array($getId));
    if (isset($_POST["envoyer"])) {
        if ($recupUser->rowCount() > 0) {
            $message = htmlspecialchars($_POST["message"]);
            $insererMessage = $bdd->prepare('INSERT INTO message(message, id_destinataire, id_auteur)VALUES(?,?,?)');
            $insererMessage->execute(array($message, $getId, $_SESSION["id"]));
        } else {
            echo "Aucun utilisateur trouvé";
        }
    }
} else {
    echo "Aucun identifiant trouvé";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Message</title>
</head>

<body>
    <section id="message">
        <?php
        $recupMessage = $bdd->prepare('SELECT * FROM message WHERE id_destinataire = ? AND id_auteur = ? OR id_auteur =? AND id_destinataire = ?');
        $recupMessage->execute(array($getId, $_SESSION["id"], $getId, $_SESSION["id"]));
        while ($message = $recupMessage->fetch()) {
            if($_SESSION["id"]==$message["id_destinataire"]){
                ?>
                <div class="body1"> <p class="message1"><?php echo $message["message"] ?></p></div>
           
            <?php
            }else{
                
                ?>
                <div class="body2"> <p class="message2"><?php echo $message["message"] ?></p></div>
               
                <?php
            }
           
        }
       
        ?>
    </section>

    <form method="POST" action="">
        <textarea name="message" cols="30" rows="5"></textarea>
        <br><br>
        <input type="submit" name="envoyer">
    </form>

</body>

</html>