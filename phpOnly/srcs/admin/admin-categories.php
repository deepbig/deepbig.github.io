<?PHP session_start(); ?>
<?PHP include("header_admin.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <a href="admin.php" class="admin-users">Back to the list</a><br/><br/>
    <h2>List of Categories</h2>

    <?PHP
    $path = "../../private";
    $file = $path."/categories";
    if (!file_exists($file))
    {
      echo "<p>Categories does not exist!</p>";
    }
    else
    {
      $unserialized = unserialize(file_get_contents($file));

      $cat1 = $unserialized[cat1];
      echo "<div id='tab-admin-beer'>";
      echo "<table>";
      echo "<tr>
      <th>Category: Types</th>
      </tr>";
      foreach ($cat1 as $cat1_elem)
      {
        echo "<tr>
        <td>".$cat1_elem."</td>";
      }
      echo "</table>";
      echo "</div><br/><br/>";

      echo "<div id='tab-admin-beer'>";
      echo "<table>";
      echo "<tr>";
    }
    ?>
    <br/>
    <h2>Add Category</h2>
    <div id="add-user">
      <br/><p> Fill out category information you want to add :</p>
      <br/>
      <form method="post" action="admin-add-category.php">
        Category Name : <input type="text" name="category"/>
        <input type="submit" name = "submit" value="submit" />
      </form>
    </div>
  <?PHP
    if ($_SESSION['category-create'] == "ko")
    {
    echo "<p id='error'>Error : Category already exists!</p>";
    $_SESSION['category-create'] = NULL;
    }
    else if ($_SESSION['flag-creation-cat'] == "ok")
    {
    echo "<p id='inscription-ok''>Success! Check the list of Category!</p>";
    $_SESSION['flag-creation-cat'] = NULL;
    }
?>

<br/><h2>Modify Category</h2>

<br/><p>Fill out category information you want to modify :</p>
<form method="post" action="admin-modif-category.php">
  Old Category Name : <input type="text" name="old-category"/><br/><br/>
  New Category Name : <input type="text" name="new-category"/><br/><br/>
  <input type="submit" name = "submit" value="submit" />
</form>
<?PHP
  if ($_SESSION['category-modif'] == "ko")
  {
  echo "<p id='error'>Error : Name already exist!</p>";
  $_SESSION['category-modif'] = NULL;
  }
  else if ($_SESSION['flag-modif-cat'] == "ok")
  {
  echo "<p id='inscription-ok''>Success! Check the list of Category!</p>";
  $_SESSION['flag-modif-cat'] = NULL;
  }
?>

<br/><h2>Delete Category</h2>
<br/><p>Fill out category information you want to delete :</p>
<form method="post" action="admin-delete-category.php">
  Category Name : <input type="text" name="category"/>
  <input type="submit" name = "submit" value="submit" />
</form>
<?PHP
  if ($_SESSION['category-delete'] == "ko")
  {
  echo "<p id='error'>Error : Category name does not exist!</p>";
  $_SESSION['category-delete'] = NULL;
  }
  else if ($_SESSION['flag-delete-cat'] == "ok")
  {
  echo "<p id='inscription-ok''>Success! Check the list of Category!</p>";
  $_SESSION['flag-delete-cat'] = NULL;
  }
?>

</div>
</body>
<br/><br/><br/>

<footer>
</footer>
</html>
