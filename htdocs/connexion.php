<?php
	session_start();
	require_once('menu.php');
	$menu=affiche_menu();
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Connexion</title>
	<link rel="stylesheet" href="menu.css">
 </head>
	<body>
		<?php echo $menu; ?>
		<div class="titre">
			<h1>Connexion</h1>
		</div>
		<div>
			<?php
				if($_GET['inscrip']==1)
				{
					echo "<p class='confirm'> Inscription réussis, vous pouvez maintenant vous connecter avec vos identifiants </p>";
				}
			?>
		</div>
		<div class="connexion">
			<form method="post" action="tconnex.php">
				Identifiant<br>
				<input type="text" name="identifiant" onKeyUp="maxLength(this,50);" /><br>
				Mot de passe<br>
				<input type="password" name="passwd" onKeyUp="maxLength(this,50);" /><br>
				<input type="submit" value="Connexion"/>
			</form>
		</div>
	</body>
</html>
