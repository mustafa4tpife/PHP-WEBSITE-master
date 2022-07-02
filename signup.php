<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="mustafa.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<?php

include_once("navigation.php");
navbar("signup.php", "fifth", ["Home", "About", "Contact", "Products", "Signup", "Cart"], "eng");
$servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "Mustafa";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
if ($_SESSION["login"]==true){
    header("Location:logout.php");
    die();
}
    if (isset($_POST["UserName"]) && isset($_POST['passwor_1'])) {


        $username = $_POST["UserName"];
        $password_1  = $_POST['passwor_1'];
        $password_2  = $_POST['password_2'];

     if ($_POST["passwor_1"] == $_POST["password_2"]) {

        $statement = $conn->prepare("INSERT INTO Users(UserName, UserPassword,Uservalue) VALUES (?,?,0)");
        $statement->bind_param("ss",$_POST["UserName"],$_POST["passwor_1"]);
        $result = $statement->execute();

            if ($result) {
                echo 'Your registration was successful!';
            } else {
                echo 'Something went wrong!';
            }
          
        $conn->close();
    }else {
        echo"Password doesnt match";
    }
    };

?>

<form method="POST">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="UserName" value="">
        </div>
        
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="passwor_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" >Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>

</body>

</html>