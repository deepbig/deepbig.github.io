<?PHP session_start(); ?>
<?PHP include("header_log.php"); ?>
<!DOCTYPE html>
<html>
<body>

<br />
<div id='content' id="login"><center>

	<form action="login2.php" method="post">
		E-mail Address : <input type="text" name="mail" value="" />
		<br />
		Password :  <input type="password" name="passwd" value="" />
		<br />
		<input type="submit" name="submit" value="OK" />
	</form>
<?PHP
	if ($_SESSION['flag_log'] == "OK" && $_SESSION['mail'] != NULL)
	{
		echo "<p id='inscription-ok'>\n Great to See you, ".$_SESSION['logged_on_user']."!\n</p>";
		echo "<p><a href=../boutique.php>Click here for today's shopping!</a>\n</p>";
		$_SESSION['flag_log'] = "";
	}
	else if ($_SESSION['flag_log'] == "KO")
	{
		echo "<p id='error'>Log in failed... Dou you have an account?\n</p>";
		echo "<p><a href=../be_a_member.php>Click here if you want to create an account!</a>\n</p>";
		$_SESSION['flag_log'] = "";
	}
?>
</center></div>



</body>

<footer>

</footer>
</html>

