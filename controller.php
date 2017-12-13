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
	$posstar = strpos($str, '*');
	if($posstar !== false){
		$posdouble = strpos($str, '**');
		while($posdouble !== false){
			$possecond = strpos($str, '**', $posdouble+2);
			if ($possecond !== false){
				$str = substr_replace($str, "<b>", $posdouble, 2);
				$str = substr_replace($str, "</b>", $possecond+1, 2);
			}else{
				$str = substr_replace($str, "<i></i>", $posdouble, 2);
			}
			$posdouble = strpos($str, '**');
		}
		$posstar = strpos($str, '*');
		$possecond = strpos($str, '*', $posstar+1);
		while($possecond !== false){
			$str = substr_replace($str, "<i>", $posstar, 1);
			$str = substr_replace($str, "</i>", $possecond+2, 1);
			$posstar = strpos($str, '*');
			$possecond = strpos($str, '*', $posstar+1);
		}
	}
	echo $str;
?>