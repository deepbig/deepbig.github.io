<?php include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>

<div id="content">

<?PHP

$file = "../db/serialized";
$unserialized = unserialize(file_get_contents($file));

$_SESSION['nb_articles'] = count($_SESSION['panier']);


if ($_SESSION['nb_articles'] != 0)
{
		$total = 0;
		echo "<table id='tab-admin-beer'>";
		echo "<tr><th>Product Name</th><th>Quantity</th><th>Price</th><tr/>";
		foreach ($_SESSION['panier'] as $elem)
		{
			$id = $elem - 1;
			echo "<tr><td>".$unserialized[$id][1]."</td><td>1</td><td>$".$unserialized[$id][3]."</td><tr/>";
			$total += $unserialized[$id][3];
		}

		echo "<tr><td></td><td>Total</td><td>$".$total."</td><tr/>";
		echo "</table>";



		if ($_SESSION['logged_on_user'] != "")
		{
			$_SESSION['historique'] = $_SESSION['panier'];
			unset($_SESSION['panier']);
			$_SESSION['nb_articles'] = 0;

			echo "<form action='log/my-page.php' method='post'>";
				echo "<input type='submit' name='account' value='buy' />";
			echo "</form>";
		}
		else if ($_SESSION['logged_on_user'] == "")
		{
			echo "<form action='be_a_member.php' method='post'>";
			echo "<p>Account does not exist. Please login or create account.</p>";
				echo "<input type='submit' name='no-account' value='Create Account' />";
			echo "</form>";
		}
}
else
{
	echo "<p>Your Basket is Empty</p>";
}
?>

</div>


</body>

<footer>

</footer>
</html>


