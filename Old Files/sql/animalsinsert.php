<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create new animals into the database</title>
</head>

<body>
    <?php

    $host = "localhost";
    $username = "root";
    $psw = "";
    $database = "animalsinsert";

    $connection = new mysqli($host, $username, $psw, $database);
    if (isset($_POST["newanimal"])) {
        //print "you want to insert ".$_POST["newanimal"]." into the database";
        $sqlstatement = $connection->prepare("INSERT INTO animals(animalsName,contienent) VALUES(?,?)");
        $sqlstatement->bind_param("ss", $_POST["newanimal"],$_POST["continentofanaimal"]);
        if (!$sqlstatement->execute()) {
            print "we did not insert an animal into the data base<br>";
        } else {
            print "we inserted an animal into the databse<br>";
        }
        //$result = $sqlstatement->get_result();

    }



    $sqlstatement = $connection->prepare("SELECT * FROM animals");


    $sqlstatement->execute();

    $result = $sqlstatement->get_result();
    $numberofanimals = $result->num_rows;
    if ($numberofanimals == 0) {
        print "NO ANIMALS WERE FOUND";
    } else {
        while ($row = $result->fetch_assoc()) {
            print $row["animalsName"] . "lives is " . $row["contienent"];
        }
    }

    ?>
    <form method="post">

        <input name="newanimal">
        <select name="continentofanaimal">
            <option>europe</option>
            <option>africa</option>
            <option>america</option>
            <option>asia</option>
            <option>antartica</option>
            <option>australia</option>
        </select>
        <input type="submit" value="go">
    </form>

</body>

</html>