<?php
/**
 * Created by PhpStorm.
 * User: hinfraytheo
 * Date: 30/09/16
 * Time: 11:07
 */
echo '<h2>Les comptes rendus existant</h2>';

foreach($rows as $row){
    $date=$row['date_creation'];
    echo '
    
     <div>
        <h3>Compte rendu du '.date('Y-m-d',$date).'</h3>
        '.$row['description'].'
       
       
    </div>
       
       
    ';
    echo '</table>';
}

