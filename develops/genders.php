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
	$noOfrows = getNoOfRowsFromTable('genders',$where);
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
	$row = getRowFromTable('title','genders',' where id = '.$_GET['id'],'');
}

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['title'] != '')
	{
		if(isset($_POST['oldid']))
		{
			if(!exist('genders',' where title like "'.$_POST['title'].'" and id <> '.$_POST['oldid']))
			{
				if(update('genders',' set title = "'.$_POST['title'].'"',' where id = '.$_POST['oldid'])) echo '<div class="message" type="success"></div>';
				else echo '<div class="message" type="somthingwrong"></div>';
			}
			else echo '<div class="message" type="invalidinput"></div>';
		}
		else
		{
			if(!exist('genders',' where title like "'.$_POST['title'].'"'))
			{
				if(insertRow('genders',$_POST)) echo '<div class="message" type="success"></div>';
				else echo '<div class="message" type="somthingwrong"></div>';
			}
			else echo '<div class="message" type="invalidinput"></div>';
		}
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}
?>