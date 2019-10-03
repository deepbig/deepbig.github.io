<?PHP session_start(); ?>
<?php  include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>

<div id="form_css">
  <p> Please Type your User information: </p>
  <br/>
<form method="post" action="check-be_a_member.php">
	Lsat Name: <input type="text" name="last"/><br /><br />
  First Name : <input type="text" name="first"/><br /><br />
  E-Mail Address : <input type="text" name="mail"/><br /><br />
  Password : <input type="password" name="passwd1"/><br /><br />
  Confirm Password : <input type="password" name="passwd2"/><br /><br />
	<input type="submit" name = "submit" value="submit" />
</form>
</div>
</body>
</html>
<?php
  if ($_SESSION['flagchamps'] == "ko")
  {
    echo "<p id='error'>Error : Something is wrong with db.\n</p>";
    $_SESSION['flagchamps'] = NULL;
  }
  else if ($_SESSION['flagmail'] == "ko")
  {
	  echo "<p id='error'>Error 1: E-mail already exist\n</p>";
    $_SESSION['flagmail'] = NULL;
  }
  else if ($_SESSION['flagpasswd'] == "ko")
  {
	  echo "<p id='error'>Error 2: password not matching\n</p>";
    $_SESSION['flagpasswd'] = NULL;
  }
  else if ($_SESSION['flagcreation'] == "ok")
    {
      echo "<div id='inscription-ok'>Success! Thank you for being a member!</div>";
      $_SESSION['flagcreation'] = NULL;
    }

?>

