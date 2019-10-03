<?PHP session_start();
include("header_admin.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <div id="content">
    <br/>
    <a href="admin.php" class="admin-users">Back to the Options.</a><br/><br/>
    <h2>List of Products</h2>
    <?PHP
    $path = "../../db";
    $file = $path."/serialized";
    if (!file_exists($file))
    {
      echo "<p>There are no category product available!</p>";
    }
    else
    {
      $unserialized = unserialize(file_get_contents($file));
      echo "<div id='tab-admin-beer'>";
      echo "<table>";
      echo "<tr>
      <th>Id</th>
      <th>Product Name</th>
      <th>Type</th>
      <th>Price</th>
      <th>Volume</th>
      <th>Image</th>
      </tr>";
      foreach ($unserialized as $elem)
      {
        echo "<tr>
        <td>".$elem[0]."</td>
        <td>".$elem[1]."</td>
        <td>".$elem[2]."</td>
        <td>".$elem[3]."</td>
        <td>".$elem[4]."</td>
        <td>".$elem[5]."</td>
        </tr>";
      }
      echo "</table>";
      echo "</div>";
    }
    ?>
    <br/>
    <h2>Add a New Product</h2>
    <div id="add-user">
      <br/><p> Product Information :</p>
      <br/>
      <form method="post" action="admin-add-product.php">
        Product Name : <input type="text" name="product"/><br/><br/>
        Type : <input type="text" name="type"/><br/><br/>
        price : <input type="text" name="price"/><br/><br/>
        volume : <input type="text" name="volume"/><br/><br/>
        Image : <input type="file" name="image"/><br/><br/>
        <input type="submit" name = "submit" value="submit" />
      </form>
    </div>
    <?php
    if ($_SESSION['flagchamps'] == "ko")
    {
      echo "<p id='error'>Error : Something is wrong with you.\n</p>";
      $_SESSION['flagchamps'] = NULL;
    }
    else if ($_SESSION['flagcreation'] == "ok")
    {
      echo "<div id='inscription-ok'>Sucess! Check your product list!</div>";
      $_SESSION['flagcreation'] = NULL;
    }

    ?>
    <br/><h2>Modify your Product</h2>
    <br/><p> Product Information :</p><br/>
    <form method="post" action="admin-modif-product.php">
      Id Number : <input type="text" name="id"/><br/><br/>
      Product Name : <input type="text" name="product"/><br/><br/>
      Type : <input type="text" name="type"/><br/><br/>
      price : <input type="text" name="price"/><br/><br/>
      volume : <input type="text" name="volume"/><br/><br/>
      Image : <input type="file" name="image"/><br/><br/>
      <input type="submit" name = "submit" value="submit" />
    </form>
<?PHP

if ($_SESSION['flag_modif_beer'] == "ko")
{
  echo "<p id='error'>Error : Id Not exist.</p>";
  $_SESSION['flag_modif_beer'] = "";
}
else if ($_SESSION['flag_champs_modif_beer'] == "ko")
{
  echo "<p id='error'>Error : Not enough information!</p>";
  $_SESSION['flag_champs_modif_beer'] = "";
}
else if ($_SESSION['flag_modif_beer'] == "ok")
{
  echo "<p id='inscription-ok'>Success! Check your product list!</p>";
  $_SESSION['flag_modif_beer'] = "";
}
?>
    <br/><h2>Delete your Product</h2>
    <br/><p>Product Information :</p><br/>
    <form method="post" action="admin-delete-product.php">
      Product ID Number : <input type="text" name="id"/>
      <input type="submit" name = "submit" value="submit" />
    </form>

    <?php
    if ($_SESSION['no-beer-to-delete'] == "ko")
    {
      echo "<p id='error'>Error : Id does not exist.</p>";
      $_SESSION['no-beerto-delete'] = "";
    }
    else {

      if ($_SESSION['flag_suppression_beer'] == "ok")
      {
        echo "<p id='inscription-ok'>Successfully Deleted!</p>";
        $_SESSION['flag_suppression_beer'] = "";
      }
      else if ($_SESSION['flag_suppression_beer'] == "ko")
      {
        echo "<p id='error'>Error 2 : Id does not exist.</p>";
        $_SESSION['flag_suppression_beer'] = "";
      }
    }
    ?>
  </div>
</body>
<br/><br/><br/>

<footer>
</footer>
</html>

