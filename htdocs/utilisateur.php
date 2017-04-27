<?php
	class utilisateur
	{
		private $_nom;
		private $_prenom;
		private $_id;
		private $_mail;
		
		public function __construct($nom,$prenom,$id,$mail)
		{
			$this->setNom($nom);
			$this->setPrenom($prenom);
			$this->setId($id);
			$this->setMail($mail);
		}
		
		public function nom()
		{
			return $this->_nom;
		}
		public function prenom()
		{
			return $this->_prenom;
		}
		public function id()
		{
			return $this->_id;
		}
		public function mail()
		{
			return $this->_mail;
		}
		
		public function setNom($nom)
		{
			$this->_nom=$nom;
		}
		public function setPrenom($prenom)
		{
			$this->_prenom=$prenom;
		}
		public function setId($id)
		{
			$this->_id=$id;
		}
		public function setMail($mail)
		{
			$this->_mail=$mail;
		}
	}
?>
