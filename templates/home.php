<?php
include 'blocs/header-start.php';
include 'blocs/nav.php';




if(isset($_GET['panel'])){
	switch ($_GET['panel']) {
		case 'connexion':
			if(isset($_POST['pseudo']) && isset($_POST['password'])){
				$pseudo=htmlentities($_POST['pseudo']);
				$password=htmlentities($_POST['password']);
				include 'forms/connexion-v.php';
			}else{
				$tab_alerte['error']="erreur";
				header('Location: connexion.php');
			}
			
			break;
		case 'inscription':
			if(isset($_POST['pseudo']) && isset($_POST['password'])){
				$pseudo=htmlentities($_POST['pseudo']);
				$password=htmlentities($_POST['password']);
				include 'forms/inscription-v.php';
			}else{
				$tab_alerte['error']="Problème lors de l'inscription";
				include 'blocs/erreur.php';
			}
			break;
		
		default:
			include 'blocs/default.php';
			break;
	}
}else{
    include 'blocs/default.php';
}



include 'blocs/footer.php';

?>
