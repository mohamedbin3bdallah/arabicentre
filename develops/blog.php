<?php
include('libs/database.php');

$select = '*';
$where = 'order by time DESC';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('blog',$where);
	$totalPages = ceil($noOfrows / $resultsPerPage);
	
	$limit = 'LIMIT '.$startResults.', '.$resultsPerPage;
}
else
{
	$page = 0;
	$totalPages = 0;
	$limit = '';
}

if(isset($_GET['id']) && $_GET['id'] != '')
{
	$row = getRowFromTable('*','blog','where id = '.$_GET['id'],'');
}

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['title'] != '')
	{
		if(isset($_POST['active']) && $_POST['active'] == 'on') $_POST['active'] = 1;
		else $_POST['active'] = 0;
		
		if(isset($_POST['oldid']))
		{
			if(update('blog',' set active = '.$_POST['active'].' , title = "'.$_POST['title'].'" , description = "'.mysql_real_escape_string($_POST['description']).'"',' where id = '.$_POST['oldid']))
			{
				if($_FILES['file']['error'][0] == 0)	uploadimgs('blog/'.$_POST['oldid']);
				echo '<div class="message" type="success"></div>';
			}
			else echo '<div class="message" type="somthingwrong"></div>';
		}
		else
		{
			$_POST['time'] = time();
			$insertid = insertRow('blog',$_POST);
			if($insertid)
			{
				if($_FILES['file']['error'][0] == 0) uploadimgs('blog/'.$insertid);
				echo '<div class="message" type="success"></div>';
			}
			else echo '<div class="message" type="somthingwrong"></div>';
		}
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}
?>