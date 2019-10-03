<?PHP session_start(); ?>
<?PHP include("header_admin.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <a href="admin.php" class="admin-users">Back to the options</a><br/><br/>
    <h2>List of User</h2>
    <?PHP

    $path = "../../private";
    $file = $path."/passwd";


    if (!file_exists($file))
    {
      echo "<p>No user found.</p>";
    }
    else
    {
      $unserialized = unserialize(file_get_contents($file));
      echo "<div id='tab-admin-beer'>";
      echo "<table>";
      echo "<tr>
      <th>Last Name</th>
      <th>First Name</th>
      <th>E-Mail</th>
      </tr>";
      foreach ($unserialized as $elem)
      {
        echo "<tr>
        <td>".$elem['last']."</td>
        <td>".$elem['first']."</td>
        <td>".$elem['mail']."</td>
        </tr>";
      }
      echo "</table>";
      echo "</div>";
    }
    ?>
    <br/>
    <h2>Add a User</h2>
    <div id="add-user">
      <br/><p> Provide information: </p>
      <br/>
    <form method="post" action="admin-add-user.php">
    	Last Name: <input type="text" name="last"/><br /><br />
      First Name : <input type="text" name="first"/><br /><br />
      E-Mail : <input type="text" name="mail"/><br /><br />
      Password : <input type="password" name="passwd1"/><br /><br />
      Confirm password : <input type="password" name="passwd2"/><br /><br />
    	<input type="submit" name = "submit" value="submit" />
    </form>
    </div>
    <?php
      if ($_SESSION['flagchamps'] == "ko")
      {
        echo "<p id='error'>Error 1: something wrong with db.\n</p>";
        $_SESSION['flagchamps'] = NULL;
      }
      else if ($_SESSION['flagmail'] == "ko")
      {
    	  echo "<p id='error'>Error 2: email already taken\n</p>";
        $_SESSION['flagmail'] = NULL;
      }
      else if ($_SESSION['flagpasswd'] == "ko")
      {
    	  echo "<p id='error'>Error 3: password not matching\n</p>";
        $_SESSION['flagpasswd'] = NULL;
      }
      else if ($_SESSION['flagcreation'] == "ok")
        {
          echo "<div id='inscription-ok'>Succes! Check the list of user</div>";
          $_SESSION['flagcreation'] = NULL;
        }

    ?>
	<br/><h2>Modify User Information</h2>


 <br/><p>Enter User information :</p><br/>
	<form method="post" action="admin-modif-users.php">
      Old E-Mail : <input type="text" name="mail"/><br/><br/>
      New E-Mail: <input type="text" name="newmail"/><br/><br/>
      Old Last Name : <input type="text" name="last"/><br/><br/>
      New Last Name : <input type="text" name="newlast"/><br/><br/>
      Old First Name : <input type="text" name="first"/><br/><br/>
      New First Name : <input type="text" name="newfirst"/><br/><br/>
        <input type="submit" name = "submit" value="submit" />
    </form>
 <?php
      if ($_SESSION['flag_modif_users'] == "KO")
      {
        echo "<p id='error'>Error 1: user information not found.\n</p>";
		$_SESSION['flag_modif_users'] = "";
		unset($_SESSION['flag_modif_users']);
	  }
	  else if ($_SESSION['flag_modif_users'] == "KO-OK")
      {
        echo "<p id='error'>Error 2: user information not matching\n</p>";
		$_SESSION['flag_modif_users'] = "";
		unset($_SESSION['flag_modif_users']);
	  }
	 else if ($_SESSION['flag_modif_users'] == "OK")
      {
          echo "<div id='inscription-ok'>Successfully modified. Check the list of User</div>";
		$_SESSION['flag_modif_users'] = "";
		unset($_SESSION['flag_modif_users']);
      }

    ?>



    <br/><h2>Delete a User</h2>
    <br/><p>Provide E-mail information for delete: </p>
    <form method="post" action="admin-delete-user.php">
      E-Mail: <input type="text" name="mail"/>
      <input type="submit" name = "submit" value="submit" />
    </form>

    <?php
    if ($_SESSION['no-user-to-delete'] == "ko")
    {
      echo "<p id='error'>Error : E-mail not found</p>";
      $_SESSION['no-user-to-delete'] = "";
    }
    else {

      if ($_SESSION['flag_suppression_user'] == "ok")
      {
        echo "<p id='inscription-ok'>Deletion successed</p>";
        $_SESSION['flag_suppression_user'] = "";
      }
      else if ($_SESSION['flag_suppression_user'] == "ko")
      {
        echo "<p id='error'>Error 2 : E-mail not found</p>";
        $_SESSION['flag_suppression_user'] = "";
      }
    }
    ?>
  </div>
</body>
<br/><br/><br/>

<footer>
</footer>
</html>

