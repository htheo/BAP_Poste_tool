<?php

include 'blocs/header-start.php';
include 'blocs/nav-accueil.php';
include 'blocs/nav.php';


if (isset($_SESSION['pseudo'])){
	$acces=true;
	if(isset($id)){
		$id_user_admin=db_select('SELECT role FROM link_projet_user WHERE id_projet='.$donnees_projet[0]['id'].' && id_user='.$id);

		if(isset($id_user_admin[0])){
			$level=$id_user_admin[0]['role'];
		}
	}

    if(isset($_GET['panel'])){
    	switch($_GET['panel']){
    		case 'edit-posts':
    			include 'forms/edit-article-v.php';
    			break;
            case 'edit-users':
                include 'forms/edit-user-v.php';
                break;
			case 'edit-cycle':
				include 'forms/edit-cycle-v.php';
				break;
			case 'edit-start-projet-v':
				include 'forms/edit-start-projet-v.php';
				break;
			case 'export-pdf':
				$bap_users = db_select('SELECT * FROM link_projet_user AS u JOIN users_bap AS b ON b.id=u.id_user  WHERE u.id_projet='.$donnees_projet[0]["id"]);
				$cycles_fini=db_select('SELECT * FROM cycles_bap WHERE statut="fini" && id_projet='.$donnees_projet[0]["id"]);
				include 'forms/export-pdf.php';
				break;
    		default:
    			include 'blocs/default.php';
    			break;
    	}

    }else{
        include 'blocs/user-main.php';
    }

    
}
else{
    include 'blocs/default.php';
}
include 'blocs/footer.php';
?>
