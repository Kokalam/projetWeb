<?php
	session_start();
	require_once('menu.php');
	require_once('accessData.php');
	require_once('utilisateur.php');
	$acc=new accessData;
	$user=$acc->recupUt($_SESSION['user']);
	$nom=$user->nom();
	$prenom=$user->prenom();
	$id=$user->id();
	$mail=$user->mail();
	$menu=affiche_menu_co();
?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Mon Compte</title>
		<link rel="stylesheet" href="menu.css">
	</head>
	<body>
		<?php echo $menu; ?>
		<div class="titre">
			<h1>Mon compte</h1>
		</div>
		<div class="information">
			<h2>Mes informations personnelles</h2><hr color="black"> 
			<p>
				Identifiant: <?php echo $id;?><br>
				Nom: <?php echo $nom;?><br>
				Prénom: <?php echo $prenom;?><br>
				Mail: <?php echo $mail;?><br>
			</p>
			<h2>Mes cartes</h2><hr color="black"> 
			<p>
				A implémenter
			</p>
		</div>
	</body>
</html>
	

