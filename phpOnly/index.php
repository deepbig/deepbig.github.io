<?PHP
session_start();
//include("install.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>ʕ•ᴥ•ʔ BEER ʕ•ᴥ•ʔ</title>
  <link rel="stylesheet" type="text/css" href="srcs/css/beershop.css">
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <meta name="google" content="notranslate"/>
</head>

<body>
  <div id="head">
    <a href="index.php"><img src="img/logo-beer.png"/></a>
  </div>


  <div id="menu">
    <ul>
      <li><a href="srcs/whoweare.php">Who We Are?</a></li>
      <li><a href="srcs/buy.php">Buy</a></li>

<?php
	if ($_SESSION['logged_on_user'] != "")
	{
		echo"<li><a href='srcs/log/my-page.php'>My Page</a></li>";
		echo"<li><a href='srcs/log/logout.php'>Log Out</a></li>";
	}
	else
	{
		echo"<li><a href='srcs/be_a_member.php'>Be a Member!</a></li>";
		echo"<li><a href='srcs/log/login.php'>Sign in</a></li>";
	}
?>

	  <li><a href="srcs/basket.php">Basket <?php
        if (!$_SESSION['nb_articles'])
          $_SESSION['nb_articles'] = 0;
		echo "(".$_SESSION['nb_articles'].")";?></a></li>

<?php
			if ($_SESSION['logged_on_user'] == "admin")
			{
      			echo"<li><a href='srcs/admin/admin.php'>Admin</a></li>";
			}
?>
    </ul>
  </div>

  <div id="content">

    <br/>
		<a href="srcs/buy.php"><h3>ʕ•ᴥ•ʔ Welcome to the BEER WORLD ʕ•ᴥ•ʔ</h3></a>

    <p align=center>Do you know there are 101 different kinds of BEER ʕ•ᴥ•ʔ in the world? ʕ•ᴥ•ʔ</p>

		<a href="srcs/buy.php"><img class="background" src="https://www.collegecitybeverage.com/wp-content/uploads/2015/04/Beer-types.jpg" alt="Beer kinds" title="Click here to explore!"/></a>

<br />
<br />
<br />
<br />
<br />
        </div>

      </body>

      <footer>

      </footer>
      </html>

