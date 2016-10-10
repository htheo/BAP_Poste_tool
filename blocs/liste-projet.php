<div class="listing_projet">
    <h1>Liste des projets BAP</h1>
    <?php
    foreach ($projets as $projet){
        $name_route=toRoute($projet['name']);
        echo '
        <div class="bandeau_projet '.$name_route.'2">
        
            <div class="projet_mini">
                   <div class="background_projet_mini '.$name_route.'">
                        
                    </div>
                
        
            </div>';
        echo '<div class="projet">
                    <div class="contenu_projet_mini">
                        <a href="BAP-tools/'.$name_route.'/"><h2>'.$projet['name'].'</h2></a>
                        <p>'.$projet['brief'].'</p>
                    </div>
        
            </div>
        </div>';

        if(is_file('img/'.$name_route.'.jpg')){
            echo '<script>
            $(".'.$name_route.'").css("background-image", "url(img/'.$name_route.'.jpg)");
            
            </script>';
        }
        echo '<script>
            $(".'.$name_route.'2").on("click", function(){
                window.location.href = "BAP-tools/'.$name_route.'/";
            });
        </script>';
    }

    
    ?>
</div>
