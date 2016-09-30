<?php
/**
 * Created by PhpStorm.
 * User: hinfraytheo
 * Date: 30/09/16
 * Time: 11:06
 */
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


