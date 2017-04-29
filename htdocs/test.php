<?php
	require_once('accessDataSQL.php');
	
	$acc=new accessDataSQL;
	$bdd=$acc->connexion();

	$bdd->exec("INSERT INTO noeuds(id, titre, idcarte, idparent, texte, lien, image, video) VALUES('15sdqf6', 'Bonjour', '2qsizv9u', NULL,NULL,NULL,NULL,NULL)");
	
	
?>
