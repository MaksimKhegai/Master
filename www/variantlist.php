<?php
	include "getfileslist.php";
	$var = $_POST["variant"];
	$inputList = getFilesList("tests/".$var."/");
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
					<form enctype=\"multipart/form-data\" action=\"showvar.php\" method=\"POST\">
							<input name=\"filename\" type=\"hidden\" value=\"".$var."/".$inputList[$i]."\"/>
							<input name=\"variant\" type=\"hidden\" value=\"".$var."\"/>
							<input name=\"type\" type=\"hidden\" value=\"var\"/>
							<input type=\"submit\" value=\"Посмотреть вариант\" />
					</form>
					</td>
					");
					print("<td>
					<form enctype=\"multipart/form-data\" action=\"delete.php\" method=\"POST\">
							<input name=\"filename\" type=\"hidden\" value=\"".$var."/".$inputList[$i]."\"/>
							<input name=\"variant\" type=\"hidden\" value=\"".$var."\"/>
							<input name=\"type\" type=\"hidden\" value=\"var\"/>
							<input type=\"submit\" value=\"Удалить\" />
					</form>
					</td>
					");
				print("</tr>");
			};
		?>
		</table>
		<br>
		<?php
			print("
				<form enctype=\"multipart/form-data\" action=\"addvar.php\" method=\"POST\">
							<input name=\"filename\" type=\"hidden\" value=\"".$var."/".$inputList[$i]."\"/>
							<input name=\"variant\" type=\"hidden\" value=\"".$var."\"/>
							<input type=\"submit\" value=\"Добавить вариант\" />
					</form>
			");
			
		?>
		<a href="testlist.php"><button>Назад</button></a>
	</center>
</html>