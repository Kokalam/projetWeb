<?php

class accessDataSQL
{
	private $_host="127.0.0.1";
	private $_dbname="projetweb";
	private $_user="root";
	private $_pswd="root";
	private $_bdd;
	
	public function connexion()
	{
		try
		{
			$this->_bdd = new PDO("mysql:host=$this->_host;dbname=$this->_dbname;charset=utf8", $this->_user, $this->_pswd);
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		return $this->_bdd;
	}
}

?>


