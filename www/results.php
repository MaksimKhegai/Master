<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title>Test checker</title>
    </head>
	<body>
		<center>
			<table border=\"1\" cellpadding=\"4\">
				<tr>
					<td>Проверочный файл</td>
					<td>Результат</td>
				</tr>
				<?php echo $_SESSION["results"] ?>
			</table>
				<br><br>
				<?php echo $_SESSION["passed"] ?>
				<br>
			<form action="index.php" method="POST">
				<input type="submit" value="Загрузить другой файл" />
			</form>
		</center>
	</body>
</html>