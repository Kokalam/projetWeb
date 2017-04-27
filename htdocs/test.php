<?php
	require_once('accessDataSQL.php');
	
	$acc= new accessDataSQL;
	$bdd=$acc->connexion();
	$bdd->exec('INSERT INTO utilisateur(nom, prenom, id, passwd, mail) VALUES(\'Stephane\', \'YVON\', \'kokalam\', \'az41fc02\', \'stephaneyvon\')');
	
	
?>
