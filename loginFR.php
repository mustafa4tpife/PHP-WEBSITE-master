<?php


$username = "";
$errors   = array(); 

include_once("conf.php");
include_once("navigation.php");
navbar("login.php", "fifth", ["Accueil", "à propos", "Contact", "Produits", "inscription","Chariot"], "fr");

    


if (isset($_POST['UserName']) && isset($_POST['Password'])) {
   
    $username = $_POST["UserName"];
    $password = $_POST["Password"];

    $statement = $conn->prepare("SELECT * FROM Users WHERE UserName=? AND Password=?");
    $statement->bind_param("ss", $username, $password);
    $statement->execute();

    $result = $statement->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);

    if($data) {
        if ($row["usertype"] == 1){
        $_SESSION["Admin"] = true;}
        $_SESSION["login"] = true;
        $_SESSION["UserRole"] = $data[0];
        header("location: logoutfr.php");
    } else {
        $message = "Please enter a valid Username and Password";
echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>

<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link href="./main.css" rel="stylesheet">
<link href="./mustafa.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

   
<html>
    <body>

    <form method="post" action="login.php">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="UserName" value="">
        </div>
        
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="Password">
        </div>
        
        </div>
        <div class="input-group">
            <button type="submit" class="btn" >Login</button>
        </div>
        <p>
            Donet have account yet? <a href="signup.php">Sign in</a>
        </p>
    </form>
        </head>
    </body>
</html>
</body>