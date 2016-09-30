<?php
if(isset($pseudo) && isset($password)){

	$data=db_select('SELECT * FROM users WHERE useradmin="'.$pseudo.'"');
        if (isset($data) && $data[0]['password'] == md5($password)) // Acces OK !
        {

            $_SESSION['pseudo'] = $data[0]['useradmin'];
            $_SESSION['level'] = $data[0]['admin'];
            $_SESSION['id'] = $data[0]['id'];
            $pseudo = $_SESSION['pseudo'];
            $id = $_SESSION['id'];
            $level = $_SESSION['level'];
            include('blocs/user-main.php');

        }
        else // Acces pas OK !
        {
            echo '<a href="connexion.php">Votre pseudo n\'est pas correct, veuillez réessayer</a>';
        }
}
?>
