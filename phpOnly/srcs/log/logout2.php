<?PHP session_start();

if ($_POST['submit'] == "Yes")
{
	$_SESSION['flag_log'] = "KO";
	$_SESSION['logged_on_user'] = "";
	$_SESSION['last'] = "";
	$_SESSION['mail'] = "";
	header('Location: logout.php');
}
else
{
	$_SESSION['flag_log'] = "OK";
	header('Location: ../../index.php');
}

?>

