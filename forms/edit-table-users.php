<?php



/**
 * Created by PhpStorm.
 * User: hinfraytheo
 * Date: 30/09/16
 * Time: 11:06
 */
echo '<h2>Les utilisateurs existants sur la BAP</h2>
                <small>Modifiez les informations en cliquant dessus</small>
                        <table class="entrees">
                                <tr>
                                    <th width="30">N°</th>
                                    <th>Nom Prénom</th>
                                     <th>Mail</th>
                                    <th>Role</th>
                                    <th>Niveau de profil</th>
                                    <th>Valider</th>
                                </tr>';

foreach($users as $user){
    echo '
                                <tr>
                                    <form action="admin.php?action=update&panel=edit-users" method="post">
                                    <td width="30"><input name="id" class="input-table" value="'.$user['id'].'"></td>
                                    <td><input name="updatenom" class="input-table" value="'.$user['nom'].'">
                                    <input name="updateprenom" class="input-table" value="'.$user['prenom'].'"></td>
                                    <td><input name="updatemail" type="mail" class="input-table" value="'.$user['mail'].'"></td>
                                    <td><input name="updaterole" class="input-table" value="'.$user['metier'].'"></td>
                                    <td><input name="updatelevel" class="input-table" value="'.$user['role_bap'].'"></td>
                                    <td><button type="submit"/>Modifier</td>
                                    </form>
                                </tr>';
}
echo '
        <tr>
            <form action="admin.php?action=insert_cdp&panel=edit-users" method="post">
                <td>id</td>
                <td><input type="text" name="nom" placeholder="Nom">
                <input type="text" name="prenom" placeholder="Prénom"></td>
                 <td><input type="mail" name="mail" placeholder="Mail"></td>
                <td><input type="text" name="role" placeholder="Role"></td>
                <td><input type="text" name="level" placeholder="1=admin 2=intervenant 3=techos"></td>
                <input type="hidden" value="'.$donnees_projet[0]['id'].'" name="id_bap">
                <td><input type="submit" value="Ajouter l\'utilisateur"><td>
                
            </form>
        </tr>';
echo '</table>
                    <br>';



