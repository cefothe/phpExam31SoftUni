<?php
$text=str_replace("\r\n",' ',$_GET['text']);
$lineLength=$_GET['lineLength'];
$array=Array();
$arraySymbol=str_split($text);
//print_r($arraySymbol);

// This convert to the array 
$s=0;
for($i=0,$j=0;$i<count($arraySymbol);$i++){
	if($i%$lineLength==0&&$i!=0){
		$j++;$s=0;
	}
	if(isset($arraySymbol[$i])){
	$array[$j][$s]=$arraySymbol[$i];
	$s++;
	}
	
}
for($i=$s;$i<$lineLength;$i++){
	$array[$j][$i]=' ';
}

for($i=$j-1;$i>=0;$i--){
	
	for($s=0;$s<$lineLength;$s++){
			
		downChar($i,$s);
	
	}
	
}

function downChar($row,$col){
	global $array;
	for($i=$row;$i<count($array);$i++){
		
	if($row+1!=count($array)){
		if($array[$row+1][$col]==" "){
			
			$array[$row+1][$col]=$array[$row][$col];
			$array[$row][$col]=' ';
			downChar($row+1,$col);
			
				return true;
			}
			else return false;
		}
	}
}

echo '<table>';
for($i=0;$i<count($array);$i++){
	
	echo '<tr>';
	for($s=0;$s<$lineLength;$s++){
	if(isset($array[$i][$s]))	echo '<td>'.htmlspecialchars($array[$i][$s]).'</td>';
	else '<td> </td>';
	}
	echo '</tr>';

}
echo '<table>';
