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
$data = array("1"=>"dacia","2"=>"volvo","3"=>"bmw")


?>
    <select name="cars">
<?php 
        foreach($data as $key => $value)
      {            
?>

<option value="1">dacia </option>
<option value="2">volvo </option>
<option value="3">bmw </option>

<?php

        }
?>
</select>
</body>
</html>