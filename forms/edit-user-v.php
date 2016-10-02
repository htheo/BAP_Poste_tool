<?php

if($acces==true && $level='1'){
	if(isset($_GET['action'])){

		switch($_GET['action']){


			case 'update':
				if(isset($_POST['updatemail']) AND isset($_POST['updatelevel'])){
					$id = htmlentities($_POST['id']);
		            $mail = htmlentities($_POST['updatemail']);
                    $nom = htmlentities($_POST['updatenom']);
                    $prenom = htmlentities($_POST['updateprenom']);
		            $level = htmlentities($_POST['updatelevel']);
                    $role = htmlentities($_POST['updaterole']);
		            $update = db_update('users_bap', array('mail'=>$mail, 'prenom'=> $prenom, 'nom'=>$nom, 'admin'=>$level, 'role'=>$role), array('id'=>$id));
			        if(isset($update)){
			            echo 'Validé ! <script>  window.location.href = "admin.php";</script> <a href="admin.php">Cliquez-ici pour valider</a>';
		            }else{
		                $tab_alerte['error']= "Problème lors de l'update";
		                include 'blocs/erreur.php';
		            }
		        }
	           
	         

				break;
			case 'insert':
				if(isset($_POST['mail']) AND isset($_POST['level'])){
		            $mail = htmlentities($_POST['mail']);
                    $nom = htmlentities($_POST['nom']);
                    $prenom = htmlentities($_POST['prenom']);
		            $level = htmlentities($_POST['level']);
                    $role = htmlentities($_POST['role']);
		            $insert = db_insert('users_bap', array('mail'=>$mail, 'prenom'=> $prenom, 'nom'=>$nom, 'admin'=>$level, 'role'=>$role));
			        if(isset($insert)){
			            echo 'Validé ! <script>  window.location.href = "admin.php";</script> <a href="admin.php">Cliquez-ici pour valider</a>';
		            }else{
		                $tab_alerte['error']= "Problème lors de l'insertion";
		                include 'blocs/erreur.php';
		            }
		        }
				break;


			default:
                $tab_alerte['error']= "Problème lors de l'insertion";
                include 'blocs/erreur.php';
				break;
		}
	}
}else{
	$tab_alerte['error']= "Vous n'avez pas les droits";
	include 'blocs/erreur.php';
}