<div class="single_compte_rendu">
    <?php
    echo '
    <h2>'.$compte_rendu["title"].'</h2>
    <h3>Compte rendu du '.date('d-m-Y',$compte_rendu["date_creation"]).'</h3>';
    echo '<p>'.$compte_rendu["description"].'</p>';
    ?>


</div>