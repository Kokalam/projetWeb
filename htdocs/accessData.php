<?php
	require_once('accessDataSQL.php');
	require_once('utilisateur.php');
	require_once('Noeud.php');
	require_once('Carte.php');
	
	class accessData
	{
		private $_bdd;
		private $_accDataSql;
		
		public function __construct()
		{
			$this->_accDataSql= new accessDataSQL;
			$this->_bdd=$this->_accDataSql->connexion();
		}
		
		
		/*****************************************
		FONCTION VERIFDB
		------------------------------------------
		Utilite : verifie si un login et un e-mail ne sont pa dejà utilisé par un utilisateur dans la base données
		En entree : un objet utilisateur
		En sortie : 1 si le pseudo est utilisé
		* 			2 si le mail est utilisé
		* 			3 si rien n'ets utilisé
		*****************************************/
		public function verifDB($user)
		{
			$ver= $this->_bdd->query('SELECT * FROM utilisateur');
			while($data=$ver->fetch())
			{
				if(strcmp($data[id], $user->id())==0)
				{
					return 1;
                }
				if(strcmp($data[mail], $user->mail())==0)
				{
					return 2;
				}
			}
			return 3;
		}
		
		
		/*****************************************
		FONCTION ADDUTILISATEUR
		------------------------------------------
		Utilite : Ajoute un utilisateur dans la base de données
		En entree : un objet utilisateur et le mot de passe de l'utilisateur
		*****************************************/		
		public function addUtilisateur($user, $pswd)
		{
			$nom=$user->nom();
			$prenom=$user->prenom();
			$id=$user->id();
			$mail=$user->mail();
			$this->_bdd->exec("INSERT INTO utilisateur(nom, prenom, id, passwd, mail) VALUES('$nom', '$prenom', '$id', '$pswd', '$mail')");
		}
		
		/*****************************************
		FONCTION ADDNOEUD
		------------------------------------------
		Utilite : Ajoute un nouveau noeud dans la table noeuds, puis ajoute tout 
		* 		  les noeud fils stocker dans le tbaleu de l'objet noeud en récursif
		En entree : l'id du noeud, le titre du noeud, l'id de la carte à laquelle il appartient et l'id du noeud parent
		En sortie : renvoi l'objet du noeud créé
		*****************************************/
		public function addNoeud($id, $titre, $idCarte, $idParents)
		{
			$node = new Noeud($titre, $id);
			$texte=$node->getTexte();
			$lien=$node->getLien();
			$image=$node->getImage();
			$video=$node->getVideo();
			try{
					$req = $this->_bdd->prepare("INSERT INTO noeuds(id, titre, idcarte, idparent, texte, lien, image, video)
						   VALUES(:id, :titre, :idcarte, :idparent, :texte, :lien, :image, :video)"); 
					$req->bindValue(':id', $id);
					$req->bindValue(':titre', $titre);
					$req->bindValue(':idcarte', $idCarte);
					$req->bindValue(':lien', $lien, PDO::PARAM_STR);
					$req->bindValue(':texte', $texte, PDO::PARAM_STR);
					$req->bindValue(':image', $image, PDO::PARAM_STR);
					$req->bindValue(':video', $video, PDO::PARAM_STR);
					$req->bindValue(':idparent', $idParents, PDO::PARAM_STR);
					$req->execute();			
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
			
			return $node;
		}
		
		/*****************************************
		FONCTION ADDCARTE
		------------------------------------------
		Utilite : ajoute une nouvelle carte à la base de données
		En entree : le nom de la carte, le titre de la carte, l'id de la carte, l'id du noeud racine, et la valeur d'accès à la carte (publique, prive, partage)
		En sortie : un objet de type carte
		*****************************************/
		public function addCarte($nomcarte, $titre, $id, $idnoeud, $acces)
		{
			$map=new Carte($nomcarte, $titre, $id, $idnoeud);
			$this->_bdd->exec("INSERT INTO carte(id, nom, acces) VALUES('$id', '$nomcarte', '$acces')");
			$this->addNoeud($idnoeud, $titre, $id, NULL);
			
			return $map;
		}
		
		/*****************************************
		FONCTION ADDEDIT
		------------------------------------------
		Utilite : ajoute un nouvel utilisateur pour une carte dans la base de données
		En entree : l'id de la carte, l'id de l'utilisateur puis le role de l'utilisateur
		*****************************************/
		public function addEdit($idCarte, $idUser, $role)
		{
			$this->_bdd->exec("INSERT INTO membre_groupe(idcarte, iduser, role) VALUES('$idCarte', '$idUser', '$role')");
		}
		
		/*****************************************
		FONCTION VERIFCONNEX
		------------------------------------------
		Utilite : verifie si un mot de passe et un login corresponde bien dans la base de données
		En entree : l'id de l'utilisateur et son mot de passe
		En sortie : retourne false si les deux ne correspondent pas
		* 			retourne true si le mot de passe et le login correspondent
		*****************************************/
		public function verifConnex($id, $pswd)
		{
			$ver=$this->_bdd->prepare('SELECT * FROM utilisateur WHERE id=? AND passwd=?');
			$ver->execute(array($id, $pswd));
			$num=$ver->rowCount();
			if($num==0)
			{
				return false;
			}
			else
			{
				return true;
			}

		}
		
		/*****************************************
		FONCTION RECUPUT
		------------------------------------------
		Utilite : recupère un utilisateur dans la base de données 
		En entree : l'id de l'utilisateur
		En sortie : un objet utilisateur initialisé avec les élément de la BDD
		*****************************************/
		public function recupUt($id)
		{
			$ver= $this->_bdd->prepare('SELECT * FROM utilisateur WHERE id=?');
			$ver->execute(array($id));
			if($data = $ver->fetch())
			{
				$use=new utilisateur($data[nom],$data[prenom],$data[id],$data[mail]);
			}
			
			return $use;
		}
		
		/*****************************************
		FONCTION IDCARTE
		------------------------------------------
		Utilite : verifie si un id de carte n'est pas déjà utilisé
		En entree : l'id de la carte à vérifier
		En sortie : false si déjà utilisé
		* 			true si pas encore
		*****************************************/
		public function idCarte($id)
		{
			$ver= $this->_bdd->prepare('SELECT * FROM carte WHERE id=?');
			$ver->execute(array($id));
			$num=$ver->rowCount();
			if($num==0)
				return true;
			else
				return false;
			
		}
		
		/*****************************************
		FONCTION IDNOEUD
		------------------------------------------
		Utilite : verifie si un id de noeud n'est pas déjà utilisé
		En entree : l'id du noeud à vérifier
		En sortie : false si déjà utilisé
		* 			true si pas encore
		*****************************************/
		public function idNoeud($id)
		{
			$ver= $this->_bdd->prepare('SELECT * FROM noeud WHERE id=?');
			$ver->execute(array($id));
			$num=$ver->rowCount();
			if($num==0)
				return true;
			else
				return false;
			
		}
		
	
	}
?>
