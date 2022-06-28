<div class="bg"></div>
<?php
function navbar($URL, $activepage, $buttontexts,$languge)
{


?>
  <nav>
    <a class="lan" href="<?= $URL ?>">
      <img class="langugeimg" src="languge.jpg" alt="HTML tutorial">
    </a>


    <ul class="mainlinks">
      <li><a href="home<?=$languge?>.php" <?php if ($activepage == "main") {
                                  print("class='active'");
                                } ?>><?= $buttontexts[0] ?></a></li>
      <li><a href="about<?=$languge?>.php" <?php if ($activepage == "second") {
                                    print("class='active'");
                                  } ?>><?= $buttontexts[1] ?></a></li>
      <li><a href="contact<?=$languge?>.php" <?php if ($activepage == "third") {
                                      print("class='active'");
                                    } ?>><?= $buttontexts[2] ?></a></li>
      <li><a href="products<?=$languge?>.php" <?php if ($activepage == "fourth") {
                                      print("class='active'");
                                    } ?>><?= $buttontexts[3] ?></a></li>
     <li><a href="SignUpAndLogin<?=$languge?>.php" <?php if ($activepage == "fifth") {
                                      print("class='active'");
                                    } ?>><?= $buttontexts[4] ?></a></li>
      <li><a href="Cart<?=$languge?>.php" <?php if ($activepage == "sixth") {
                                      print("class='active'");
                                    } ?>><?= $buttontexts[5] ?></a></li>
  </ul>
  </nav>
<?php
}
?>