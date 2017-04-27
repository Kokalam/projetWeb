<?php
	session_start();
	require_once('menu.php');
	
	if(isset($_SESSION['user']))
    {
        $menu=affiche_menu_co();
    } 
    else
    {
		$menu=affiche_menu();
	}
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Project of doom</title>
	<link rel="stylesheet" href="menu.css">
 </head>
	<body>
		<?php echo $menu; ?>
	</body>
</html>
