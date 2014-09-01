<?php 
$students=$_GET['students'];
$column=$_GET['column'];
$order=$_GET['order'];

$arrayRows=preg_split("/\n/", $students, -1, PREG_SPLIT_NO_EMPTY);

$data=Array();

$i=0;
foreach($arrayRows as $key => $value){
	$data[$i]=preg_split("/,/", $value, -1, PREG_SPLIT_NO_EMPTY);
	$i++;
}



for($s=0;$s<$i;$s++){
	
	array_unshift($data[$s],$s+1);

}

//print_r($data);

// Obtain a list of columns
foreach ($data as $key => $row) {
    $id[$key]  = $row[0];
    $username[$key] =trim($row[1]);
	$email[$key] =trim($row[2]);
	$type[$key] = trim($row[3]);
	$result[$key]=(int)trim($row[4]);
}

// Sort the data with volume descending, edition ascending
// Add $data as the last parameter, to sort by the common key
if($order=="ascending"){
	array_multisort(${$column}, SORT_ASC, $id, SORT_ASC, $data);
}
elseif($order=="descending"){
	array_multisort(${$column}, SORT_DESC, $id, SORT_DESC, $data);
}

echo '<table><thead><tr><th>Id</th><th>Username</th><th>Email</th><th>Type</th><th>Result</th></tr></thead>';

foreach($data as $key =>$value){
	echo '<tr>';
	echo '<td>'.htmlspecialchars(trim($value[0])).'</td>';
	echo '<td>'.htmlspecialchars(trim($value[1])).'</td>';
	echo '<td>'.htmlspecialchars(trim($value[2])).'</td>';
	echo '<td>'.htmlspecialchars(trim($value[3])).'</td>';
	echo '<td>'.htmlspecialchars(trim($value[4])).'</td>';
	echo '</tr>';
}

echo '</table>';