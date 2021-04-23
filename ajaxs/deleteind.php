<?php
function delTree($dir)
{
	$files = array_diff(scandir($dir), array('.','..')); 
    foreach ($files as $file) { 
    (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
    }
    rmdir($dir);
}

if(isset($_POST['id'],$_POST['currenttable']))
{
	$id = $_POST['id'];
	$currenttable = $_POST['currenttable'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = $dbh->prepare("delete from {$currenttable} where id = '$id'");
	if($stmt->execute())
	{
		delTree('../uploads/'.$currenttable.'/'.$id);
		echo 1;
	}
	else echo 0;
	include("../libs/closedb.php");
   exit;
}
?>