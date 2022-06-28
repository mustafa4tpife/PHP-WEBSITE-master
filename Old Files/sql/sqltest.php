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

    $host="localhost";
    $user="root";
    $psw="";
    $portNo="3306";
    $database="promos";
 


    $connection = new mysqli($host,$user,$psw,$database,$portNo);
    if (isset($_POST["UsersName"])) {
     
        $sqlstatement = $connection->prepare("INSERT INTO PPL(UsrName,money) VALUES(?,0)");
        $sqlstatement->bind_param("s", $_POST["UsersName"]);
        if (!$sqlstatement->execute()) {
            print "we did not insert a username<br>";
        } else {
            print "we inserted a username<br>";
        }
      

    }



    $sqlstatement = $connection->prepare("SELECT * FROM PPL");


    $sqlstatement->execute();

    $result = $sqlstatement->get_result();
    
   
?>


    <form method="POST">
     <input type="text" name="UsersName" placeholder="username">
     
    <input type="submit" name="Go" value="Register/login">
    </form>
</body>
</html>