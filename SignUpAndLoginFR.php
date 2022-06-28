<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="mustafa.css">
    <title>Document</title>
</head>

<body>
    <div class="bg"></div>
    <?php

    include_once("navigation.php");
    navbar("signupandlogineng.php", "fifth", ["Accueil", "à propos", "Contact", "Produits", "inscription et connexion","Chariot"], "fr");
    ?>

<h1 style="color:red ;">Formulaire inscription de utilisateur.</h1>
Veuillez remplir ce qui suit pour vous inscrire sur notre site Web:

<?php
if (isset($_POST["UsersName"] ,$_POST["Psw"])) {
if ($_POST["Psw"]== $_POST["confirmpsw"]) {
    $host="localhost";
    $user="root";
    $psw="";
    $portNo="3306";
    $database="Shop";

    $connection = new mysqli($host,$user,$psw,$database,$portNo);
    $sqlInsert = $connection->prepare("INSERT INTO USERS(UserName,UserPassword) Values(?,?)");
    $sqlInsert->bind_param("ss",$_POST["UsersName"],$_POST["Psw"]);
    if(!$sqlInsert->execute()){
    print("user already exist");
    } else {
        print("welcome");
    }
    
} else {
    print("password dont match");
}
}
?>


    <form method="POST">
     <input type="text" name="UsersName" placeholder="username">
     <input type="password" name="Psw" placeholder="password" >
     <input type="password" name="confirmpsw" placeholder=" rewrite password" >
    <input type="submit" name="Go" value="Registre">
    </form>
</body>

</html>