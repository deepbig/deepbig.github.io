<?PHP session_start(); ?>
<?PHP


if ($_POST['first'] != "" && $_POST['first'] != "admin" 
	&& $_POST['last'] != "" && $_POST['last'] != "admin" 
	&& $_POST['mail'] != "" && $_POST['mail'] != "admin" 
	&& $_POST['submit'] == "submit")
{
 
		$crypt = file_get_contents("../../private/passwd");
		$un_crypt = unserialize($crypt);
		$i = 0;

		foreach ($un_crypt as $elem)
		{
			if ($elem['mail'] == $_POST['mail'] && $elem['last'] == $_POST['last'] && $elem['first'] == $_POST['first'])
			{
				$un_crypt[$i]['first'] = $_POST['newfirst'];
				$un_crypt[$i]['last'] = $_POST['newlast'];
				$un_crypt[$i]['mail'] = $_POST['newmail'];
				$crypt = serialize($un_crypt);
				file_put_contents("../../private/passwd", $crypt);
				$_SESSION['flag_modif_users'] = "OK";
				echo "<meta http-equiv='refresh' content='0,url=admin-users.php'>";
			}
			$i++;
		}
		$crypt = serialize($un_crypt);
		file_put_contents("../../private/passwd", $crypt);
		if ($_SESSION['flag_modif_users'] != "OK")
			$_SESSION['flag_modif_users'] = "KO";
		echo "<meta http-equiv='refresh' content='0,url=admin-users.php'>";

}
else
{
	$_SESSION['flag_modif_users'] = "KO";
	echo "<meta http-equiv='refresh' content='0,url=admin-users.php'>";
}
?>

