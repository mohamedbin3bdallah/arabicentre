	<div class="row">	
		<div class="col-sm-8 col-sm-offset-2">
			<form class="form-horizontal" action="admin.php?c=<?php echo $_GET['c']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['id'])) echo '<input type="hidden" name="oldid" value="'.$_GET['id'].'"><input type="hidden" name="oldpicture" value="'.$row['picture'].'">';
				?>
				<div class="form-group">
					<label for="title" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('title'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="text" class="form-control" name="title" id="title" value="<?php if(isset($row['title'])) echo $row['title']; ?>" maxlength="255" placeholder="<?php language("title"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('description'); ?></label>
					<div class="col-sm-10 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<textarea class="form-control" name="description" id="description" placeholder="<?php language("description"); ?>" rows="5" required><?php if(isset($row['description'])) echo $row['description']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="picture" class="col-sm-2 <?php if($lang == 'ar') echo 'col-sm-push-10'; ?> control-label"><?php language('picture'); ?></label>
					<div class="col-sm-7 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<input type="file" class="form-control" name="file" <?php if(!isset($_GET['id'])) echo 'required'; ?>/>
					</div>
					<div class="col-sm-3 <?php if($lang == 'ar') echo 'col-sm-pull-2'; ?>">
						<?php if(isset($row['picture']) && $row['picture'] != '') { ?><img src="uploads/testimonials/<?php echo $row['picture']; ?>" width="70%"><?php } ?>
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

<?php
$data = getAllDataFromTable($select,'testimonials',$where,$limit);
if(!empty($data))
{
?>
	<div class="row" style="margin-top: 50px;">
		<div class="col-sm-12 table-responsive">
			<table class="table table-bordered table-striped" style="text-align: center;">
				<tr class="info">
					<th><?php language('title'); ?></th>
					<th><?php language('description'); ?></th>
					<th><?php language('picture'); ?></th>
					<th><?php language('edit'); ?></th>
					<th><?php language('delete'); ?></th>
				</tr>
				<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
					<tr id="tr-<?php echo $data[$i]['id'];?>">
						<td><?php echo $data[$i]['title']; ?></td>
						<td><?php echo $data[$i]['description']; ?></td>
						<td><img src="uploads/testimonials/<?php echo $data[$i]['picture']; ?>" width="30%"></td>
						<td><a href="admin.php?c=<?php echo $_GET['c']; ?>&id=<?php echo $data[$i]['id']; ?>" style="color: green;"><i style="color:green;" class="glyphicon glyphicon-edit"></i></a></td>
						<td>
							<i id="<?php echo $data[$i]['id'];?>" style="color:red;" class="del glyphicon glyphicon-remove-circle"></i>
							<div id="del-<?php echo $data[$i]['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<?php language('deletemodal'); ?>
											<br>
        								</div>
										<div class="modal-body">
										<center>
											<button class="btn btn-danger" onclick="mydelete('<?php echo $data[$i]['id'];?>','../uploads/testimonials/<?php echo $data[$i]['picture'];?>','testimonials')" data-dismiss="modal"><?php language('agree'); ?></button>
											<button class="btn btn-success" data-dismiss="modal" aria-hidden="true"><?php language('no'); ?></button>
										</center>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
					
				<?php	} ?>
			</table>
		</div>
	</div>
						
	<div class="row">
		<div class="col-sm-4<?php if($lang == 'ar') echo ' col-sm-push-8'; ?>">
		</div>
		<div class="col-sm-8<?php if($lang == 'ar') echo ' col-sm-pull-4'; ?>">
			<nav>
				<ul class="pagination">
					<?php if($totalPages > 1) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=1"><?php language("first"); ?></a></li><?php } ?>
					<?php if($page > 3) { ?><li>
						<a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page-2; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li><?php } ?>
					<?php if($page > 1) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
					<?php if($page < $totalPages) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
					<?php if($page < $totalPages-1) { ?><li>
						<a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $page+2; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=<?php echo $_GET['c']; ?>&page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
				</ul>
			</nav>
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

<div id="cantdelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content"  style="background-color: red;">
			<div class="modal-body">
				<center style="color: #fff;">
					<?php language('cantdelete'); language('departments'); ?>
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