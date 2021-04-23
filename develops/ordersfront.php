<?php
include('libs/database.php');

$thispage = getRowFromTable('*','pages','where page like "orders.php"','');
$system = getRowFromTable('*','system','where id = 1','');
$genders = getAllDataFromTable('*','genders','','');
$contact = getRowFromTable('*','contact','where id = 1','');


$where = 'inner join plans on orders.planid = plans.id where orders.userid = '.$_SESSION['userid'].' order by orders.time DESC';
$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('orders',$where);
	$totalPages = ceil($noOfrows / $resultsPerPage);
	
	$limit = 'LIMIT '.$startResults.', '.$resultsPerPage;
}
else
{
	$page = 0;
	$totalPages = 0;
	$limit = '';
}
$orders = getAllDataFromTable('orders.id as id,orders.number as number,orders.total as total,orders.time as time,orders.dtime as dtime,orders.delivered as delivered,plans.title as title','orders',$where,$limit);

if(isset($_GET['paymethod'],$_GET['id']) && abs((int)($_GET['id'])) > 0)
{
	if($_GET['paymethod'] == 'bank')
	{
		if(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'orders.php') !== false)
		{
			if(update('orders','set number = renumber , delivered = 0 , dtime = ""','where id = '.$_GET['id'])) header('Location: orders.php?message=m1');
			else header('Location: orders.php?message=m2');
		}
		else header('Location: orders.php?message=m2');
	}
	elseif($_GET['paymethod'] == 'paypal')
	{
		if($system['paypal'] != '')
		{
			if(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'orders.php') !== false)
			{
				$uporder = getRowFromTable('renumber,total','orders','where id = '.$_GET['id'],'');
				if(update('orders','set number = renumber , delivered = 0 , dtime = ""','where id = '.$_GET['id']))
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
				var item_name = "Arabcentre Renow Plan";
				var item_number = "";
				var amount = "<?php echo $uporder['total']/$uporder['renumber']; ?>";
				var quantity = "<?php echo $uporder['renumber']; ?>";		
				var currency_code = "USD";
				var no_shipping = 1;
				var handling = 0;
				var cancel_return = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/orders.php?message=m2'; ?>";
				var success_return = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/orders.php?oid='.$_GET['id']; ?>";
		
				var actionForm = $('<form>', {'action': 'https://www.paypal.com/cgi-bin/webscr', 'method': 'POST'}).append($('<input>', {'name': 'charset', 'value': charset, 'type': 'hidden'}), $('<input>', {'name': 'cmd', 'value': cmd, 'type': 'hidden'}), $('<input>', {'name': 'rm', 'value': rm, 'type': 'hidden'}), $('<input>', {'name': 'business', 'value': business, 'type': 'hidden'}), $('<input>', {'name': 'item_name', 'value': item_name, 'type': 'hidden'}), $('<input>', {'name': 'item_number', 'value': item_number, 'type': 'hidden'}), $('<input>', {'name': 'amount', 'value': amount, 'type': 'hidden'}), $('<input>', {'name': 'quantity', 'value': quantity, 'type': 'hidden'}), $('<input>', {'name': 'currency_code', 'value': currency_code, 'type': 'hidden'}), $('<input>', {'name': 'no_shipping', 'value': no_shipping, 'type': 'hidden'}), $('<input>', {'name': 'handling', 'value': handling, 'type': 'hidden'}), $('<input>', {'name': 'cancel_return', 'value': cancel_return, 'type': 'hidden'}), $('<input>', {'name': 'success_return', 'value': success_return, 'type': 'hidden'}));
				actionForm.submit();
				});
				});
				</script>
				<?php
				}
				else header('Location: orders.php?message=m2');
			}
			else header('Location: orders.php?message=m2');
		}
		else header('Location: orders.php?message=m3');
	}
	else header('Location: orders.php');
}
elseif(isset($_GET['oid']) && abs((int)($_GET['oid'])) > 0)
{
	if(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'paypal.com') !== false)
	{
		if(update('orders','set delivered = 1 , dtime = '.time(),'where id = '.$_GET['oid'].' and userid = '.$_SESSION['userid'])) header('Location: orders.php?message=m1');
		else header('Location: orders.php?message=m2');
	}
	else header('Location: orders.php?message=m2');
}
?>