
<div class="connection">
	<h1>Créer votre projet BAP</h1>
	<form method="post" action="home.php?panel=creer-projet&action=insert">
		<p class="connect"><?php
		if(empty($pseudo)){
			?>
			<label for="nom"></label><input autofocus placeholder="Votre nom" name="nom" type="text" id="nom" /><br />
			<label for="prenom"></label><input placeholder="Votre prénom" type="text" name="prenom" id="prenom" />
			<label for="mail"></label><input autofocus placeholder="Votre mail (à utiliser pour se connecter)" name="mail" type="email" id="mail" /><br />
			<label for="password"></label><input placeholder="mot de passe" type="password" name="password" id="password" />

			<?php
		}
			?>
		<label for="name"></label><input autofocus placeholder="Nom de la BAP" name="name" type="text" id="name" /><br />
		<label for="brief"></label><input placeholder="Brief du projet" type="text" name="brief" id="brief" />

		</p>
		<p class="connect-submit"><input type="submit" value="Créer" /></p>
	</form>
</div>