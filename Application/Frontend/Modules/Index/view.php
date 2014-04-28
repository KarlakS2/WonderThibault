
<article>
	<div class="content">
		<div class="classement">
			<ul>
				<?php foreach($classementGlobal as $user) { ?>
				<li>
					<img class="avatarClassement" src=<?php echo $user->getAvatar(); ?> />
					<p class="pseudo"><?php echo $user->getName(); ?></p>
					<p class="score"><?php echo $user->getScore(); ?></p>
				</li>
				<?php }?>
			</ul>
		</div>
		<div class="espaceUser">
			
			
			<?php if($connected) {?>
				<div class="infoAccueil" >
					<img class="avatarAccueil" src=<?php echo $userConnected->getAvatar(); ?> />
					<p> Joueur : <?php echo $userConnected->getName() ?> </p>
					<p> Meilleur score : <?php echo $userConnected->getScore() ?> </p>
				</div>
				<form class="Connexion" method="post" action="/Deconnexion" >
					<input class="boutonConnexion" name="deconnexion" type="submit" value="Deconnexion"/>
				</form>
				<hr/>
				<form class="Connexion" method="post" action="/jeu" >
					<input class="boutonConnexion" type="submit" value="Lancer une partie"/>
				</form>
				<hr/>
				<h1>Top 3 Amis</h1>
				<div class="classementAmis">
					<ul>
						<?php foreach($classementAmis as $user) { ?>
						<li>
							<img class="avatarClassement" src=<?php echo $user->getAvatar(); ?> />
							<p class="pseudo"><?php echo $user->getName(); ?></p>
							<p class="score"><?php echo $user->getScore(); ?></p>
						</li>
						<?php }?>
					</ul>
				</div>
				<hr/>
				<div class="groupeBouton">
					<form class="Connexion" method="post" action="/classementglobal" >
					<input class="boutonConnexion" type="submit" value="Classement Global"/>
					</form>
					<form class="Connexion" method="post" action="/classementamis" >
					<input class="boutonConnexion" type="submit" value="Classement Amis"/>
					</form>
				</div>
			<?php } else {?>
				<?php if(isset($txt)){ ?>
				<div class="msg">
				<p><?php echo $txt ?></p>
				</div>
			<?php } ?>
			
				<form class="Connexion" method="post" action="/" >
				<input class="pseudoConnexion" type="text" name="login" placeholder="Pseudo" required="required"/>
				<input class="mdpConnexion" type="password" name="mdp" placeholder="Mot de passe" required="required"/>
				<input class="boutonConnexion" name="connexion" type="submit" value="Connexion"/>
				</form>
			<hr/>
				<div class="groupeBouton">
					<!--<form class="Connexion" method="post" action="/jeu" >
					<input class="boutonConnexion" type="submit" value="Jouer Sans Connexion"/>
					</form>-->
					<form class="Connexion" method="post" action="/Register" >
					<input class="boutonConnexion" type="submit" value="Inscription"/>
					</form>
				</div>
			<hr/>
				<div class="groupeBouton">
					<form class="Connexion" method="post" action="/classementglobal" >
					<input class="boutonConnexion" type="submit" value="Classement Global"/>
					</form>
				</div>
			<?php } ?>
		</div>
	</div>
</article>	
