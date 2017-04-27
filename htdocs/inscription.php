<?php
	session_start();
	require_once('menu.php');
	$menu=affiche_menu();
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="menu.css">
 </head>
	<body>
		<?php echo $menu; ?>
		<div class="titre">
			<h1>Inscription</h1>
		</div>
		<?php if($_GET['error']==1)
			  {
					echo "<p class=error> Pseudo déjà utilisé </p>";
			  }
			  if($_GET['error']==2)
			  {
					echo "<p class=error> E-Mail déjà utilisé </p>";
			  }
			  if($_GET['error']==3)
			  {
					echo "<p class=error> Mot de passe différent de la confirmation </p>";
			  }
		?>
		<div class="inscription">
			<form method="post" action="tinscrip.php">
				<p>
					Nom: <input type="text" name="nom" onKeyUp="maxLength(this,50);" /> <br>
					Prénom: <input type="text" name="prenom" onKeyUp="maxLength(this,50);" /><br>
					Mot de passe: <input type="password" name="passwd" onKeyUp="maxLength(this,50);" /><br>
					Confirmation du mot de passe: <input type="password" name="conf_passwd" onKeyUp="maxLength(this,50);" /><br>
					Pseudo: <input type="text" name="pseudo" onKeyUp="maxLength(this,50);" /><br>
					E-Mail: <input type="text" name="mail" onKeyUp="maxLength(this,50);" /><br>
					<input type="submit" value="Valider"/>
					
				</p>
			</form>
		</div>
	</body>
</html>
