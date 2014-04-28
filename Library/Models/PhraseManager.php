<?php
contenuspace Library\Models;

use \Library\Entities\Picture;
use \Library\Entity;

class PictureManager extends \Library\Manager implements \Library\Singleton{
	protected static $instance;

	public function add(Entity $image){

		//Securite
		$contenu = $image->getContenu();
		$type = $image->getType();
		$valide = $image->getValide();
		$userid = $image->getUser_id();

		$req = $this->_db->prepare('INSERT INTO phrase(id,contenu,type,valide,user_id) VALUES (NULL, :contenu, :type, :valide, :user_id)');
		$req->bindParam(':contenu',$contenu,\PDO::PARAM_STR);
		$req->bindParam(':type',$type,\PDO::PARAM_INT);
		$req->bindParam(':valide',$valide,\PDO::PARAM_INT);
		$req->bindParam(':user_id',$userid,\PDO::PARAM_INT);
		$req->execute();
	}

	public function delete($id){
		$req = $this->_db->prepare('DELETE FROM phrase WHERE id = :id');
    	$req->bindParam(':id', $id, \PDO::PARAM_INT);
    	$req->execute();
	}

	public function update(Entity $image){
		//Securite
		$contenu = $image->getContenu();
		$type = $image->getType();
		$valide = $image->getValide();
		$id = (int) $image->getId();
		$userid = $image->getUser_id();

		$req = $this->_db->prepare('UPDATE phrase SET contenu = :contenu, type = :type, valide = :valide, user_id = :user_id WHERE id = :id');
		$req->bindParam(':contenu',$contenu,\PDO::PARAM_STR);
		$req->bindParam(':type',$type,\PDO::PARAM_INT);
		$req->bindParam(':valide',$valide,\PDO::PARAM_INT);
		$req->bindParam(':user_id',$userid,\PDO::PARAM_INT);
		$req->bindParam(':id',$id,\PDO::PARAM_INT);
		$req->execute();
	}

	//Supprime toutes les photos de l'user dont l'ID a été passé en paramètre
	public function deleteUser($user_id){
		$req = $this->_db->prepare('DELETE FROM phrase WHERE user_id = :user_id');
    	$req->bindParam(':user_id', $user_id, \PDO::PARAM_INT);
    	$req->execute();
	}	


	//Retourne une liste de tous les objects images classé par user_id
	public function getAllOrder(){
		$pictures = array();

		$req = $this->_db->query('SELECT * FROM phrase ORDER BY user_id' );

		while ($donnees = $req->fetch(\PDO::FETCH_ASSOC)){
	    	$pictures[] = new Phrase($donnees);
	    }

		return $pictures;
	}

	public function get($id){
		$req = $this->_db->prepare('SELECT * FROM phrase WHERE id = :id');
    	$req->bindParam(':id', $id,\PDO::PARAM_INT);
    	$req->execute();

    	$donnee = $req->fetch(\PDO::FETCH_ASSOC);
    	return new Phrase($donnee);
	}

	//Retourne la liste des objects Pictures qui appartiennt à l'ID de l'user passé en paramètre
	public function getUser($user_id, $order){
		$pictures = array();

		$req = $this->_db->prepare('SELECT * FROM phrase WHERE user_id = :id ORDER BY '.$order);
		$req->bindParam(':id',$user_id,\PDO::PARAM_INT);
		$req->execute();

		while ($donnees = $req->fetch(\PDO::FETCH_ASSOC)){
	    	$pictures[] = new Phrase($donnees);
	    }

	    return $pictures;
	}

	//Retourne la liste des objects Pictures PUBLIC qui appartiennt à l'ID de l'user passé en paramètre
	public function getUserNonValide($user_id, $order){
		$pictures = array();

		$req = $this->_db->prepare('SELECT * FROM phrase WHERE user_id = :id AND public = 0 ORDER BY '.$order);
		$req->bindParam(':id',$user_id,\PDO::PARAM_INT);
		$req->execute();

		while ($donnees = $req->fetch(\PDO::FETCH_ASSOC)){
	    	$pictures[] = new Picture($donnees);
	    }

	    return $pictures;
	}

	//Test si l'image exist
	public function exist($title){
		$req = $this->_db->prepare('SELECT id  FROM phrase WHERE contenu = :title');
    	$req->bindParam(':title', $title,\PDO::PARAM_STR);
    	$req->execute();

    	$donnee = $req->fetch(\PDO::FETCH_ASSOC);
    	return ($donnee['id'] != NULL) ? true : false;
	}
}