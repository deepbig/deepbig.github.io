<?PHP session_start(); ?>
<?PHP include("header_log.php"); ?>
<!DOCTYPE html>
<html>
<body>

<div id='content'>
<h3>Hello <?php echo $_SESSION['logged_on_user'] ?>! Here is the Information of your Account:</h3>
<br />
<p>Last Name: <?php echo $_SESSION['last'] ?></p>
<p>First Name: <?php echo $_SESSION['logged_on_user'] ?></p>
<p>E-Mail Address: <?php echo $_SESSION['mail'] ?></p>
<br />


<p>My Order history:</p>
<?PHP
if ($_POST['account'] == "buy" || ((count($_SESSION['historique'])) != 0))
{
	$file = "../../db/serialized";
	$unserialized = unserialize(file_get_contents($file));

	$_SESSION['nb_articles'] = count($_SESSION['historique']);


	if ($_SESSION['nb_articles'] != 0)
	{
		$total = 0;
		echo "<table id='tab-admin-beer'>";
		echo "<tr><th>Product Name</th><th>Quantity</th><th>Price</th><tr/>";
		foreach ($_SESSION['historique'] as $elem)
		{
			$id = $elem - 1;
			echo "<tr><td>".$unserialized[$id][1]."</td><td>1</td><td>$".$unserialized[$id][3]."</td><tr/>";
			$total += $unserialized[$id][3];
		}

		echo "<tr><td></td><td>Total</td><td>$".$total."</td><tr/>";
		echo "</table>";
		$_SESSION['nb_articles'] = 0;

	}
	else
	{
	echo "<p>Basket is empty</p>";
	}

}
else
{
	echo"<p>No Order</p>";
}

?>



<br />
<p><a href="del-page.php" >Delete Account</a></p>
</div>



</body>

<footer>

</footer>
</html>

