<?php
include 'blocs/header-start.php';
include 'blocs/nav.php';

?>
<form method="post" action="home.php?panel=connexion">
	<p class="connect">
	<label for="pseudo"></label><input autofocus placeholder="pseudo" name="pseudo" type="text" id="pseudo" /><br />
	<label for="password"></label><input placeholder="mot de passe" type="password" name="password" id="password" />

	</p>
	<p class="connect-submit"><input type="submit" value="Connexion" /></p>
</form>
<a href="inscription.php">Pas encore inscrit ?</a>

<?php
include 'blocs/footer.php';

?>
	 