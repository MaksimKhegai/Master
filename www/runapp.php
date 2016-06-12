<?php
	include "comparefiles.php";

	function runApp($directoryName, $appName) {
		$lastLine = exec("cd ". $directoryName ." && ". $appName, $output, $returnVal);
	};
?>