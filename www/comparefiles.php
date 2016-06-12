<?php
	function compareFiles($file1, $file2) {
		$string = file_get_contents($file1);
		$lines1 = trimLines($string);
		
		$string = file_get_contents($file2);
		$lines2 = trimLines($string);

		//echo countLines($lines1)."|".countLines($lines2)." ";
		
		if (countLines($lines1)!=countLines($lines2)) return false;
		
		for ($i=0;$i<count($lines1);$i++) {
			if ($lines1[$i]!="" && $lines1[$i]!=" " && $lines2[$i]!="" && $lines2[$i]!=" ") {
				if ($lines1[$i]!=$lines2[$i]) {
					return false;
				};
			};
		};
		return true;
	};
	
	function countLines($file) {
		$result = 0;
		for ($i=0;$i<count($file);$i++) {
			if ($file[$i]!="" && $file[$i]!=" " && $file[$i]!="\n" && $file[$i]!="\r\n") {
				$result++;
			};
		};
		return $result;
	}
	
	function trimLines($string) {
		$tempLines;
		$temp = explode("\n", trim($string, " \r\n"));
		for ($i=0;$i<count($temp);$i++) {
			if ($temp[$i]!="" && $temp[$i]!=" " && $temp[$i]!="\n" && $temp[$i]!="\r\n") 
				$tempLines[count($tempLines)] = trim($temp[$i], " \r\n");
		};
		
		return $tempLines;
	}
?>