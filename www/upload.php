<?php
	include "runapp.php";
	include "getfileslist.php";
	include("deletetree.php");

	session_start();
	$results = "";
	$_SESSION["results"] = $results;
	$_SESSION["passed"] = "<p style=\"color:green\">Задание выполнено верно</p>";

	$fileName = explode(".", basename($_FILES['userfile']['name']));

	$time = time();
	$uploadDir = "uploads/".$time."/";
	if (!mkdir($uploadDir)) {
		echo("Failed to make a directory \n".$uploadDir);
		exit;
	};

	$uploadfile = $uploadDir . basename($_FILES['userfile']['name']);
	
	$testPath = $_POST['test'];
	$variantPath = $_POST['variant'];

	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		$inputList = getFilesList("tests/".$testPath."/".$variantPath."/");
		//$outputList = getFilesList("answers");
		
		for ($i=0;$i<count($inputList);$i++) {
			$number = explode("_", $inputList[$i]);
			$testVarPath = $testPath."/".$variantPath."/";
			$outputName = "output_".$number[count($number)-1];
			$outputPath = $testVarPath.$outputName;
			if (copy("tests/".$testVarPath.$inputList[$i], $uploadDir."input.txt")) {
				runApp($uploadDir, basename($_FILES['userfile']['name']));
				
				$results = $results."<tr>";
				if (compareFiles($uploadDir."output.txt", "answers/".$outputPath)) {
					$results = $results . "<td style=\"color:green\">" . $outputName . "</td>";
					$results = $results . "<td style=\"color:green\">Пройден<br></td>";
				} else {
					$results = $results . "<td style=\"color:red\">" . $outputName . "</td>";
					$results = $results . "<td style=\"color:red\">Провален<br></td>";
					$_SESSION["passed"] = "<p style=\"color:red\">Задание выполнено неверно</p>";
				};
				$results = $results."</tr>";
			};
		};
		delTree($uploadDir);
		$_SESSION["results"] = $results;
		header('Location: results.php');
		die();
	} else {
		delTree($uploadDir);
		echo "Failed to upload the file\n";
	};
?>