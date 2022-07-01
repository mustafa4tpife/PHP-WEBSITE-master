

<!DOCTYPE html>
<html lang="en">

<head>

<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link href="./main.css" rel="stylesheet">
<link href="./mustafa.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<body>
    
    <?php include_once("conf.php");
include_once("navigation.php");
navbar("loginfr.php", "fifth", ["home", "about", "contact", "products", "signup","Cart"], "eng");

  if ($_SESSION["login"] == true) {
    if (isset($_POST["logoutbutton"])) {
      session_unset();
      session_destroy();
      header("Location:signup.php");
      die();
    }
  } 
if ($_SESSION["Admin"]==true){
    print("Welcome Admin");

}else print("Welcome normal user");?>
<form method="post">
      <br>
      <button type="submit" name="logoutbutton">logout</button>
    </form>

</body>
</html>