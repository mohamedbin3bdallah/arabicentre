<?php
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if(!empty($_FILES)) uploadimgs('slides');					
	else echo '<div class="message" type="somthingwrong"></div>';
}
?>