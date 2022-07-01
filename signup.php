<?php


include_once("conf.php");
include_once("navigation.php");
navbar("signupandloginfr.php", "fifth", ["home", "about", "contact", "products", "signup","Cart"], "eng");

if ($_SESSION["Admin"]==true){
    header("Location:logout.php");
    die();
}
    if (isset($_POST["UserName"]) && isset($_POST['passwor_1'])) {


        $username = $_POST["UserName"];
        $password_1  = $_POST['passwor_1'];
        $password_2  = $_POST['password_2'];

     if ($_POST["passwor_1"] == $_POST["password_2"]) {

        $statement = $conn->prepare("INSERT INTO Users (UserName, UserPassword,Uservalue) VALUES (?,?,0)");
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
<html>

<body>

    <head>

        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <link href="./main.css" rel="stylesheet">
        <link href="./mustafa.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>

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