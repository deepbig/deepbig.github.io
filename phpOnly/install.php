<?php
session_start();
$_SESSION['start'] = "";
$path = "private";
$file = $path."/passwd";
if (!file_exists($path))
{
  mkdir ($path);
  $my_file = fopen("$file", "x");

  $tab[0]['last'] = 'admin';
  $tab[0]['first'] = 'admin';
  $tab[0]['mail'] = 'admin';
  $tab[0]['passwd'] = hash(sha512, "admin");

  $serialized[] = serialize($tab);
  file_put_contents($file, $serialized);
}
include("srcs/install_product.php");

$file_cat = $path."/categories";
if (!file_exists($file_cat))
{
  $my_file_cat = fopen("$file_cat", "x");

  $tab_cat[cat1][0] = 'Stout';
  $tab_cat[cat1][1] = 'Sour';
  $tab_cat[cat1][2] = 'Ale';

  $serialized_cat[] = serialize($tab_cat);
  file_put_contents($file_cat, $serialized_cat);
}

echo "<meta http-equiv='refresh' content='0,url=index.php'>";
?>

