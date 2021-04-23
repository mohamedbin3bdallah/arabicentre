	<div class="row">	
		<div class="col-sm-8 col-sm-offset-2">
			<form class="form-horizontal" action="admin.php?c=<?php echo $_GET['c']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
				<input type="hidden" name="oldlogo" value="<?php echo $row['logo']; ?>">
				<div class="form-group">
					<label for="website" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('website'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="text" class="form-control" name="website" id="website" value="<?php if(isset($row['website'])) echo $row['website']; ?>" maxlength="100" placeholder="<?php language("website"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
					<label for="paypal" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('paypal'); language(' '); language('email'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="text" class="form-control" name="paypal" id="paypal" value="<?php if(isset($row['paypal'])) echo $row['paypal']; ?>" maxlength="150" placeholder="<?php language("paypal"); language(' '); language('email'); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
					<label for="bank" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('bank'); language(' '); language('account'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="text" class="form-control" name="bank" id="bank" value="<?php if(isset($row['bank'])) echo $row['bank']; ?>" maxlength="100" placeholder="<?php language("bank"); language(' '); language('account'); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
					<label for="logo" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('logo'); ?></label>
					<div class="col-sm-7 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="file" class="form-control" name="file" />
					</div>
					<div class="col-sm-3 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<?php if(isset($row['logo']) && $row['logo'] != '') { ?><img src="uploads/<?php echo $row['logo']; ?>" width="70%"><?php } ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="submit" class="btn btn-info" name="submit" id="submit" value="<?php language("save"); ?>" />
					</div>
				</div>
			</form>
		</div>
	</div>

<!-----------Start Some Models---------------->
<div id="success" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: green;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('success'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="somthingwrong" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: red;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('m2'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="inputnotcorrect" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('m3'); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<div id="invalidinput" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: orange;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('m4'); ?>
				</center>
			</div>
		</div>
	</div>
</div>
<!-----------End Some Models---------------->