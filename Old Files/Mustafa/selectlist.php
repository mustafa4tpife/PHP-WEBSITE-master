<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<select id="selectID">
    <?php
    $arr=[1=>"bluebox", 2=>"redbox",3=>"yell"];
    foreach ( $arr as $key => $value) {
        print (  "<option value=".$key. ">" . $value."</option>");
        
       
        
        
    }
    

    ?>
     </select>


        

        

   
</body>

</html>