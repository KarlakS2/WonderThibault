<?php

namespace Application\Frontend\Modules\Index;


class IndexControleur extends \Library\Controleur {
	
	public function run(){
		//Manager
		$UserManager = $this->getManagerof('User');
		$AmisManager = $this->getManagerof('Amis');

		//classement global
		$classementGlobal = $UserManager->getClassement(5);
		
		if(isset($_POST['deconnexion'])){
		$this->_app->getUser()->deconnexion();
		$this->_app->getHTTPResponse()->redirect("/");
		}
		
		
		if(isset($_POST['connexion'])){
			$userManager = $this->getManagerof('User');

			if(isset($_POST['login']) && isset($_POST['mdp']) && !empty($_POST['login']) && !empty($_POST['mdp'])){
				$login = $_POST['login'];
				$mdp = sha1($_POST['mdp']);
				//$mdp = $_POST['mdp'];
				if(($id = $UserManager->exist($login)) != 0){
					$user = $UserManager->get($id); // Récupération utilisateur
					
					if($user->getPassword() === $mdp ){
						$this->_app->getUser()->Connexion($user);		
					}else{ //Cas inscription non valide ou mot de passe mauvais
						echo "la ??";
						$this->_app->getPage()->setVars('txt', "Pseudo ou mot de passe incorrect");
					}
				}else{ //Utilisateur inexistant
					$this->_app->getPage()->setVars('txt', "Pseudo ou mot de passe incorrect");
				}
			}else{
				$this->_app->getPage()->setVars('txt', "Pseudo ou mot de passe incorrect");
			}
		}
		$connected = $this->_app->getUser()->isConnected();
		if($connected)
		{
			$this->_app->getPage()->setVars('userConnected', $this->_app->getUser()->get('user'));
			
			//classement amis
			$classementAmis = $UserManager->getClassementAmis(3,$this->_app->getUser()->get('user')->getId());
			$this->_app->getPage()->setVars('classementAmis', $classementAmis);
		}
	
		$infoPage = "<p>Principe</p>
					<p>Tu ne sais pas quoi faire? Tu lances une petite partie pour passer le temps et avoir le meilleur score.</p>
					<hr/>
					<p>Une partie est une succession de mini jeu simple choisit aléatoirement.</p>
					<hr/>
					<p>Vous pouvez vous inscrire pour enregistrer vos scores, voir vos amis, donner votre avis et vos suggestions.</p>";
		
		$this->_app->getPage()->setVars('classementGlobal', $classementGlobal);
		$this->_app->getPage()->setVars('infoPage', $infoPage);
		$this->_app->getPage()->setVars('connected', $connected);
		//$this->_app->getPage()->setVars('title', '');
	}
}