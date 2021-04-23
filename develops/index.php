<?php
include('libs/database.php');

$thispage = getRowFromTable('*','pages','where page like "index.php"','');
$system = getRowFromTable('*','system','where id = 1','');
$genders = getAllDataFromTable('*','genders','','');
$testimonials = getAllDataFromTable('*','testimonials','','');
$lastcourses = getAllDataFromTable('*','courses','where active = 1 order by time desc',' limit 4');
$plans = getAllDataFromTable('*','plans','where active = 1','');
$contact = getRowFromTable('*','contact','where id = 1','');
?>