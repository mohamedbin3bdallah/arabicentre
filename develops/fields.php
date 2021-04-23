<?php
include('libs/database.php');

$select = 'fields.id as id,fields.genderid as genderid,fields.title as fieldtitle,fields.picture as picture,genders.title as gendertitle';
$where = ' inner join genders on fields.genderid = genders.id order by genders.title,fields.title ASC';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('fields',$where);
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
	$row = getRowFromTable('genderid,title,picture','fields',' where id = '.$_GET['id'],'');
}

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['title'] != '')
	{
		if(isset($_POST['oldid']))
		{			
			if(!exist('fields',' where genderid = '.$_POST['genderid'].' and title like "'.$_POST['title'].'" and id <> '.$_POST['oldid']))
			{
				if($_FILES['file']['error'] == 0)	{ unlink('uploads/fields/'.$_POST['oldpicture']); $_POST['picture'] = uploadimgsreturn('fields'); }
				else $_POST['picture'] = $_POST['oldpicture'];
				
				if(update('fields',' set genderid = '.$_POST['genderid'].' , title = "'.$_POST['title'].'" , picture = "'.$_POST['picture'].'"',' where id = '.$_POST['oldid'])) echo '<div class="message" type="success"></div>';
				else echo '<div class="message" type="somthingwrong"></div>';
			}
			else echo '<div class="message" type="invalidinput"></div>';
		}
		else
		{
			if(!exist('fields',' where genderid = '.$_POST['genderid'].' and title like "'.$_POST['title'].'"'))
			{
				$_POST['picture'] = uploadimgsreturn('fields');
				if(insertRow('fields',$_POST)) echo '<div class="message" type="success"></div>';
				else echo '<div class="message" type="somthingwrong"></div>';
			}
			else echo '<div class="message" type="invalidinput"></div>';
		}
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}
?>