<?php
if(isset($_SESSION['pseudo'])||isset($pseudo)){
	if(isset($_GET['panel'])){
		switch ($_GET['panel']) {
			case 'connexion':
				include 'blocs/dashboard.php';
				break;
			
			default:
				# code...
				break;
		}
	}else{
		
		include('blocs/dashboard.php');
	}






}else{
	echo 'coucou';
	$tab_alerte['error']="erreur";
	include('blocs/erreur.php');
}




?>