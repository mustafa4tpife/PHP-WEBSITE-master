<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="mustafa.css">
    
    <title>Document</title>
</head>
<body>
    <?php 
    include_once("navigation.php");
    navbar("CartFr.php", "sixth", ["home", "about", "contact", "products", "SignUpAndLogin","Cart"], "eng");
    
    $host = "localhost";
    $user = "root";
    $psw = "";
    $dbName = "mustafa";
    $portNo = "3306";
    $connection = new mysqli($host, $user, $psw, $dbName, $portNo);
    $count=0;
    $cartTotal = 0;
    foreach ($_SESSION["shopcart"] as $key => $value) {
        if ($value > 0) {
        $sqlStatement = $connection->prepare("SELECT * FROM products natural join descriptions where productsID=?");
        $sqlStatement->bind_param("i", $key);
        $sqlStatement->execute();
        $result = $sqlStatement->get_result();
        $row = $result->fetch_assoc();


        $totalitemprice = $row['price'] * $value;
        $cartTotal += $totalitemprice;

        
        if ($count == 0) {
            ?>
                  <div class="gamess">
                  <?php
                }
                  ?>
                 <div class="card">
                  <h1><?= $row["productsName"] ?></h1>
                  <a href="Showdetail.php?ProductId=<?= $row["prodid"] ?>&language=fr">
                    <img src="<?= $row["imgname"] ?>">
                  </a>
                  <p class="price"><?= $row["price"] ?>$</p>
                  <p class="gamed"><?= $row["descriptionsname"] ?> </p>
                  <form method="POST">
                    </form>
                  </div>
              <?php
                $count++;
                if ($count == 6) {
                  print("</div>");
                  $count = 0;
                }
              }
            }print("Your cart is".$cartTotal);
        ?>
</body>
</html>