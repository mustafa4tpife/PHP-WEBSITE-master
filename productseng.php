<!DOCTYPE html>
<html lang="en">

<head>
  <title>my page </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="mustafa.css">



</head>



<body>
  <?php

include_once("navigation.php");
navbar("productsFr.php", "fourth", ["Home", "About", "Contact", "Products", "Signup", "Cart"], "eng");
  ?>
  <?php
  $count = 0;

  $host = "localhost";
  $username = "root";
  $psw = "";
  $database = "Mustafa";

  $connection = new mysqli($host, $username, $psw, $database);

  $sqlstatement = $connection->prepare("SELECT * FROM products natural join Descriptions where langugesid=1");

  
    if (isset($_POST["addtocart"]))
        if (isset($_SESSION["shopcart"][$_POST["buyprod"]]))
            $_SESSION["shopcart"][$_POST["buyprod"]]++;
        else {
            $_SESSION["shopcart"][$_POST["buyprod"]] = 1;
        }


  $sqlstatement->execute();

  $result = $sqlstatement->get_result();
  while ($row = $result->fetch_assoc()) { 

    if ($count == 0) {
  ?>
        <div class="gamess">
        <?php
      }
        ?>
       <div class="card">
        <h1><?= $row["productsName"] ?></h1>
        <a href="Showdetail.php?ProductId=<?= $row["prodid"] ?>&language=fr">
          <img src="Assets/<?= $row["imgname"] ?>">
        </a>
        <p class="price"><?= $row["price"] ?>$</p>
        <p class="gamed"><?= $row["descriptionsname"] ?> </p>
        <form method="POST">
                <input type="hidden" name="buyprod" value='<?= $row["productsID"] ?>'>
                <input type="submit" name="addtocart" value='buy'>
          </form>
        </div>
    <?php
      $count++;
      if ($count == 6) {
        print("</div>");
        $count = 0;
      }
    }
  
    ?>
</body>

</html>