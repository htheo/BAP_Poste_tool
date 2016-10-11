<?php
// fonction requetes sql

	//INSERT
function db_insert($table, $tab_valeurs, $debug=false){
	global $bdd;
	$tab_champs=array_keys($tab_valeurs);
	$tab_data=array_values($tab_valeurs);
	
	$sql = 'INSERT INTO '.$table.' ('.implode(', ', $tab_champs).') VALUES (:'.implode(', :', $tab_champs).')';
	$req = $bdd->prepare($sql);
	if ($req->execute($tab_valeurs)){
		$last_id = $bdd->lastInsertId();
		}
	else $last_id=-1;
	
	if ($debug) echo '<pre><code>'.$sql.'</code></pre>';
	
	return $last_id;
	}

	//UPDATE	
function db_update($table, $tab_valeurs, $tab_where, $debug=false){
	global $bdd;
	
	$sql = 'UPDATE '.$table.' SET ';
	
	$delim='';
	foreach ($tab_valeurs as $col=>$val){	
			$sql.=$delim.' '.$col.' = :'.$col;
			$delim=',';
			}
	
	if (!empty($tab_where)){
		$delim=' WHERE';
		foreach ($tab_where as $col=>$val){
			$sql.=$delim.' '.$col.' = :'.$col.' ';
			$delim='AND';
		}
	}
	else{
		echo 'Requete sans clause where impossible';
		}
		
	if ($debug) echo '<pre><code>'.$sql.'</code></pre>';
	
	$req = $bdd->prepare($sql);
	$tab_merged=array_merge($tab_valeurs, $tab_where);
	if ($req->execute($tab_merged)){
		$affected_rows = $req->rowCount();
		}
	else $affected_rows=-1;
	return $affected_rows;
	
	}
	
	//DELETE
function db_delete($table, $tab_where, $debug=false){
	global $bdd;
	
	$sql = 'DELETE FROM '.$table;
	
	if (!empty($tab_where)){
		$delim=' WHERE';
		foreach ($tab_where as $col=>$val){
		$sql.=$delim.' '.$col.' = :'.$col.' ';
		$delim='AND';
		}
		
	}
	else{
		echo 'Requete sans clause where impossible';
		}
		
	if ($debug) echo '<pre><code>'.$sql.'</code></pre>';
	
	$req = $bdd->prepare($sql);
	if ($req->execute($tab_where)){
		$affected_rows = $req->rowCount();
		}
	else $affected_rows=-1;
	return $affected_rows;
	
	}

	//SELECT
function db_select($sql, $tab_valeurs='', $debug=false, $optnum=''){
	global $bdd;
	if (empty($tab_valeurs)){
		$req = $bdd->query($sql);
		}
	else{
		//$req = $bdd->prepare('SELECT titre, auteur FROM actualites WHERE visible = ?  AND date <= ? ORDER BY date');
		$req = $bdd->prepare($sql);
		$req->execute($tab_valeurs);
		}
	if ($debug) echo '<pre><code>'.$sql.'</code></pre>';
	if ($optnum=='num') $donnees = $req->fetchAll(PDO::FETCH_NUM);//tableau associatif
	else $donnees = $req->fetchAll(PDO::FETCH_ASSOC);//tableau iteratif
	$req->closeCursor(); 
	
	return $donnees;
	}

function toRoute($name){
	$route=str_replace(" ","-",$name);
	return $route;
}
function routeToName($route){
	$name=str_replace("-"," ",$route);
	return $name;
}
function erreur($err='')
{
    $mess=($err!='')? $err:'Une erreur inconnue s\'est produite';
    exit('<p>'.$mess);
}

