

<!DOCTYPE html>
<html lang="en">

<head>

<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link href="main.css" rel="stylesheet">
<link href="mustafa.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<body>
    
    <?php include_once("conf.php");
include_once("navigation.php");
navbar("loginfr.php", "fifth", ["Home", "About", "Contact", "Products", "Signup", "Cart"], "eng");

$host = "localhost";
              $user = "root";
              $psw = "";
              $portNo = "3306";
              $database = "Mustafa";

              $connection = new mysqli($host, $user, $psw, $database, $portNo);

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

    $sqlInsert = $connection->prepare("SELECT Username,Orderid from Users join Orders using(Userid);");
    $sqlInsert->execute();
    $result = $sqlInsert->get_result();
    $flaguserfound = false;
    ?> <br><form method="POST"><select name="sell" > <?php  
  while ($row = $result->fetch_assoc()) {    ?>


  <option value="<?=$row["Orderid"]?>"><?=$row["Orderid"]?></option>
  

<br>

<?php
    } ?> </select><input type="submit" name="sho" value="Show order"></form> <?php  


}else print("Welcome normal user");
  $sqlInsert = $connection->prepare("SELECT UserName,Orderid,productsName,Numberofitems from Users join Orders using(UserId) join List using(Orderid) join Products using(productsID) where Orderid=?");
  $sqlInsert  ->bind_param("i",$_POST["sell"]);  
  $sqlInsert->execute();
    $result = $sqlInsert->get_result();
    while ($row = $result->fetch_assoc()) {
if (isset($_POST["sho"])) {
  print("Username: ".$row["UserName"])?> <br> <?php
  print("Product: ".$row["productsName"]);?> <br> <?php
  print("Quantity: ".$row["Numberofitems"]);?> <br> <?php

  
  
}
  


}
?>

<form method="post">
      <br>
      <button type="submit" name="logoutbutton">logout</button>
</form>

<?php

	if(isset(
		$_POST["pName"] ,
		$_POST["pImg"] ,
		$_POST["pPrice"] ,
		$_POST["lName"] ,
		$_POST["dName"]))
	{
		$statement = $conn->prepare("
			INSERT INTO products ( productsName, imgname, price ) VALUES ( ?,?,? );
			INSERT INTO descriptions (descriptionsname, productsid, langugesid) VALUES ( ?, 
				( SELECT productsID FROM products WHERE produtsName = ? ),
				( SELECT languagesid FROM languages WHERE languagesname = ? )
			);
		");

		$statement->bind_param("sss",
			$_POST["pName"] ,
			$_POST["pImg"] ,
			$_POST["pPrice"] ,
			$_POST["dName"] ,
			$_POST["pName"] , 
			$_POST["lName"]
		);

		if($statement->exute())
		{
			echo "...works";
		}

	}

?>

<form method="post">
	Product Name: <input type="text" name="pName"><br>
	Product Image: <input type="text" name="pImg"><br>
	Product Price: <input type="text" name="pPrice"><br>
	Language Name: <input type="text" name="lName"><br>
	Description Name: <input type="text" name="dName"><br>
	<input type="submit">
</form>
</body>
</html>
