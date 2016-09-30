 <?php
 if(isset($pseudo)){
 

    echo'
    <div class="big container">';
    if ($id == 0){
        $tab_alerte['error'] = "Vous n'avez pas les droits" ;
        include 'blocs/erreur.php';
    }else{
        echo '<h1>Bienvenue <b>'.$pseudo.'</b></h1>
        <hr>
        <p>Vous pourrez gérer ici vos horaires et autres textes de votre site.</p>';
        // On récupère les posts existants
        $users = db_select('SELECT * FROM users');
        echo '<h2>Les utilisateurs existants</h2>
                <small>Modifiez les informations en cliquant dessus</small>
                        <table class="entrees">
                                <tr>
                                    <th width="30">N°</th>
                                    <th>Pseudo</th>
                                    <th>Niveau de profil</th>
                                    <th>Valider</th>
                                </tr>';
        foreach($users as $user){
            echo '
                                <tr>
                                    <form action="admin.php?action=update&panel=edit-users" method="post">
                                    <td width="30"><input name="id" class="input-table" value="'.$user['id'].'"></td>
                                    <td><input name="updatepseudo" class="input-table" value="'.$user['useradmin'].'"></td>
                                    <td><input name="updatelevel" class="input-table" value="'.$user['admin'].'"></td>
                                    <td><button type="submit"/>Modifier</td>
                                    </form>
                                </tr>';
        }
        echo '
        <tr>
            <form action="admin.php?action=insert&panel=edit-users" method="post">
                <td>id</td>
                <td><input type="text" name="pseudo" placeholder="Pseudo"></td>
                <td><input type="text" name="level" placeholder="1=admin 2=admin 3=user"></td>
                <td><input type="submit" value="Ajouter l\'utilisateur"><td>
            </form>
        </tr>';
        echo '</table>
                    <br>';
       
        $rows = db_select('SELECT * FROM posts');
        
        echo '<h2>Les entrées existantes</h2>
                <small>Modifiez les entrées en cliquant dessus</small>
                        <table class="entrees">
                                <tr>
                                    <th width="30">N°</th>
                                    <th>Titre</th>
                                    <th>Contenu</th>
                                    <th>Code</th>
                                    <th>Date</th>
                                    <th>Valider</th>
                                </tr>';
        foreach($rows as $row){
            $date = new DateTime();
            $date->setTimestamp($row['date_creation']);
            echo '
                                <tr>
                                    <form action="admin.php?action=update&panel=edit-posts" method="post">
                                    <td width="30"><input name="id" class="input-table" value="'.$row['id'].'"></td>
                                    <td><input name="updatetitle" class="input-table" value="'.$row['title'].'"></td>
                                    <td><input name="updatedesc" class="input-table" value="'.$row['description'].'"></td>
                                    <td><input name="updatecode" class="input-table" value="'.$row['code'].'"></td>
                                    <td><input class="input-table" value="'.$date->format('Y-m-d H:i:s').'"></td>
                                    <td><button type="submit"/>Modifier</td>
                                    </form>
                                </tr>';
        }
        
        // AJOUT D'UNE NOUVELLE ENTREE
        echo '<h2>Création d\'une nouvelle entrée</h2>
        <tr>
            <form action="admin.php?action=insert&panel=edit-posts" method="post">
                <td>id</td>
                <td><input type="text" name="title" placeholder="Title"></td>
                <td><input type="text" name="desc" placeholder="Contenu"></td>
                <td><input hidden value="'.time().'" name="date"><td>
                <td><input type="submit" value="Ajouter l\'entrée"><td>
            </form>
        </tr>
        </table>
        
        
        </div></body></html>';
        
    }
    
}
?>