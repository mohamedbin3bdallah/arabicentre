<?php
include('libs/database.php');

$thispage = getRowFromTable('*','pages','where page like "plans.php"','');
$system = getRowFromTable('*','system','where id = 1','');
$genders = getAllDataFromTable('*','genders','','');
$contact = getRowFromTable('*','contact','where id = 1','');
$notpayedorders = getNoOfRowsFromTable('orders','where delivered = 0 and userid = '.$_SESSION['userid']);
$plans = getAllDataFromTable('*','plans','','');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	$arr = explode('|', $_POST['planid']);

		if($_POST['paymethod'] == 'bank')
		{
			if(insertRow('orders', array('userid'=>$_SESSION['userid'], 'planid'=>$arr[0], 'number'=>$_POST['number'], 'renumber'=>$_POST['number'], 'total'=>$_POST['number']*$arr[1], 'time'=> time())))	header('Location: plans.php?message=m1');
			else header('Location: plans.php?message=m2');
		}
		elseif($_POST['paymethod'] == 'paypal')
		{
			if($system['paypal'] != '')
			{
				$orderid = insertRow('orders', array('userid'=>$_SESSION['userid'], 'planid'=>$arr[0], 'number'=>$_POST['number'], 'renumber'=>$_POST['number'], 'total'=>$_POST['number']*$arr[1], 'time'=> time()));
				if($orderid)
				{
				echo '<div id="submitDiv"></div>';	
				?>
				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				<script type="text/javascript">
				$(document).ready(function(){
				$('#submitDiv').show(function(e) {
				var charset = 'utf-8';
				var cmd = '_xclick';
				var rm = '2';
				var business = "<?php echo $system['paypal']; ?>";
				var item_name = "Arabcentre Plan";
				var item_number = "";
				var amount = "<?php echo $arr[1]; ?>";
				var quantity = "<?php echo $_POST['number']; ?>";		
				var currency_code = "USD";
				var no_shipping = 1;
				var handling = 0;
				var cancel_return = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/plans.php?message=m2'; ?>";
				var success_return = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/plans.php?oid='.$orderid; ?>";
		
				var actionForm = $('<form>', {'action': 'https://www.paypal.com/cgi-bin/webscr', 'method': 'POST'}).append($('<input>', {'name': 'charset', 'value': charset, 'type': 'hidden'}), $('<input>', {'name': 'cmd', 'value': cmd, 'type': 'hidden'}), $('<input>', {'name': 'rm', 'value': rm, 'type': 'hidden'}), $('<input>', {'name': 'business', 'value': business, 'type': 'hidden'}), $('<input>', {'name': 'item_name', 'value': item_name, 'type': 'hidden'}), $('<input>', {'name': 'item_number', 'value': item_number, 'type': 'hidden'}), $('<input>', {'name': 'amount', 'value': amount, 'type': 'hidden'}), $('<input>', {'name': 'quantity', 'value': quantity, 'type': 'hidden'}), $('<input>', {'name': 'currency_code', 'value': currency_code, 'type': 'hidden'}), $('<input>', {'name': 'no_shipping', 'value': no_shipping, 'type': 'hidden'}), $('<input>', {'name': 'handling', 'value': handling, 'type': 'hidden'}), $('<input>', {'name': 'cancel_return', 'value': cancel_return, 'type': 'hidden'}), $('<input>', {'name': 'success_return', 'value': success_return, 'type': 'hidden'}));
				actionForm.submit();
				});
				});
				</script>
				<?php
				}
				else header('Location: plans.php?message=m2');
			}
			else header('Location: plans.php?message=m3');
		}
}
elseif(isset($_GET['oid']) && abs((int)($_GET['oid'])) > 0)
{
	if(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'paypal.com') !== false)
	{
		if(update('orders','set delivered = 1 , dtime = '.time(),'where id = '.$_GET['oid'].' and userid = '.$_SESSION['userid'])) header('Location: plans.php?message=m1');
		else header('Location: plans.php?message=m2');
	}
	else header('Location: plans.php?message=m2');
}
?>