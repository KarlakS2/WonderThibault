<?php if(isset($txt)){ ?>
	<div class="msg">
		<p><?php echo $txt ?></p>
	</div>
<?php } ?>

<form class="classementAmis" id="inscription" action="/Register" method="post">
	<h1>Inscription</h1>
		<label for="login"> 
							<input class="pseudoConnexion" id="login" type="text" name="login" placeholder="Identifiant" required="required"> 
							<div class="groupeur"><img src="uploads/info.png" /><span class="infoIncri"> Champ obligatoire </span></div>
		</label>
		<label for="email"> 	
							<input class="pseudoConnexion" id="email" type="email" name="email" placeholder="Email" required="required">
							<div class="groupeur"><img src="uploads/info.png" /><span class="infoIncri"> Champ obligatoire </span></div>
		</label>
		<label for="password1">	
							<input class="pseudoConnexion" id="password1" type="password" name="mdp" placeholder="Mot de passe" required="required">
							<div class="groupeur"><img src="uploads/info.png" /><span class="infoIncri"> Champ obligatoire </span></div>
		</label>
		<label for="password2"> 
							
							<input class="pseudoConnexion" id="password2" type="password" name="mdpv" placeholder="Vérification de mot de passe" required="required"> 
							<div class="groupeur"><img src="uploads/info.png" /><span class="infoIncri"> Champ obligatoire </span></div>
		</label>
		<!--<label for="avatar"> 
							<input class="pseudoConnexion" id="avatar" type="text" name="avatar" placeholder="URL Avatar"> 
							<div class="groupeur"><img src="uploads/info.png" /><span class="infoIncri"> Adresse URL d'une image </span></div>
		</label>-->
		

	<input class="boutonConnexion" type="submit" name="add" value="S'enregistrer">
</form>