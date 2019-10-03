<?PHP session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>ʕ•ᴥ•ʔ BEER ʕ•ᴥ•ʔ</title>
  <link rel="stylesheet" type="text/css" href="../css/beershop.css">
  <meta name="google" content="notranslate"/>
  <link rel="icon" href="../../img/favicon.ico" type="image/x-icon">
</head>

<body>
  <div id="head">
	<a href="../../index.php"><img src="../../img/logo-beer.png"/></a>
	</div>


  <div id="menu">
  <ul>
	<li><a href="../whoweare.php">Who We Are?</a></li>
	<li><a href="../buy.php">Buy</a></li>

<?php
	if ($_SESSION['logged_on_user'] != "")
	{
		echo"<li><a href='my-page.php'>My Page</a></li>";
		echo"<li><a href='logout.php'>Log Out</a></li>";
	}
	else
	{
		echo"<li><a href='../be_a_member.php'>Be a Member!</a></li>";
		echo"<li><a href='login.php'>Log In</a></li>";
	}
?>
	<li><a href="../basket.php">Basket <?php
if (!$_SESSION['nb_articles'])
	$_SESSION['nb_articles'] = 0;
echo "(".$_SESSION['nb_articles'].")";?></a></li>

<?php
			if ($_SESSION['logged_on_user'] == "admin")
			{
      			echo"<li><a href='../admin/admin.php'>Admin</a></li>";
			}
?>


  </ul>
</div>
</body>
</html>


