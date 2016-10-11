<style type="text/css">
   .title {
       text-align: center;
   }
    .cycle-pdf {
        width: 60%;
        margin: auto;
        padding: 5px;
    }

    .cycle-pdf h3 {
        text-align: center;
    }
</style>
<page>
    <div class="header" style="width: 80%; margin: auto; background-color: #EEEEEE; padding: 5px ">
        <h1 class="title">Cahier de recettage du projet: "<?php echo $donnees_projet[0]['name'] ?>"</h1>
        <h4>Brief</h4>
        <p>
            <?php
            echo $donnees_projet[0]['brief'];
            ?>
        </p>
        <h4>Equipe</h4>
        <ul>
            <?php
                foreach ($bap_users as $user){
                    if($user['role'] == 'cdp'){
                        echo '<li style="color: #993b3b">Nom: <strong>'.$user['nom'].'</strong> / Role: <strong>Chef de projet</strong></li><br>';
                    } elseif($user['nom'] != "") {
                        echo '<li>Nom: <strong>'.$user['nom'].'</strong> / Role: <strong>'.$user['role'].'</strong></li><br>';
                    }
                }
            ?>
        </ul>
        <br>
    </div>
    <div class="cycles">
            <?php
            foreach ($cycles_fini as $cycle){
            ?>
                <div class="cycle-pdf   " style="border: 1px solid #5544DD">
                    <h3><?php echo $cycle["name"].' - (du '.convertir_date($cycle["date_debut"]).' au '.convertir_date($cycle["date_fin"]).')' ?></h3>
                    <p style="width: 80%; margin: auto"><?php echo $cycle["resume"] ?></p>
                    <br>
                    <br>
                    <div class="taches" style="width: 80%; margin: auto">
                        <span><strong>Tâches:</strong></span>
                        <ul>
                            Ici les tâches
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>
    </div>
    

</page>