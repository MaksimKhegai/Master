<?php

include "getFilesList.php";
$var = $_POST["filename"];
$inputList = getFilesList("tests/".$var."/");
$outputList = getFilesList("answers/".$var."/");

for ($i=0;$i<count($inputList);$i++) {
	print("<center><table border=\"1px\">");
	//print("<tr><td>Filename</td><td>".$inputList[$i]."</td></tr><tr>");
	print("<tr><td>".$inputList[$i]."</td><td>".$outputList[$i]."</td></tr><tr>");
	print("<td>".file_get_contents('tests/'.$var.'/'.$inputList[$i])."<br></td>");
	print("<td>".file_get_contents('answers/'.$var.'/'.$outputList[$i])."<br></td>");
	print("</tr></table></center>");
}

print("<br>
		<center>
		<form enctype=\"multipart/form-data\" action=\"testlist.php\" method=\"POST\">
			<input name=\"variant\" type=\"hidden\" value=\"".$var."\"/>
			<input type=\"submit\" value=\"Назад\" />
		</form>
		</center>
	");
?>