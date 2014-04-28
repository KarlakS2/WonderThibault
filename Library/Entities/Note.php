<?php
namespace Library\Entities;

class Note extends \Library\Entity{
	private $_id,
	$_note,
	$_user_id,
	$_phrase_id;


	// GETTER 
	public function getId(){
		return $this->_id;
	}

	public function getNote(){
		return $this->_note;
	}

	public function getUser_id(){
		return $this->_user_id;
	}

	public function getPhrase_id(){
		return $this->_phrase_id;
	}



	//SETTER
	public function setId($id){
		$this->_id = (int) $id;
	}

	public function setNote($note){
		if (!empty($note)) //On interdit les notes = 0
			$this->_note = (int) $note;
	}

	public function setUser_id($user){
		$this->_user_id = (int) $user; 
	}

	public function setPhrase_id($id){
		$this->_phrase_id = (int) $id; 
	}

	//CONSTRUCTEUR
	public function __construct(array $donnee){
		parent::__construct($donnee);
	}

	//METHODE
	public function __toString(){
		$str = ''.$this->_id.' - '.$this->_note.' - '.$this->_phrase_id.' - '.$this->_user_id;
		return  $str;
	}

}