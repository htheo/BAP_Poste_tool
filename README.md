# Back-office 
Créer son fichier baseconnect.php dans le dossier include/
<?php
$db_host='';
$db_name='';
$db_charset='utf8';
$db_user='';
$db_pass='';


try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset='.$db_charset.'', $db_user, $db_pass);
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur Connexion: '.$e->getMessage());
}
?>


# Niveau d'admin

1 - super admin - CDP
2 - intervenant
3 - techos
