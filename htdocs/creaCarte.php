<?php
	session_start();
	require_once('menu.php');
	$menu=affiche_menu_co();   
?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Project of doom</title>
		<link rel="stylesheet" href="menu.css">
	</head>
	<script language="javascript">
		var cpt=0;
		function ajouter()
		{
			var str='';
			var roles=new Array("administrateur","editeur","visionneur");
			str+='<select size=1 name="role'+cpt+'">';
			str+='<datalist id=role'+cpt+' >'
			for(var i=0;i<roles.length;i++)
			{
				str+='<option> '+roles[i]+'';
			}
			str+='</datalist>';
			str+='</select>';
			document.getElementById('utili').innerHTML+=str;
			
			var newUt = document.createElement('input');
			newUt.type="text";
			newUt.name="uti"+cpt;
			document.getElementById('utili').appendChild(newUt);
			
			cpt++;
		}
	</script>
	<body>
		<?php echo $menu; ?>
		<div class="titre">
			<h1>Paramètre de la carte</h1>
		</div>
		<div class="formulaire">
			<form method="post" action="sauvCarte.php">
				<p>
					Nom de la carte: <input type="text" name="nom" onKeyUp="maxLength(this,50);" /> <br>
					Accès à la carte: <select size=1 name="acces">
										<datalist id=acces >
										   <option> publique
										   <option> prive
										   <option> partage
										</datalist>
									  </select>
					<h2>Noeud Racine</h2><hr>
					Nom du noeud: <input type="text" name="nomNoeud" onKeyUp="maxLength(this,50);" /> <br>
					<h2>Utilisateur</h2><hr id="utili">
					<input type ="button" value="Ajouter utilisateur" onclick="ajouter()"/>
					<input type="submit" value="Créer"/>
					
					
					
				</p>
			</form>
			
		</div>
	</body>
</html>


