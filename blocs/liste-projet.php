<div class="listing_projet">
    <h1>Liste des projets BAP</h1>
    <?php
    foreach ($projets as $projet){
        echo '
        <div class="bandeau_projet">
        
            <div class="projet_mini">
                   <div class="background_projet_mini">
                        
                    </div>
                
        
            </div>';
        echo '<div class="projet">
                    <div class="contenu_projet_mini">
                        <a href="'.toRoute($projet['name']).'"><h2>'.$projet['name'].'</h2></a>
                        <p>'.$projet['brief'].'</p>
                    </div>
        
            </div>
        </div>';

        
    }
    
    ?>
</div>