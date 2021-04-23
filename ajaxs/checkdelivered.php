<?php
if(isset($_POST['id'],$_POST['delivered'],$_POST['userid']))
{	
	$id = $_POST['id'];
	$delivered = $_POST['delivered'];
	$userid = $_POST['userid'];
	$dtime = time();
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$stmt = $dbh->prepare("update orders set delivered = 1 , dtime = '$dtime' where id = '$id'");
	if($stmt->execute())
	{
		$stmt2 = $dbh->prepare("update users set paycourses = paycourses+1 where id = '$userid'");
		$stmt2->execute();
		echo 1;
	}
	else echo 0;
	include("../libs/closedb.php");
   exit;
}
?>