<?php

include "getFilesList.php";
$var = $_POST["variant"];
$filename = $_POST["newvar"];


if ($filename!="") {
	$inputName = "input_".count($list).".txt";
	$outputName = "output_".count($list).".txt";
	mkdir("tests/".$var."/");
	mkdir("tests/".$var."/".$filename);
	$list = getFilesList("tests/".$var."/".$filename);
	file_put_contents ("tests/".$var."/".$filename."/".$inputName ,$_POST["input"]);
	mkdir("answers/".$var."/");
	mkdir("answers/".$var."/".$filename);
	file_put_contents ("answers/".$var."/".$filename."/".$outputName ,$_POST["output"]);
	header('Location: testlist.php');
} else {
	print("
		<center>
		<form enctype=\"multipart/form-data\" action=\"addvar.php\" method=\"POST\">
			Название варианта 
			<input name=\"newvar\" required/>
			<br>
			<table>
				<tr>
					<td>Входные данные</td>
					<td>Выходные данные</td>
				</tr>
				<tr>
					<td><textarea name=\"input\" required style=\"height:300px\"></textarea></td>
					<td><textarea name=\"output\" required style=\"height:300px\"></textarea></td>
				</tr>
				
			</table>
			
			<input name=\"variant\" type=\"hidden\" value=\"".$var."\"/>
			<br>
			<br>
			<input type=\"submit\" value=\"Создать вариант\" />
		</form>
		</center>
	");
};

print("
		<center>
		<form enctype=\"multipart/form-data\" action=\"variantlist.php\" method=\"POST\">
			<input name=\"variant\" type=\"hidden\" value=\"".$var."\"/>
			<input type=\"submit\" value=\"Назад\" />
		</form>
		</center>
	");
?>