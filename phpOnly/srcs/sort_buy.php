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
        echo "<input type='checkbox' name='".$elem."'";
        if (array_key_exists($elem, $_POST))
        echo" checked='checked'";
        echo "> ".$elem."<br/>";
      }
    }
    echo "<input type='submit' name = 'submit' value='submit' />";
    echo "</form>";
    echo "</aside>";
    ?>


    <?PHP

    $db = unserialize(file_get_contents("../db/serialized"));
    if (isset($db) && $db != NULL)
    {
      foreach ($db as $key=>$value)
      {
        foreach ($_POST as $pkey => $pvalue) {
          if ($pkey == $value[2])
          $cat1[] = $db[$key];
        }
      }
      if (isset ($cat1) && $cat1 != NULL)
      {
        foreach ($cat1 as $key2=>$value2)
        {
          foreach ($_POST as $pkey2=>$pvalue2)
          {
            if ($pkey2 == $value2[3])
            $cat2[] = $cat1[$key2];
          }
        }
      }
    }

    if (isset($cat1) && $cat1 != NULL)
    {
      echo "<table id='boutique-beer'>";
      foreach ($cat1 as $beer)
      {
        echo "<tr><td class='last-beer'>".$beer[1]."</td></tr>";
        echo "<tr><td><img src='".$beer[5]."'/ style='width:100%;'></td><tr/>";
        echo "<tr><td class='acheter-beer'><a href='buy_check.php?beer=".$beer[0]."'>Click Here to Buy!</a></td></tr>";
      }
      echo "</table>";
    }
    else {
      echo "<p>Sorry! Product is not ready for the category! Please come back next time!</p>";
    }

    ?>
  </div>
</body>
<footer>
</footer>
</html>
