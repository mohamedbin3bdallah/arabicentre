<?php
include('libs/database.php');

$thispage = getRowFromTable('*','pages','where page like "register.php"','');
$system = getRowFromTable('*','system','where id = 1','');
$genders = getAllDataFromTable('*','genders','','');
$contact = getRowFromTable('*','contact','where id = 1','');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false && $_POST['password'] != '' && $_POST['username'] != '')
	{
		if(strlen($_POST['myusername']) < 5 || exist('users','where username like "'.$_POST['username'].'"')) header('Location: register.php?message=m3');
		else
		{
			if(exist('users','where email like "'.$_POST['email'].'"')) header('Location: register.php?message=m4');
			else
			{
				if($_POST['referral'] != '')
				{
					if(!exist('users','where email like "'.$_POST['referral'].'"')) header('Location: register.php?message=m5');
					else { $referral = $_POST['referral']; unset($_POST['referral']); }
				}
				else unset($_POST['referral']);


				$_POST['password'] = hash('sha256', $_POST['password'], FALSE);
				$_POST['code'] = uniqid(mt_rand(111111111,999999999));
				$_POST['time'] = time();
				//print_r($_POST);
				if(insertRow('users',$_POST))
				{
					if(isset($referral)) update('users','set freecourses = freecourses+1','where email like "'.$referral.'"');
					sendemail($_POST);
					header('Location: register.php?message=m6');
				}
				else header('Location: register.php?message=m2');
			}
		}
	}
	else header('Location: register.php?message=m1');
}
?>