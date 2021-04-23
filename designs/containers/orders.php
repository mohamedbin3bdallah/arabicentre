	<div class="row">
		<div class="col-md-10 col-md-offset-2">
			
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a data-toggle="tab" href="#nondelivered"><?php language('nondelivered'); ?></a></li>
				<li><a data-toggle="tab" href="#delivered"><?php language('delivered'); ?></a></li>
			</ul>
			
			<div class="tab-content" style="margin-top: 25px;">
				<div id="nondelivered" class="tab-pane fade in active">
				<?php
					$data = getAllDataFromTable('orders.id as id,orders.renumber as renumber,orders.total as total,orders.time as time,users.id as userid,users.username as username,plans.title as plan','orders',' inner join users on orders.userid = users.id inner join plans on orders.planid = plans.id where orders.delivered = 0 order by orders.time DESC','');
					if(!empty($data))
					{
				?>
					<div class="row">
						<div class="col-md-12 table-responsive">
							<table class="table table-bordered table-striped">
								<tr class="info">
									<th><?php language('username'); ?></th>
									<!--<th><?php language('address'); ?></th>
									<th><?php language('phone'); ?></th>
									<th><?php language('product'); ?></th>-->
									<th><?php language('plan'); ?></th>
									<th><?php language('number'); ?></th>
									<th><?php language('fees'); ?></th>
									<th><?php language('time'); ?></th>
									<th><?php language('delivered'); ?></th>
								</tr>
								<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
									<tr id="tr-<?php echo $data[$i]['id'];?>">
										<td><?php echo $data[$i]['username']; ?></td>
										<!--<td><?php echo $data[$i]['address']; ?></td>
										<td><?php echo $data[$i]['phone']; ?></td>-->
										<td><?php echo $data[$i]['plan']; ?></td>
										<td><?php echo $data[$i]['renumber']; ?></td>
										<td><?php echo '$'.$data[$i]['total'].' / Month'; ?></td>
										<td><?php echo date('Y-m-d , h:i:sa', $data[$i]['time']); ?></td>
										<td><input type="checkbox" class="checkdelivered" id="<?php echo $data[$i]['id'];?>" userid="<?php echo $data[$i]['userid']; ?>"></td>										
									</tr>
								<?php	} ?>
							</table>
						</div>
					</div>
				<?php
					}
					else
					{
						echo '<div class="row">';
							echo '<div class="col-md-8 col-md-offset-2">';
							language('nodata');
							echo '</div>';
						echo '</div>';
					}
				?>
				</div>
				
				<div id="delivered" class="tab-pane fade">
				<?php
					$data = getAllDataFromTable('orders.id as id,orders.renumber as renumber,orders.total as total,orders.time as time,orders.dtime as dtime,users.username as username,plans.title as plan','orders',' inner join users on orders.userid = users.id inner join plans on orders.planid = plans.id where orders.delivered = 1 order by orders.time DESC','');
					if(!empty($data))
					{
				?>
					<div class="row">
						<div class="col-md-12 table-responsive">
							<table class="table table-bordered table-striped">
								<tr class="info">
									<th><?php language('username'); ?></th>
									<!--<th><?php language('address'); ?></th>
									<th><?php language('phone'); ?></th>
									<th><?php language('product'); ?></th>-->
									<th><?php language('plan'); ?></th>
									<th><?php language('number'); ?></th>
									<th><?php language('fees'); ?></th>
									<th><?php language('time'); ?></th>
									<th><?php language('delivered'); ?></th>
								</tr>
								<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
									<tr id="tr-<?php echo $data[$i]['id'];?>">
										<td><?php echo $data[$i]['username']; ?></td>
										<!--<td><?php echo $data[$i]['address']; ?></td>
										<td><?php echo $data[$i]['phone']; ?></td>-->
										<td><?php echo $data[$i]['plan']; ?></td>
										<td><?php echo $data[$i]['renumber']; ?></td>
										<td><?php echo '$'.$data[$i]['total'].' / Month'; ?></td>
										<td><?php echo date('Y-m-d , h:i:sa', $data[$i]['time']); ?></td>
										<td><?php echo date('Y-m-d , h:i:sa', $data[$i]['dtime']); ?></td>
									</tr>
								<?php	} ?>
							</table>
						</div>
					</div>
				<?php
					}
					else
					{
						echo '<div class="row">';
							echo '<div class="col-md-8 col-md-offset-2">';
							language('nodata');
							echo '</div>';
						echo '</div>';
					}
				?>
				</div>
			</div>
			
		</div>
	</div>