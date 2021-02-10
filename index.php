<?php
$JSON=file_get_contents('data.json');
$ARRAY=json_decode($JSON, true);

$group_keys=array_keys($ARRAY);
$group="";
foreach ($group_keys as $key => $value) {
	if(isset($_GET[$value])){
		$group=$value;
		break;
	}
}

if($group==""){
	//echo('no parameters');
	$LIST_GROUP=$group_keys;
	require('list.php');
}else{
	//echo($group);
	$READ_GROUP=$group;
	$READ_PAGE=$_GET[$group];
	require('read.php');
}
?>
