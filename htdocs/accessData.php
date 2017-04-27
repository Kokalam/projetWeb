<?php
	require_once('accessDataSQL.php');
	//require_once('accessDataSQL.php');
	class accessData
	{
		private $_bdd;
		private $_accDataSql;
		
		public function __construct()
		{
			$this->_accDataSql= new accessDataSQL;
			$this->_bdd=$this->_accDataSql->connexion();
		}
		
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
		
		public function addUtilisateur($user, $pswd)
		{
			$nom=$user->nom();
			$prenom=$user->prenom();
			$id=$user->id();
			$mail=$user->mail();
			$this->_bdd->exec("INSERT INTO utilisateur(nom, prenom, id, passwd, mail) VALUES('$nom', '$prenom', '$id', '$pswd', '$mail')");
			
			echo "$nom";
		}
		
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
		
		public function recupUt($user, $pswd)
		{
			$ver= $this->_bdd->prepare('SELECT * FROM utilisateur WHERE id=? AND passwd=?');
			$ver->execute(array($id, $pswd));
			while ($data = $ver->fetch())
			{
				$user=new utilisateur($data['nom'],$data['prenom'],$data['id'],$data['mail']);
			}
			return $user;
		}
	
	}
?>
