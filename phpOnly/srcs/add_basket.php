<?php  session_start(); ?>
<?PHP
$_SESSION['nb_articles']++;
$_SESSION['panier'][] = $_GET['beer'];
echo "<meta http-equiv='refresh' content='0,url=basket.php'>";
?>

