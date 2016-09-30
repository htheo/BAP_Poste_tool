<?php
include 'blocs/header-start.php';
include 'blocs/nav.php';
if(isset($tab_alerte['error'])){
	echo '<h1>'.$tab_alerte['error'].'</h1>';
}else{
	echo '<h1>	Une erreure non identifiée vient de se produire</h1>';
}


?>


<?php
include 'blocs/footer.php';
?>