<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/" . "assets/php/functions.php";
if (get_server_name() == 'http://f1230728.xsph.ru/') require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/php/connect_hosting.php";
    else require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/php/connect.php";
if (isset($_POST) && !empty($_POST)) {
	$date = $_POST['date'];
	$type = $_POST['type'];
	$quantity = $_POST['quantity'];	
	$sql = "INSERT INTO `pallet_accouting` (`date`, `type`, `quantity`) VALUES ('$date', '$type', '$quantity')";
	$result = $mysqli->query($sql);
	header("Location: " . get_server_name());
	//echo "<script>window.location.href=' " . get_sn(). "'</script>";
}