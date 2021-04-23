<?php
if(isset($_POST['id'],$_POST['currenttable'],$_POST['img']))
{
	$id = $_POST['id'];
	$currenttable = $_POST['currenttable'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("delete from {$currenttable} where id = '$id'");
	if($stmt->execute())
	{
		unlink('../uploads/'.$currenttable.'/'.$_POST['img']);
		echo 1;
	}
	else echo 0;
	include("../libs/closedb.php");
   exit;
}
?>