<?php
include('libs/database.php');

//$thispage = getRowFromTable('*','pages','where page like "index.php"','');
$system = getRowFromTable('*','system','where id = 1','');
$genders = getAllDataFromTable('*','genders','','');
$single = getRowFromTable('*','blog','where active = 1 and id = '.$_GET['id'],'');
$contact = getRowFromTable('*','contact','where id = 1','');
?>