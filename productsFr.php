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
  navbar("productseng.php", "fourth", ["Accueil", "à propos", "Contact", "Produits", "inscription et connexion","Chariot"], "fr");
  ?>
 <?php
    include_once("commoncode.php")
     ?>
  <?php
  $count = 0;

  $host = "localhost";
  $username = "root";
  $psw = "";
  $database = "Mustafa";

  $connection = new mysqli($host, $username, $psw, $database);

  $sqlstatement = $connection->prepare("SELECT * FROM products natural join Descriptions where langugesid=2");


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
        <a href="Showdetail.php?ProductId=<?= $row["prodid"] ?>&language=eng">
          <img src="<?= $row["imgname"] ?>">
        </a>
        <p class="price"><?= $row["price"] ?></p>
        <p class="gamed"><?= $row["descriptionsname"] ?> </p>
        <p><button>ajouter</button></p>
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