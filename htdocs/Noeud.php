<?php

class Noeud
{
	
	private $_titre = "";
	private $_image=NULL; 
	private $_lien=NULL; 
	private $_texte=NULL;
	private $_video=NULL; 
    private $_fils = array();//stocke les fils de ce noeud
    private $_id;
	
	public function __construct($titre, $id)
	{
		$this->setTitre($titre);
		$this->setId($id);
	}

	public function setTitre($titre)
	{
		$this->_titre = $titre;
	}
	
	public function getTitre()
	{
		return $this->_titre;
	}
	
	public function setId($id)
	{
		$this->_id=$id;
	}
	
	public function getId()
	{
		return $this->_id;
	}
	
	
	public function getImage()
	{
		return $this->_image;
	}
	public function setImage($image)
	{
		$this->_image=$image;
	}
	
	public function getLien()
	{
		return $this->_lien;
	}
	public function setLien($lien)
	{
		$this->_lien=$lien;
	}
	
	public function getTexte()
	{
		return $this->_texte;
	}
	public function setTexte($texte)
	{
		$this->_texte=$texte;
	}
	
	public function getVideo()
	{
		return $this->_video;
	}
	public function setVideo($video)
	{
		$this->_video=$video;
	}
	
	public function addFils($fils)
	{
		$this->fils[]=$fils;
	}
	
	public function indexFils($id)
	{
		$i=0;
		while(strcmp($this->_fils[$i]->getId(),$id)!=0)
		{
			$i++;
		}
		return $i;
	}
	
	public function delFils($id)
	{
		try{
			unset($this->_fils[$this->indexFils($id)]);
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}
	
	public function recupFils($i)
	{
		return $this->_fils[$i];
	}
	
	public function recupFilsById($id)
	{
		try{
			return($this->_fils[$this->indexFils($id)]);
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}
	
	public function getFils()
	{
		return $this->_fils;
	}
}
?>
