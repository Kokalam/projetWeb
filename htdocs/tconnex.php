<?php
	session_start();
	require_once('accessData.php');
	require_once('utilisateur.php');
	
	$acc=new accessData;
	if($acc->verifConnex($_POST['identifiant'],$_POST['passwd']))
	{
		$_SESSION['user']=$_POST['identifiant'];
		header("refresh:0;url=acceuil.php");
	}
	else
	{
		header("refresh:0;url=connexion.php?error=1");
	}
?>

