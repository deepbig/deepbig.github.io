<?php  include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    
    <?PHP
    $path = "../private";
    $file = $path."/categories";
    $unserialized = unserialize(file_get_contents($file));
  echo "<h2>DRINK BEER ʕ•ᴥ•ʔ FOREVER</h2>";
  echo "<aside class='category'>";
  echo "<h3>Category</h3>";
  echo "<form method='post' action='sort_buy.php'>";
  foreach ($unserialized as $key=>$value)
  {
    foreach ($value as $elem)
    {
      echo "<input type='checkbox' name='".$elem."' checked='checked'> ".$elem."<br/>";
  }
}
  echo "<input type='submit' name = 'submit' value='submit' />";
  echo "</form>";
  echo "</aside>";
  ?>

  <?PHP

  $db = unserialize(file_get_contents("../db/serialized"));
  // print_r ($bdd);
  echo "<table id='boutique-beer'>";
  foreach ($db as $beer)
  {
    echo "<tr><td class='last-beer'>".$beer[1]."</td></tr>";
    echo "<tr><td><img src='".$beer[5]."'/ style='width:100%;'></td><tr/>";
    echo "<tr><td class='acheter-beer'><a href='buy_check.php?beer=".$beer[0]."'>Click Here to Buy!</a></td></tr>";
  }
  echo "</table>";

  ?>
</div>
</body>
<footer>
</footer>
</html>

