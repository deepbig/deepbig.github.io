<?php  include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <h2>Product Information</h2>

    <?PHP
    $db = unserialize(file_get_contents("../db/serialized"));
    $flag = 0;
    $id = $_GET[beer] - 1;
    foreach ($db as $value)
    {
        if ($value[0] == $_GET[beer])
          $flag = 1;
    }
    if (isset($_GET[beer]) && $_GET[beer] != NULL &&
    $_GET[beer] >= 0 && is_numeric($_GET[beer]) && $flag == 1)
    {
      echo "<a href='boutique.php' class='admin-users'>Return to the list</a><br/><br/>";
      echo "<table id='page-beer' align='center'>";
      echo "<tr><td class='last-beer'>".$db[$id][1]."</td><tr/>";
      echo "<tr><td><img src='".$db[$id][5]."'/ style='width:100%;'></td><tr/>";
      echo "<tr><td>Category : ".$db[$id][2]."</td><tr/>";
      echo "<tr><td>Price : $".$db[$id][3]."</td><tr/>";
      echo "<tr><td>Volume : ".$db[$id][4]."</td><tr/>";
	  echo "<tr><td><a href='add_basket.php?beer=".$db[$id][0]."'>Click Here to move Basket!!</a></td><tr/>";
      echo "</table>";
    }
    else {
      echo "<meta http-equiv='refresh' content='0,url=boutique.php'>";
      exit();
    }
    ?>
  </div>
</body>
<footer>
</footer>
</html>

