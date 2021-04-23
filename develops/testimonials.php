<?php
include('libs/database.php');

$select = '*';
$where = 'order by title ASC';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('testimonials',$where);
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
	$row = getRowFromTable('*','testimonials','where id = '.$_GET['id'],'');
}

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['title'] != '')
	{
		if(isset($_POST['oldid']))
		{
			if($_FILES['file']['error'] == 0)	{ unlink('uploads/testimonials/'.$_POST['oldpicture']); $_POST['picture'] = uploadimgsreturn('testimonials'); }
			else $_POST['picture'] = $_POST['oldpicture'];
			
			if($_POST['picture'] && update('testimonials',' set title = "'.$_POST['title'].'" , description = "'.$_POST['description'].'" , picture = "'.$_POST['picture'].'"',' where id = '.$_POST['oldid']))	echo '<div class="message" type="success"></div>';
			else echo '<div class="message" type="somthingwrong"></div>';
		}
		else
		{
			$_POST['picture'] = uploadimgsreturn('testimonials');
			if(insertRow('testimonials',$_POST))	echo '<div class="message" type="success"></div>';
			else echo '<div class="message" type="somthingwrong"></div>';
		}
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}
?>