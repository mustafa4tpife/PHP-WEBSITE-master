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
    navbar("CartFr.php", "sixth", ["Home", "About", "Contact", "Products", "Signup", "Cart"], "eng");
    
    $host = "localhost";
    $user = "root";
    $psw = "";
    $dbName = "mustafa";
    $portNo = "3306";
    $connection = new mysqli($host, $user, $psw, $dbName, $portNo);
    $count=0;
    $cartTotal = 0;


if (isset($_POST["remfromcart"])) {
    if (isset($_SESSION["shopcart"][$_POST["buyprod"]]))
        $_SESSION["shopcart"][$_POST["buyprod"]]--;
    else {
        $_SESSION["shopcart"][$_POST["buyprod"]] = 1;
    }
}

if (isset($_POST["buyall"]))
{
    if(count($_SESSION["shopcart"])==0)
    {
        print("cant order empty");
    }
    else {
        $uniqeorder = time().$_SESSION["User"];
        $sqlStatement = $connection->prepare("INSERT into Orders(Orderid,UserId) VALUES(?,?)");
        $sqlStatement->bind_param("si",$uniqeorder,$_SESSION["Userid"]);
        $sqlStatement->execute();
    
        foreach ($_SESSION["shopcart"] as $key => $value) {
        $sqlStatement = $connection->prepare("INSERT into List(productsID,Numberofitems,Orderid) VALUES(?,?,?)");
        $sqlStatement->bind_param("iis", $key,$value,$uniqeorder);
        $sqlStatement->execute();
        }

        $_SESSION["shopcart"] = array();    
    }
}
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
                    <img src="Assets/<?= $row["imgname"] ?>">
                  </a>
                  <p class="price"><?= $row["price"] ?>$</p>
                  <p class="price">You have: <?= $value ?> in the cart</p>
                  <p class="gamed"><?= $row["descriptionsname"] ?> </p>
                  
                  <form method="POST">
                  <input type="hidden" name="buyprod" value='<?= $row["productsID"] ?>'>
                    <input type="submit" name="remfromcart" value='-1'>
                    </form>
                  </div>
              <?php
                $count++;
                if ($count == 6) {
                  print("</div>");
                  $count = 0;
                }
              }
            } ?> <form method="POST"><input type="submit" name="buyall" value='Finish order'> </form><?php  
            print("Your cart total is ".$cartTotal."$"  );
        ?>
</body>
</html>