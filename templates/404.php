<?php
include 'blocs/header-start.php';
include 'blocs/nav.php';

echo '<div class="erreur">';
if(isset($tab_alerte['error'])){
	echo '<h1>Oups ! <br>'.$tab_alerte['error'].'</h1>';
}else{
	echo '<h1>Oups ! <br>Une erreure non identifiée vient de se produire</h1>';
}
echo '</div>';


?>


<?php
include 'blocs/footer.php';
?>