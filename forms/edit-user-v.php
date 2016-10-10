<?php

if($acces==true && $level='1'){
	if(isset($_GET['action'])){

		switch($_GET['action']){
            case 'insert_cdp':
                if(isset($_POST['mail']) AND isset($_POST['level'])){
                    $mail = htmlentities($_POST['mail']);
                    $nom = htmlentities($_POST['nom']);
                    $prenom = htmlentities($_POST['prenom']);
                    $level = htmlentities($_POST['level']); // ça va dans le link_projet_user
                    $role = htmlentities($_POST['role']);
                    $id_bap = htmlentities($_POST['id_bap']);
                    // si un mail existe déjà à ce nom
                    $select_mail_existant=db_select('SELECT * FROM users_bap WHERE mail="'.$mail.'"');
                    if(isset($select_mail_existant[0])){ // si il y a déjà un mail existant
                        $panel="mail_existant_insert_bap";
                        include 'templates/validation.php';
                    }else{ // on inserte une personne, si qqun s'incrit avec son mail elle prendre ce compte
                        $insert = db_insert('users_bap', array('mail'=>$mail, 'prenom'=> $prenom, 'nom'=>$nom, 'role'=>3));
                        if(isset($insert)){
                            $insert_bap=db_insert('link_projet_user',array('id_user'=>$insert, 'id_projet'=>$id_bap, 'role'=>2, 'metier'=>$role));
                            if(isset($insert_bap)){
                                echo 'Validé ! <script>  window.location.href = "admin.php";</script> <a href="admin.php">Cliquez-ici pour valider</a>';
                            }else{
                                $tab_alerte['error']= "Problème lors du link de l'utilisateur avec le projet";
                                include 'blocs/erreur.php';
                            }
                        }else{
                            $tab_alerte['error']= "Problème lors de l'insertion de l'utilisateur dans la base bap_user";
                            include 'blocs/erreur.php';
                        }
                    }

                }
                break;
            case 'insert_user_into_bap':  //on ajoute un user existant dans une BAP
                if(isset($_POST['id_user_bap']) && isset($_POST['id_bap']))
                    $id_user_bap=htmlentities($_POST['id_user_bap']);
                    $id_bap=htmlentities($_POST['id_bap']);
                    $insert=db_insert('link_projet_user',array('id_user'=>$id_user_bap, 'id_projet'=>$id_bap, 'role'=>2));
                    if(isset($insert)){
                        echo 'Validé ! <script>  window.location.href = "admin.php";</script> <a href="admin.php">Cliquez-ici pour valider</a>';
                    }else{
                        $tab_alerte['error']= "Problème lors de l'insert";
                        include 'blocs/erreur.php';
                    }
                break;

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