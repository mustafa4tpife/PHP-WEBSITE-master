<!DOCTYPE html>
<html lang="en">

<head>
    <title>my website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="mustafa.css">

    
</head>

<body>
    <div class="bg"></div>
    <?php 
    

    include_once("navigation.php");
    navbar("homeeng.php","main",["Home", "About", "Contact", "Products", "Signup", "Cart"], "eng");
  ?>
    <div class="text-center">
        
        <img src="Assets/iraqflag.jpg"  alt="Cinque Terre" width="404" height="336">

    </div>

    <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">

            welcome to my home page
        </div>
    </div>
</body>
</html>