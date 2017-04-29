<?php
require_once('Noeud.php');

class Carte
{
	private $_nomcarte;
	private $_noeud;
	private $_id;
	
	public function __construct($nomcarte, $titre, $id, $idnoeud)
	{
		$this->setNom($nomcarte);
		$noeud = new Noeud($titre, $idnoeud);
		$this->setNoeud($noeud);
		$this->setId($id);
	}
	
	public function setNom($name)
	{
		$this->_nomcarte = $name;
	}
	
	public function getNom()
	{
		return $this->_nomcarte;
	}
	public function setId($id)
	{
		$this->_id=$id;
	}
	
	public function getId()
	{
		return $this->_id;
	}
	
	public function setNoeud($noeud)
	{
		$this->_noeud = $noeud;
	}
	
	public function getNoeud()
	{
		return $this->_noeud;
	}
	
	/*public function chargerXML()
	{
		
	}
	
	public function sauvegarderXML()
	{
		
	}*/
}
?>
