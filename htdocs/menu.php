<?php
	function affiche_menu()
	{
		$tab_menu_lien = array("acceuil.php", "lcarte.php", "verCoCarte.php", 
		"connexion.php", "inscription.php");
		$tab_menu_texte = array("Accueil", "Cartes Heuristiques", "Créer une Carte",
		"Connexion", "Inscription");
		
		$p_cour= pathinfo($_SERVER['PHP_SELF']);
		
		$menu = "\n<div id=\"menu\">\n    <ul id=\"onglets\">\n";
		
		foreach($tab_menu_lien as $cle=>$lien)

        {

            $menu .= "    <li";

                

            // si le nom du fichier correspond à celui pointé par l'indice, alors on l'active

            if( $p_cour['basename'] == $lien )

            $menu .= " class=\"active\"";

                

            $menu .= "><a href=\" $lien \">$tab_menu_texte[$cle]</a></li>\n";

        }

        $menu .= "</ul>\n    </div>";

        // on renvoie le code xHTML
        return $menu;
     }
     
     function affiche_menu_co()
	{
		$tab_menu_lien = array("acceuil.php", "lcarte.php", "verCoCarte.php", "compte.php", "deconnexion.php");
		$tab_menu_texte = array("Accueil", "Cartes Heuristiques", "Créer une Carte", "Mon Compte", "Déconnexion");
		
		$p_cour= pathinfo($_SERVER['PHP_SELF']);
		
		$menu = "\n<div id=\"menu\">\n    <ul id=\"onglets\">\n";
		
		foreach($tab_menu_lien as $cle=>$lien)

        {

            $menu .= "    <li";

                

            // si le nom du fichier correspond à celui pointé par l'indice, alors on l'active

            if( $p_cour['basename'] == $lien )

            $menu .= " class=\"active\"";

                

            $menu .= "><a href=\" $lien \">$tab_menu_texte[$cle]</a></li>\n";

        }

        $menu .= "</ul>\n    </div>";

        // on renvoie le code xHTML
        return $menu;
     }
?>




