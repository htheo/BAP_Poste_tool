<?php
include 'blocs/header-start.php';
include 'blocs/nav.php';

?>
<div class="connection">
	<h1>Demande d'inscription à la BAP La Poste</h1>
	<form method="post" action="home.php?panel=inscription">
		<p class="connect">
		<label for="pseudo"></label><input autofocus placeholder="pseudo" name="pseudo" type="text" id="pseudo" /><br />
		<label for="password"></label><input placeholder="mot de passe" type="password" name="password" id="password" />

		</p>
		<p class="connect-submit"><input type="submit" value="Inscription" /></p>
	</form>
</div>

<?php
include 'blocs/footer.php';

?>
	 