
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

$username = "";
$errors   = array(); 


include_once("conf.php");
include_once("navigation.php");
navbar("loginfr.php", "fifth", ["Home", "About", "Contact", "Products", "Signup", "Cart"], "eng");

    


if (isset($_POST['UserName']) && isset($_POST['Password'])) {
   
    $username = $_POST["UserName"];
    $password = $_POST["Password"];

    $statement = $conn->prepare("SELECT * FROM Users WHERE UserName=?");
    $statement->bind_param("s", $username);
    $statement->execute();

    $result = $statement->get_result();

    if($data = $result->fetch_assoc()) {
        if ($data["uservalue"] == 1){
        $_SESSION["Admin"] = true;}
        $textt = "logout";
        $_SESSION["login"] = true;
        $_SESSION["UserRole"] = $data[0];
        header("location: logout.php");
    } else {
        $message = "Please enter a valid Username and Password";
echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>

<?php print_r($_SESSION["Admin"]); ?>
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
            Donet have account yet? <a href="signup.php">Sign up</a>
        </p>
    </form>
        </head>
    </body>
</html>
</body>