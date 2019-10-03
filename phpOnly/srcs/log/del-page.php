<?PHP session_start(); ?>
<?PHP include("header_log.php"); ?>
<?PHP

		$crypt = file_get_contents("../../private/passwd");
		$un_crypt = unserialize($crypt);
		$i = 0;

		foreach ($un_crypt as $elem)
		{
			if ($elem['last'] == $_SESSION['last'] 
				&& $elem['logged_on_user'] == $_SESSION['first'] 
				&& $elem['mail'] == $_SESSION['mail'])
			{
				$_SESSION['flag_log'] = "KO";
				$_SESSION['logged_on_user'] = "";
				$_SESSION['last'] = "";
				$_SESSION['mail'] = "";
				$_SESSION['passwd'] = "";
				unset($un_crypt[$i]);
				$un_crypt = array_values($un_crypt);
				$crypt = serialize($un_crypt);
				file_put_contents("../../private/passwd", $crypt);
				echo "<p id='inscription-ok'>\nYour account has been successfully deleted.</p>";
			}
			$i++;
		}
?>

