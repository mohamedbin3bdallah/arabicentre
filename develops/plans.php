<?php
include('libs/database.php');

$where = ' order by title ASC';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('plans',$where);
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
	$row = getRowFromTable('*','plans',' where id = '.$_GET['id'],'');
}

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['title'] != '' && $_POST['description'] != '')
	{
		if(isset($_POST['active']) && $_POST['active'] == 'on') $_POST['active'] = 1;
		else $_POST['active'] = 0;
		
		if(isset($_POST['featured']) && $_POST['featured'] == 'on') $_POST['featured'] = 1;
		else $_POST['featured'] = 0;
		
		if(isset($_POST['oldid']))
		{
			if(!exist('plans',' where title like "'.$_POST['title'].'" and id <> '.$_POST['oldid']))
			{
				if(update('plans',' set title = "'.$_POST['title'].'" , fees = "'.$_POST['fees'].'" , description = "'.mysql_real_escape_string($_POST['description']).'" , active = '.$_POST['active'].' , featured = '.$_POST['featured'],' where id = '.$_POST['oldid'])) echo '<div class="message" type="success"></div>';
				else echo '<div class="message" type="somthingwrong"></div>';
			}
			else echo '<div class="message" type="invalidinput"></div>';
		}
		else
		{
			if(!exist('plans',' where title like "'.$_POST['title'].'"'))
			{
				if(insertRow('plans',$_POST)) echo '<div class="message" type="success"></div>';
				else echo '<div class="message" type="somthingwrong"></div>';
			}
			else echo '<div class="message" type="invalidinput"></div>';
		}
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}
?>