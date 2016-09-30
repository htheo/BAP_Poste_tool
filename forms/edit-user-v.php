<?php

if($acces==true && $level='1'){
	if(isset($_GET['action'])){

		switch($_GET['action']){


			case 'update':
				if(isset($_POST['updatepseudo']) AND isset($_POST['updatelevel'])){
					$id = htmlentities($_POST['id']);
		            $pseudo = htmlentities($_POST['updatepseudo']);
		            $level = htmlentities($_POST['updatelevel']);
		            $update = db_update('users', array('useradmin'=>$pseudo, 'admin'=>$level), array('id'=>$id));
			        if(isset($update)){
			            echo 'Validé ! <script>  window.location.href = "admin.php";</script> <a href="admin.php">Cliquez-ici pour valider</a>';
		            }else{
		                $tab_alerte['error']= "Problème lors de l'update";
		                include 'blocs/erreur.php';
		            }
		        }
	           
	         

				break;
			case 'insert':
				if(isset($_POST['pseudo']) AND isset($_POST['level'])){
		            $pseudo = htmlentities($_POST['pseudo']);
		            $level = htmlentities($_POST['level']);
		            $insert = db_insert('users', array('useradmin'=>$pseudo, 'admin'=>$level));
			        if(isset($insert)){
			            echo 'Validé ! <script>  window.location.href = "admin.php";</script> <a href="admin.php">Cliquez-ici pour valider</a>';
		            }else{
		                $tab_alerte['error']= "Problème lors de l'insertion";
		                include 'blocs/erreur.php';
		            }
		        }
				break;


			default:
				echo 'dommage';
				break;
		}
	}
}else{
	$tab_alerte['error']= "Vous n'avez pas les droits";
	include 'blocs/erreur.php';
}