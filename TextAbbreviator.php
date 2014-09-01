<?php
$list=$_GET['list'];
$size=$_GET['maxSize'];

$rows = preg_split("/\n/", $list, -1, PREG_SPLIT_NO_EMPTY);
$rows=array_map("trim",$rows);


echo '<ul>';
foreach($rows as $key => $value){
	if(!empty($value)){
	$value = (strlen($value) > $size) ? substr($value,0,$size).'...' : $value;
	echo '<li>'.htmlspecialchars($value).'</li>';}
}
echo '</ul>';