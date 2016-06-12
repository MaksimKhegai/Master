<?php
	function getFilesList($dir) {
		$files;
		$d = dir($dir);
		while (false !== ($entry = $d->read())) {
			if ($entry!="." && $entry!="..") {
				$files[count($files)] = $entry;
			};
		};
		$d->close();
		return $files;
	};
?>