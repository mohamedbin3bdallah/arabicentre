<?php
include('libs/database.php');

$select = 'courses.id as id,courses.title as title,courses.description as description,courses.picture as picture,courses.active as active,fields.title as fieldtitle,genders.title as gendertitle';
$where = ' inner join fields on courses.fieldid = fields.id inner join genders on fields.genderid = genders.id order by genders.title,fields.title,courses.title ASC';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('courses',$where);
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
	$row = getRowFromTable('courses.title as title,courses.description as description,courses.picture as picture,courses.fieldid as fieldid,courses.active as active,fields.genderid as genderid','courses','inner join fields on courses.fieldid = fields.id where courses.id = '.$_GET['id'],'');
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
			if($_FILES['file']['error'] == 0)	{ unlink('uploads/courses/'.$_POST['oldpicture']); $_POST['picture'] = uploadimgsreturn('courses'); }
			else $_POST['picture'] = $_POST['oldpicture'];
			
			if(update('courses',' set fieldid = '.$_POST['fieldid'].' , active = '.$_POST['active'].' , title = "'.$_POST['title'].'" , description = "'.mysql_real_escape_string($_POST['description']).'" , picture = "'.$_POST['picture'].'"',' where id = '.$_POST['oldid']))	echo '<div class="message" type="success"></div>';
			else echo '<div class="message" type="somthingwrong"></div>';
		}
		else
		{
			unset($_POST['genderid']);
			$_POST['time'] = time();
			$_POST['picture'] = uploadimgsreturn('courses');
			if(insertRow('courses',$_POST))	echo '<div class="message" type="success"></div>';
			else echo '<div class="message" type="somthingwrong"></div>';
		}
	}
	else echo '<div class="message" type="inputnotcorrect"></div>';
}
?>