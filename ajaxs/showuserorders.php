<?php
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'en';
include('../languages/'.$lang.'.php');

if(isset($_POST['id']))
{
	$id = $_POST['id'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = $dbh->query("select orders.id as id,orders.number as number,orders.total as total,orders.time as time,orders.dtime as dtime,plans.title as plantitle
							from orders inner join plans on orders.planid = plans.id
							where orders.delivered = 1 and orders.number > 0 and orders.userid = '$id' order by plans.title ASC");
	if($result->rowCount() > 0)
	{
		?>
		<div class="row" style="margin-bottom:25px; text-align:center;">
			<div class="col-sm-2 col-md-2 col-sm-offset-4 col-offset-md-4">
				<div style="width:25px; height:25px; background-color:#f2dede; border:1px solid red; border-radius:5%; float:left;"></"></div>
				<label for="renow" class="control-label">Renow</label>
			</div>
			<div class="col-sm-2 col-md-2 col-sm-offset-1 col-md-offset-1">
				<div style="width:25px; height:25px; background-color:#fff; border:1px solid #ccc; border-radius:5%; float:left;"></"></div>
				<label for="active" class="control-label">Active</label>
			</div>
		</div>
			
		<div class="row" style="margin-top: 50px;">
			<div class="col-sm-12 table-responsive">
				<table class="table table-bordered" style="text-align: center;">
					<tr class="info">
						<th><?php language('plan'); ?></th>
						<th><?php language('number'); ?></th>
						<th><?php language('fees'); ?></th>
						<th><?php language('time'); ?></th>
						<th><?php language('dtime'); ?></th>
					</tr>
		<?php	for($i=0; $row = $result->fetch(); $i++) { ?>
					<tr class="<?php if($row['dtime'] != '' && time() >  strtotime( '+1 month', $row['dtime'])) echo 'danger'; ?>">
						<td><?php echo $row['plantitle']; ?></td>
						<td><input type="number" name="number" min="0" step="1" value="<?php echo $row['number']; ?>" onchange="update('orders','number',this.value,'where id = <?php echo $row['id']; ?>');"></td>
						<td><?php echo '$'.$row['total'].' / Month'; ?></td>
						<td><?php echo date('Y-m-d , h:i:sa', $row['time']); ?></td>
						<td><?php echo date('Y-m-d , h:i:sa', $row['dtime']); ?></td>
					</tr>
		<?php } ?>
				</table>
			</div>
		</div>
		<?php
	}
	else language('nodata');
	exit;
}
?>