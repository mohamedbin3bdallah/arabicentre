	<div class="row">	
		<div class="col-sm-8 col-sm-offset-2">
			<form class="form-horizontal" action="admin.php?c=<?php echo $_GET['c']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
			
				<?php $slides = array_diff(scandir('uploads/slides'), array('.','..')); ?>
				<?php if(!empty($slides)) { ?>
				<div class="form-group">
					<div class="col-sm-12 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<?php for($sl=2;$sl<count($slides)+2;$sl++) { ?>
							<div id="sliderimgdel-<?php echo $sl; ?>" class="col-md-3">
								<a href="#" data-toggle="modal" data-target="#sliderimage-<?php echo $sl; ?>">
									<img class="img-responsive" src="uploads/slides/<?php echo $slides[$sl]; ?>" style="height:95px;">
								</a>
								<i id="<?php echo $sl;?>" path="../uploads/slides/<?php echo $slides[$sl]; ?>" style="color:red;" class="sliderimgdel glyphicon glyphicon-remove-circle"></i>
							</div>
							<div id="sliderimage-<?php echo $sl; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<br>
									</div>
									<div class="modal-body">
										<img src="uploads/slides/<?php echo $slides[$sl]; ?>" class="img-responsive">
									</div>
								</div>
							</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
				<div class="form-group">
					<label for="slides" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('slides'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="file" class="form-control" name="file[]" multiple />
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