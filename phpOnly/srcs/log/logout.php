<?PHP session_start(); ?>
<?PHP include("header_log.php"); ?>
<!DOCTYPE html>
<html>
<body>
	<!-- Deonnexion -->
	<div id='content'><center>
	<form action="logout2.php" method="post">
		<h3>Are you sure you want to log out?</h3>
		<input type="submit" name="submit" value="Yes" />
		<input type="submit" name="submit" value="No" />
	<center></form>
	<?PHP

		if ($_SESSION['flag_log'] == "KO" && $_SESSION['logged_on_user'] == NULL)
		{
			echo "<p id='inscription-ok'>\nLog out Success!\n</p>";
			$_SESSION['flag_log'] = "";
		}
		else if ($_SESSION['flag_log'] = "OK" && $SESSION['logged_on_user'] != NULL)
		{
			echo "<p id='inscription-ok'>\nLog out Fail... Sorry!\n</p>";
			$_SESSION['flag_log'] = "";
		}
	?>
	</div>
</body>

<footer>

</footer>
</html>

