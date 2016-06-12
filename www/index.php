<?php
include "getfileslist.php"; 

function printTests() {
	$files = getFilesList("tests");
	for ($i=0;$i<count($files);$i++) {
		echo "<option value=".$files[$i]." onclick=\"updateVariants()\">".$files[$i]."</option>";
	};
};

function printVariants($test) {
	$files = getFilesList("tests/".$test);
	for ($i=0;$i<count($files);$i++) {
		echo "<option value=".$files[$i].">".$files[$i]."</option>";
	};
};

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test checker</title>
    </head>
	<script>
		function updateVariants() {
			var variants = document.getElementById("variants");
			var str = "<?php 
				$files = getFilesList("tests");
				for ($i=0;$i<count($files);$i++) {
					printVariants($files[$i]); 
				};
				
			?>";
			variants.innerHTML = str;
		};
	</script>
	<body>
		<center>
			<form enctype="multipart/form-data" action="upload.php" method="POST">
					Выберите EXE файл, задание и вариант: <br><br>
					<select name="test" id="tests">
						<?php printTests();?>
					</select>
					<select name="variant" id="variants">
					</select>
					<input name="userfile" type="file" />
					<input type="submit" value="Проверить файл" />
			</form>
			<br>
			<!--<form enctype="multipart/form-data" action="testlist.php" method="POST">
					<input type="submit" value="Список тестов" />
			</form>-->
			<a href="testlist.php"><button>Список тестов</button></a>
		</center>
	</body>
	<script>
		updateVariants();
	</script>
</html>