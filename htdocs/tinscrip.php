<?php
	require_once('accessData.php');
	require_once('utilisateur.php');
	
	$user=new utilisateur($_POST['nom'],$_POST['prenom'],$_POST['pseudo'],$_POST['mail']);
	$acc=new accessData;
	if($acc->verifDB($user)==1)
	{
		header("refresh:0;url=inscription.php?error=1");
	}
	if($acc->verifDB($user)==2)
	{
		header("refresh:0;url=inscription.php?error=2"); 
	}
	if($acc->verifDB($user)==3)
	{
		if(strcmp($_POST['passwd'], $_POST['conf_passwd'])!=0)
		{
			header("refresh:0;url=inscription.php?error=3"); 
		}
		if(strcmp($_POST['passwd'], $_POST['conf_passwd'])==0)
		{
			echo "inscription réussis";
			$acc->addUtilisateur($user,$_POST['passwd']);
			header("refresh:0;url=connexion.php?inscrip=1");
		}
	}
	
?>
