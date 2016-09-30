<?php
if(isset($pseudo) && isset($password)){

	$data=db_select('SELECT * FROM users WHERE useradmin="'.$pseudo.'"');
        if (isset($data[0])) // Acces OK !
        {

            $tab_alerte['error']='Ce pseudo existe déjà';
            include('blocs/erreur.php');

        }
        else // Acces pas OK !
        {
            if(isset($_POST['pseudo'])&&isset($_POST['password'])){
                $pseudo=htmlentities($_POST['pseudo']);
                $mdp=htmlentities($_POST['password']);
                $password=md5($mdp);
                $id=db_insert('users', array('useradmin'=>$pseudo, 'password'=>$password, 'admin'=>'3'));
                if(isset($id)){ 

                    echo 'Inscription réussi veuillez vous connecter';
                    echo '
                    <form method="post" action="home.php?panel=connexion">
                        <p class="connect">
                        <label for="pseudo"></label><input autofocus value="'.$pseudo.'" name="pseudo" type="text" id="pseudo" /><br />
                        <label for="password"></label><input value="'.$mdp.'"" type="password" name="password" id="password" />

                        </p>
                        <p class="connect-submit"><input type="submit" value="Connexion" /></p>
                    </form>';

                }else{
                    $tab_alerte['error']="Problème lors de l'insertion";
                    include 'blocs/erreur.php';
                }
                
            }
        }
}
?>
