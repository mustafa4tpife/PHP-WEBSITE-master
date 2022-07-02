<!DOCTYPE html>
<html lang="en">

<head>
    <title>my wbsite</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="mustafa.css">

    
</head>

<body>
    <div class="bg"></div>
    <?php 
  
  include_once("navigation.php");
  navbar("contacteng.php", "third", ["Accueil", "à propos", "Contact", "Produits", "inscription","Chariot"], "fr");
  ?>
    
    <div class="form-style-5">
        <form>
        <fieldset>
        <legend><span class="number">1</span> Info Candidat</legend>
        <input type="text" name="field1" placeholder="Votre Nom *">
        <input type="email" name="field2" placeholder="Votre Email *">
        <textarea name="field3" placeholder="A propos de toi"></textarea>
        <label for="job">Intérêts:</label>
        <select id="job" name="field4">
        <optgroup label="À l'intérieur">
          <option value="pisciculture">pisciculture</option>
          <option value="lecture à faire">lecture à faire</option>
          <option value="boxe">boxe</option>
          <option value="débat">débat</option>
          <option value="gaming">Gaming</option>
          <option value="billard">billard</option>
          <option value="autre_intérieur">autre</option>
        </optgroup>
        <optgroup label="En plein air">
          <option value="football">Football</option>
          <option value="la natation">la natation</option>
          <option value="pêche">pêche</option>
          <option value="escalade">escalade</option>
          <option value="cyclisme">cyclisme</option>
          <option value="autre_extérieur">autre</option>
        </optgroup>
        </select>      
        </fieldset>
        <fieldset>
        <legend><span class="number">2</span> Information Additionnelle</legend>
        <textarea name="field3" placeholder="À propos de votre école"></textarea>
        </fieldset>
        <input type="submit" value="Appliquer" />
        </form>
        </div>

</body>
</html>