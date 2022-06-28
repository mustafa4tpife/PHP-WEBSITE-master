<?php
session_start();
if (!isset($_SESSION["userin"])) {
    $_SESSION["userin"] = false;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST["login"], $_POST["username"])) {
print($_POST["username"]);
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["userin"] = true;
    }

    if (isset($_POST["logout"])) {


        $_SESSION["userin"] = false;
    }
    if ($_SESSION["userin"]) {
        print($_SESSION["username"]);
    ?>
        <form method="post">
            <input type="text" name="username" name="logout">
        </form>
    <?php
    } else {


    ?>
        <form method="post">
            <input type="text" name="username">
            <input type="submit" name="login" value="login">


        </form>
    <?php } ?>
</body>

</html>