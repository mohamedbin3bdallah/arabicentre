<?php
include('libs/database.php');

//$thispage = getRowFromTable('*','pages','where page like "index.php"','');
$category = getRowFromTable('*','genders','where id = '.$_GET['id'],'');
$system = getRowFromTable('*','system','where id = 1','');
$genders = getAllDataFromTable('*','genders','','');
$contact = getRowFromTable('*','contact','where id = 1','');


$where = 'where genderid = '.$_GET['id'];
$resultsPerPage = 15;
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
$fields = getAllDataFromTable('*','fields',$where,$limit);
?>