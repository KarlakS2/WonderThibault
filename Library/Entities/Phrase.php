<?php
namespace Library\Entities;

class Phrase extends \Library\Entity{
	private $_id,
	$_contenu,
	$_type,
	$_valide,
	$_user_id;


	// GETTER 
	public function getId(){
		return $this->_id;
	}

	public function getContenu(){
		return $this->_contenu;
	}

	public function getType(){
		return $this->_Type;
	}

	public function getValide(){
		return $this->_valide;
	}

	public function getUser_id(){
		return $this->_user_id;
	}

	//SETTER
	public function setId($id){
		$this->_id = (int) $id;
	}

	public function setContenu($name){
		if (is_string($name) && !empty($name))
			$this->_name = $name;
	}

	public function setType($size){
		$this->_type = (int) $size;
	}

	public function setValide($width){
		$this->_valide = (int) $width;
	}

	public function setUser_id($id){
		$this->_user_id = (int) $id;
	}

	//CONSTRUCTEUR
	public function __construct(array $donnee){
		parent::__construct($donnee);
	}

	//METHODE
	public function __toString(){
		$str = 'Type = Phrase'."\r\n";
		$str .= 'contenu : '.$this->getContenu()."\r\n";
		$str .= 'type : '.$this->getType()."\r\n";
		$str .= 'valide : '.$this->getValide()."\r\n";
		$str .= 'user : '.$this->getUser();
		return  $str;
	}
}