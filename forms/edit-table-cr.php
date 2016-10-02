<?php
/**
 * Created by PhpStorm.
 * User: hinfraytheo
 * Date: 30/09/16
 * Time: 11:05
 */
echo '  <h2>Les comptes rendus existant</h2>
        <small>Modifiez les CR en cliquant dessus</small>
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
echo '</table>';
// AJOUT D'UNE NOUVELLE ENTREE
echo '<h2>Création d\'un nouveau compte rendu</h2>
       
            <form action="admin.php?action=insert&panel=edit-posts" method="post">
                
                <label for="title">Titre du compte rendu </label><input type="text" id="title" name="title" placeholder="Titre">';
                echo '<p> Présent à la réunion</p>';
                foreach ($users as $user){
                    echo '<input type="checkbox" name="present" id="'.$user["nom"].'" value="'.$user["nom"].' '.$user["prenom"].'"> <label for="'.$user["nom"].'">'.$user["nom"].' '.$user["prenom"].'</label><br>';

                }
                echo '<br>';
echo'
                <textarea type="text" name="desc" placeholder="Contenu"></textarea>
                <input hidden value="'.time().'" name="date">
                <input type="submit" value="Ajouter l\'entrée">
            </form>
      ';