//se deconnecter
if(isset($_GET['logout'])&&$_GET['logout']==true){
	session_destroy();
	header('Location: accueil.php');
}
function get_users_from_projet($id_projet){
	$id_users = db_select('SELECT id_user, metier, role FROM link_projet_user WHERE id_projet='.$id_projet);
	$users=array();

	foreach ($id_users as $id_user){
		$cdps=db_select('SELECT * FROM users_bap WHERE id='.$id_user['id_user']);
		foreach ($cdps as $user){
			$id_cdp=$user["id"];
			$users[$id_cdp]=$user;
			$users[$id_cdp]['metier']=$id_user['metier'];
			$users[$id_cdp]['role_bap']=$id_user['role'];

		}

	}


	return $users;
}
function get_cdp_from_projet($id_projet){
	$id_users = db_select('SELECT id_user, metier FROM link_projet_user WHERE role=1 && id_projet='.$id_projet);
	$users=array();

	foreach ($id_users as $id_user){
		$cdps=db_select('SELECT * FROM users_bap WHERE id='.$id_user['id_user']);
		foreach ($cdps as $user){
			$id_cdp=$user["id"];
			$users[$id_cdp]=$user;
			$users[$id_cdp]['metier']=$id_user['metier'];

		}

	}

	return $users;
}
function get_technicien_from_projet($id_projet){
	$id_users = db_select('SELECT id_user, metier FROM link_projet_user WHERE role=2 && id_projet='.$id_projet);
	$users=array();

	foreach ($id_users as $id_user){
        $techniciens=db_select('SELECT * FROM users_bap WHERE id='.$id_user['id_user']);
        foreach ($techniciens as $user){
            $id_technicien=$user["id"];
            $users[$id_technicien]=$user;
            $users[$id_technicien]['metier']=$id_user['metier'];
        }

	}


	return $users;
}
function get_competences(){
	$competences=db_select('SELECT * FROM competences');
	return $competences;
}
function get_competences_from_cycle($id_cycle){
	$id_competences=db_select('SELECT id_competence FROM link_cycle_competence WHERE id_cycle='.$id_cycle);
	$competences=array();
	foreach ($id_competences as $id_competence){
		$name_competence=db_select('SELECT * FROM competences WHERE id='.$id_competence["id_competence"]);
		$competences[]=$name_competence[0]['name'];
	}
	return $competences;
}
function get_taches_from_cycle($id_cycle){
	$id_taches=db_select('SELECT * FROM taches WHERE id_cycle='.$id_cycle);
	$taches=array();
	foreach ($id_taches as $id_tache){
		$taches[$id_tache["id"]]["name"]=$id_tache["name"];
		$taches[$id_tache["id"]]["statut"]=$id_tache["statut"];
		$taches[$id_tache["id"]]["id"]=$id_tache["id"];
	}
	return $taches;
}
function convertir_date($date,$afficher_annee=0){//option=1 on garde l'année

	list($comm_an, $comm_mo, $comm_jo) = explode('-', $date);
	if($date=="0000-00-00"){
		return "date manquante";
	}
	elseif ($comm_jo<10) {
		if ($comm_jo=="01") $comm_jo="1er";
		else ($comm_jo=$comm_jo[1]);
	}

	if ($comm_mo == "1") $comm_mo="janvier";
	if ($comm_mo == "2") $comm_mo="fevrier";
	if ($comm_mo == "3") $comm_mo="mars";
	if ($comm_mo == "4") $comm_mo="avril";
	if ($comm_mo == "5") $comm_mo="mai";
	if ($comm_mo == "6") $comm_mo="juin";
	if ($comm_mo == "7") $comm_mo="juillet";
	if ($comm_mo == "8") $comm_mo="aout";
	if ($comm_mo == "9") $comm_mo="septembre";
	if ($comm_mo == "10") $comm_mo="octobre";
	if ($comm_mo == "11") $comm_mo="novembre";
	if ($comm_mo == "12") $comm_mo="décembre";
	if ($afficher_annee) return $comm_jo.' '.$comm_mo.' '.substr($comm_an,2,4);
	else return $comm_jo.' '.$comm_mo.' '.$comm_an;
}
?>
