<page>
    <div style="width: 80%; margin: auto">
        <div class="header">
            <div style="width: 80%; margin: auto; text-align: center">
                <h2>Recettage du projet</h2>
                <h3><i><?php echo $donnees_projet[0]['name'] ?></i></h3>
            </div>
            <div style="width: 100%; text-align: left">
                <p>
                    <span><strong> Brief: </strong></span>
                    <?php
                    echo $donnees_projet[0]['brief'];
                    ?>
                </p>
            </div>
            <div class="body">
                <table>
                    <thead>
                    <tr>
                        <th colspan="3" style="padding-bottom: 3px">Equipe:</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Métier</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($bap_users as $user){
                        echo '<tr>';
                        if($user['role'] == 'cdp'){ ?>
                            <td><?php echo $user['id'] ?></td>
                            <td><?php echo $user['nom'] ?></td>
                            <td>Chef de projet</td>
                        <?php } elseif($user['nom'] != "") {?>
                            <td><?php echo $i ?></td>
                            <td><?php echo $user['nom'] ?></td>
                            <td><?php echo $user['metier'] ?></td>
                            <?php
                            $i++;
                        }
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
            <div style="width: 100%; margin: auto">
                <h3>Cycles de travail</h3>
                <?php
                foreach ($cycles_fini as $cycle){
                    ?>
                    <div class="cycle-pdf" style="width: 100%; border: 1px solid #5544DD; margin-top: 5px; padding: 7px">
                        <h3 style="text-align: center; margin: auto; padding: 0 10%"><?php echo $cycle["name"].' - (du '.convertir_date($cycle["date_debut"]).' au '.convertir_date($cycle["date_fin"]).')' ?></h3>
                        <p style="position: relative; width: 20%; margin: auto; text-align: center"><?php echo $cycle["resume"] ?></p>
                        <br>
                        <div class="taches" style="width: 80%; margin: auto">
                            <span><strong>Tâches effectuées:</strong></span>
                            <ul>
                                <?php
                                   foreach (get_taches_from_cycle($cycle["id"]) as $key => $tache){
                                        if(!empty($tache)){
                                            echo '<li style="padding: 4px 0">'.$tache['name'].'</li><br>';
                                        }
                                    }
                                ?>
                            </ul>
                            <span><strong>Notes de cycle:</strong></span>
                            <ul>
                                <li> Points positifs: <?php echo $cycle["positif"] ?></li>
                                <li> Points positifs: <?php echo $cycle["negatif"] ?></li>
                            </ul>
                        </div>
                        <br>

                    </div>
                    <?php
                }
                ?>
            </div>
        <div style="bottom: 0">
            <h4>Liens utiles</h4>
            <ul>
                <li><?php echo 'http://'.$_SERVER['HTTP_HOST'].'/'.$donnees_projet[0]['cdc_link'] ?></li>
                <?php if(isset($donnees_projet[0]['gantt_link'])){
                    echo '<li> http://'.$_SERVER['HTTP_HOST'].'/'.$donnees_projet[0]['gantt_link'].'</li>';
                } ?>
            </ul>
        </div>
    </div>
</page>