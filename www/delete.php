<?php
	include("deletetree.php");
  
	session_start();

	delTree("tests/".$_POST["filename"]);
	delTree("answers/".$_POST["filename"]);
	if ($_POST["type"] == "var") {
		header('Location: variantlist.php');
	} else {
		header('Location: testlist.php');
	};
	die();
?>