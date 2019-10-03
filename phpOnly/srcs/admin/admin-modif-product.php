<?PHP
session_start();
function	get_data()
{
  if ((isset($_POST['product']) && $_POST['product'] != NULL) &&
  (isset($_POST['type']) && $_POST['type'] != NULL) &&
  (isset($_POST['price']) && $_POST['price'] != NULL) &&
  (isset($_POST['volume']) && $_POST['volume'] != NULL) &&
  (isset($_POST['image']) && $_POST['image'] != NULL) &&
  (isset($_POST['submit']) && $_POST['submit'] === "submit"))
  {
    $tab[0] = $_POST['id'];
    $tab[1] = $_POST['product'];
    $tab[2] = $_POST['type'];
    $tab[3] = $_POST['price'];
    $tab[4] = $_POST['volume'];
    $tab[5] = "../img/".$_POST['image'];
  }
  else
  {
    $_SESSION['flag_champs_modif_beer'] = "ko";
    header('Location: admin-products.php');
    exit();
  }
  return ($tab);
}

$path = "../../db";
$file = $path."/serialized";

$tab = get_data();

$unserialized = unserialize(file_get_contents($file));
$flag = 0;
foreach($unserialized as $key=>$value)
{
  if ($tab[0] == $value[0])
  {
    $flag = 1;
    $unserialized[$key][1] = $tab[1];
    $unserialized[$key][2] = $tab[2];
    $unserialized[$key][3] = $tab[3];
    $unserialized[$key][4] = $tab[4];
    $unserialized[$key][5] = $tab[5];
  }
}
if ($flag == 0)
{
  $_SESSION['flag_modif_beer'] = "ko";
  echo "<meta http-equiv='refresh' content='0,url=admin-products.php'>";
}
else {
$serialized = serialize($unserialized);
file_put_contents($file, $serialized);
$_SESSION['flag_modif_beer'] = "ok";
echo "<meta http-equiv='refresh' content='0,url=admin-products.php'>";
exit();
}
?>

