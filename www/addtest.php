<?php

$filename = $_POST["newtest"];

if ($filename!="") {
	mkdir("tests/".$filename);
	mkdir("answers/".$filename);
	header('Location: testlist.php');
} else {
	print("
		<center>
		<form enctype=\"multipart/form-data\" action=\"addtest.php\" method=\"POST\">
			Название теста 
			<input name=\"newtest\" required/>
			<input type=\"submit\" value=\"Создать тест\" />
		</form>
		</center>
	");
};
?>
<center>
<a href="testlist.php"><button>Назад</button></a>
</center>