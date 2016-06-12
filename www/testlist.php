<?php
	include "getfileslist.php";
	$inputList = getFilesList("tests/");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test checker</title>
    </head>
	<center>
		<table>
		<?php
			for ($i=0;$i<count($inputList);$i++) {
				print("<tr>");
					//print("<td>".$i."</td>");
					print("<td>".$inputList[$i]."</td>");
					print("<td>
					<form enctype=\"multipart/form-data\" action=\"variantlist.php\" method=\"POST\">
							<input name=\"variant\" type=\"hidden\" value=\"".$inputList[$i]."\"/>
							<input type=\"submit\" value=\"Список вариантов\" />
					</form>
					</td>
					");
					print("<td>
					<form enctype=\"multipart/form-data\" action=\"delete.php\" method=\"POST\">
							<input name=\"filename\" type=\"hidden\" value=\"".$inputList[$i]."\"/>
							<input type=\"submit\" value=\"Удалить\" />
					</form>
					</td>
					");
				print("</tr>");
			};
		?>
		</table>
		<br>
		<a href="addtest.php"><button>Добавить новый тест</button></a>
		<br>
		<a href="index.php"><button>Назад</button></a>
	</center>
</html>