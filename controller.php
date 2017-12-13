<?php
	$str = $_POST['text'];
	$str = str_replace("\n", "<br />", $str);
	$posh1 = strpos($str, '#');
	if($posh1 !== false){
		if ($posh1 == 0){
			$str = substr_replace($str, '<h1>', 0, 1);
			$posbr = strpos($str, '<br />');
			if ($posbr !== false){
				$str = substr_replace($str, '</h1>', $posbr, 6);
			}else{
				$str = substr_replace($str, '</h1>', strlen($str), 6);
			}
		}
		while(strpos($str, '<br />#') !== false){
			$pos = strpos($str, '<br />#');
			$str = substr_replace($str, '<h1>', $pos, 7);
			$posbr = strpos($str, '<br />', $pos);
			if ($posbr !== false){
				$str = substr_replace($str, '</h1>', $posbr, 6);
			}else{
				$str = substr_replace($str, '</h1>', strlen($str), 6);
			}
		}
	}
	echo $str;
?>