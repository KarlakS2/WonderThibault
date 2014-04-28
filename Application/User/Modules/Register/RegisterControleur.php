<?php
namespace Application\User\Modules\Register;

use \Library\Entities\User;

class RegisterControleur extends \Library\Controleur{

	use \Library\Validator;

	public function run(){
		if(isset($_POST['add'])){
			$userManager = $this->getManagerof("User");
			if(!isset($_POST['login']) || !$this->isValidString($_POST['login'])){
				$txt = "Login Invalide";
			}else if($userManager->exist($_POST['login']) != 0){
				$txt = "Ce login existe déjà";
			}else if(!isset($_POST['email']) || !$this->isValidMail($_POST['email'])){
				$txt = "Email invalide";
			}else if(!isset($_POST['mdp']) || empty($_POST['mdp']) || !isset($_POST['mdpv']) || empty($_POST['mdpv']) || $_POST['mdp'] !== $_POST['mdpv']){
				$txt = "Les mots de passe ne correspondent pas";
			}else{
				if(!isset($_POST['avatar']) || !$this->isValidURL($_POST['avatar']))
					$avatar = "uploads/avatar/avatar_neutre.jpg";
				else
					$avatar = $_POST['avatar'];
					
				$user = new User(array(
					'id'=> 0,
					'name' => $this->toString($_POST['login']),
					'email' => $this->toString($_POST['email']),
					'password' => sha1($_POST['mdp']),
					'avatar' => $this->toString($avatar),
					'score' => 0,
					'statut' => 0
					));
				$this->getManagerof("User")->add($user);
				$txt ='Votre enregistrement a bien été pris en compte.<a href="/">Retour accueil</a>';
			}
			$this->_app->getPage()->setVars('txt', $txt);
		}
	}
}