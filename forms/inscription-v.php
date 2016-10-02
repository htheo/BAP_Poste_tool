<?php
if(isset($pseudo) && isset($password)){

	$data=db_select('SELECT * FROM users_bap WHERE mail="'.$pseudo.'"');
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
                $id=db_insert('users_bap', array('mail'=>$pseudo, 'password'=>$password, 'admin'=>'4'));
                if(isset($id)){ 

                    echo '
                <div class="connection">
                <h1>Inscription réussi veuillez vous connecter</h1>
                    <form method="post" action="home.php?panel=connexion">
                        <p class="connect">
                        <label for="pseudo"></label><input autofocus value="'.$pseudo.'" name="pseudo" type="text" id="pseudo" /><br />
                        <label for="password"></label><input value="'.$mdp.'"" type="password" name="password" id="password" />

                        </p>
                        <p class="connect-submit"><input type="submit" value="Connexion" /></p>
                    </form>
                    </div>div>';

                }else{
                    $tab_alerte['error']="Problème lors de l'insertion";
                    include 'blocs/erreur.php';
                }
                
            }
        }
}
?>
