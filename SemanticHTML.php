<?php
	$html=$_GET['html'];
	//print_r($html);
	$mathes=array();
	preg_match_all('/<!--(.|\)*?-->/',$html,$mathes);
		
	print_r($mathes);