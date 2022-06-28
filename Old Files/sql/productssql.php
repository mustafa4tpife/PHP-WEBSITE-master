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
    $host ="localhost";
    $username ="root";
    $psw ="";
    $database ="Mustafa";

    $connection = new mysqli($host,$username,$psw,$database);

    $sqlstatement = $connection->prepare("SELECT * FROM products");
    

$sqlstatement->execute();

$result = $sqlstatement->get_result();
while ($row = $result->fetch_assoc()) {
    print $row["productsName"] .  $row["imgname"] . $row["price"] ;
}
?>
</body>
</html>