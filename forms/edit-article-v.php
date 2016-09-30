<?php

if($acces==true){
	if(isset($_GET['action'])){

		switch($_GET['action']){


			case 'update':
				if(isset($_POST['updatetitle']) AND isset($_POST['updatedesc'])){
					$id = htmlentities($_POST['id']);
		            $title = htmlentities($_POST['updatetitle']);
		            $description = htmlentities($_POST['updatedesc']);
		            $update = db_update('posts', array('title'=>$title, 'description'=>$description), array('id'=>$id));
			        if(isset($update)){
			            echo 'Validé ! <script>  window.location.href = "admin.php";</script> <a href="admin.php">Cliquez-ici pour valider</a>';
		            }else{
		                $tab_alerte['error']= "Problème lors de l'update";
		                include 'blocs/erreur.php';
		            }
		        }
	           
	         

				break;




			case 'insert':
				if(isset($_POST['title']) AND isset($_POST['desc'])){
		            $title=htmlentities($_POST['title']);
		            $description=htmlentities($_POST['desc']);
		            $date_creation=htmlentities($_POST['date']);
		            $insert = db_insert('posts', array('title'=>$title, 'description'=>$description, 'date_creation'=>$date_creation));
		            if(isset($insert)){
		            	echo 'Validé ! <script>  window.location.href = "admin.php";</script> <a href="admin.php">Cliquez-ici pour valider</a>';
		            }else{
		                $tab_alerte['error']= "Problème lors de l'insertion";
		                include 'blocs/erreur.php';
		            }
		        }else{
		            $title = NULL;
		            $desc = NULL;
		            $date = NULL;
		        }
				
				break;





			case 'select':
				if(isset($_GET['id'])){
					$data=db_select();
				}else{
					$tab_alerte['error']="Pas d'article";
					include 'blocs/erreur.php';
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