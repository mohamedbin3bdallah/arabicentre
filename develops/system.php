<?php
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['website'] != '' && $_POST['paypal'] != '' && $_POST['bank'] != '')
	{
		$set = 'set website = "'.$_POST['website'].'"';
		$set .= ' , paypal = "'.$_POST['paypal'].'"';
		$set .= ' , bank = "'.$_POST['bank'].'"';
		
		if($_FILES['file']['error'] == 0) { unlink('uploads/'.$_POST['oldlogo']); $_POST['logo'] = uploadimgsreturn(''); }
		else $_POST['logo'] = $_POST['oldlogo'];
		$set .= ' , logo = "'.$_POST['logo'].'"';
		
		if(update('system',$set,' where id = 1')) echo '<div class="message" type="success"></div>';
		else echo '<div class="message" type="somthingwrong"></div>';
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}

$row = getRowFromTable('*','system',' where id = 1','');

?>