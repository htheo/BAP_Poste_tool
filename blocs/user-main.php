<?php
if(isset($_SESSION['pseudo'])||isset($pseudo)){
	if(isset($_GET['panel'])){
		switch ($_GET['panel']) {
			case 'connexion':

                if($level==1){
                    include('blocs/dashboard.php');
                }
				break;
			
			default:
				# code...
				break;
		}
	}else{
		if($level==1){
            include('blocs/dashboard.php');
        }else if ($level==2){

        }

	}






}else{
	echo 'coucou';
	$tab_alerte['error']="erreur";
	include('blocs/erreur.php');
}




?>