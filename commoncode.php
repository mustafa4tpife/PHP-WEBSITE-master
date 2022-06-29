<?php
session_start();
if(!isset($_SESSION["userloggedin"]))
{

$_SESSION["userloggedin"]=false;

}
$host = "localhost";
$username = "root";
$psw = "";
$database = "Mustafa";
$connection = new mysqli($host, $username, $psw, $database);
if(isset($_POST["user"])){
$sqlsearchuser = $connection->prepare("SELECT * from users where usename = ?");
$sqlsearchuser->bind_param("s",$_POST["user"]);
$sqlsearchuser->execute();
$result = $sqlsearchuser->get_result();
if($result->num_rows>0){
    $_SESSION["userloggedin"] = true;
    $_SESSION["User"] = $_POST["User"];
}
else
{
    print("your name is not in our DB");
}
}
if(isset($_POST["logout"]))
{
    session_unset();
    session_destroy();
    header("refresh:0");
}




if($_SESSION["userloggedin"])
{
    print("welcome".$_SESSION["user"]);
    // user logour button
    ?>
    <form method="POST">

<input type="submit" name="logout" >

</form>
<?php
}
else{

}

?>

<form method="POST">
<input type="text" name="User" >
<input type="submit" name="login" >

</form>