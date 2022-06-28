<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="mustafa.css">
    <title>Document</title>
</head>
<body>
    <?php
    $activepage = "fourth";
    if (isset($_GET["ProductId"], $_GET["language"])) {
        include_once("navigation.php");
        if ($_GET["language"] == "fr") {
            $URL = "Productseng.php";
            $buttontexts = ["Accueil", "à propos", "Contact", "Produits", "inscription et connexion","Chariot"];
            $languge = "fr";
        }
        if ($_GET["language"] == "eng") {
            $URL = "Productsfr.php";
            $buttontexts = ["home", "about", "contact", "products","SignUpAndLogin","Cart"];
            $languge = "eng";
        }
        navbar($URL, "fourth", $buttontexts, $languge)
    ?>
        <?php
    }
    $count = 0;
    $host = "localhost";
    $username = "root";
    $psw = "";
    $database = "Mustafa";
  
    $connection = new mysqli($host, $username, $psw, $database);
  
    ?>
    <h1 class="gamed">
    <?php if ($_GET["language"] == "eng") {
        $sqlstatement = $connection->prepare("SELECT * FROM products natural join Descriptions where langugesid=1 and productsID=?");
        $sqlstatement->bind_param("i",$_GET["ProductId"]);
        $sqlstatement->execute();
        $result = $sqlstatement->get_result();
        while ($row = $result->fetch_assoc()) { 
                    print($row["descriptionsname"]);
                   ?> <img src="<?= $row["imgname"]?>"> <?php
        }
    }
        if ($_GET["language"] == "fr") {
            $sqlstatement = $connection->prepare("SELECT * FROM products natural join Descriptions where langugesid=2 and productsID=?");
            $sqlstatement->bind_param("i",$_GET["ProductId"]);
            $sqlstatement->execute();
            $result = $sqlstatement->get_result();
            while ($row = $result->fetch_assoc()) { 
                        print($row["descriptionsname"]);
                       ?> <img src="<?= $row["imgname"]?>"> <?php
            }
        }
        ?>
        </h1>

</body>
</html>