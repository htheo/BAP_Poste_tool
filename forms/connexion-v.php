<?php
if(isset($pseudo) && isset($password)){

	$data=db_select('SELECT * FROM users_bap WHERE mail="'.$pseudo.'"');
        if (isset($data) && $data[0]['password'] == md5($password)) // Acces OK !
        {

            $_SESSION['pseudo'] = $data[0]['mail'];
            $_SESSION['level'] = $data[0]['admin'];
            $_SESSION['id'] = $data[0]['id'];
            $pseudo = $_SESSION['pseudo'];
            $id = $_SESSION['id'];
            $level = $_SESSION['level'];
            echo 'Validé ! <script>  window.location.href = "accueil.php";</script> <a href="accueil.php">Vous êtes bien connecté</a>';


        }
        else // Acces pas OK !
        {
            $tab_alerte['error']= '<a href="connexion.php">Votre pseudo ou mdp n\'est pas correct, veuillez réessayer</a>';
            include 'templates/404.php';
        }
}
?>
