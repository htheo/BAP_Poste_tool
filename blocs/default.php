<?php
if(isset($donnees_projet[0])){
	$name_route=toRoute($donnees_projet[0]['name']);



	?>
<div class="home_poste">

    <?php
        echo '<h1>BAP '.$donnees_projet[0]['name'].'</h1>';
        echo '<h2>'.$donnees_projet[0]['brief'].'</h2>';


    ?>



</div>

<div class="equipe">

		<h2>Les Chefs de Projets</h2>
	<div class="ligne_worker">
		<?php
			foreach ($cdps as $cdp){
				echo '<div class="equipier">';
				echo'	<img src="'.$niveau_url.'img/cdp.svg" alt="logo chef de projet">';
				echo '	<h4>'.$cdp["nom"].' '.$cdp["prenom"].'</h4>';
				if($cdp["role"] != ""){
					echo '	<p>'.$cdp["role"].'</p>';
				}else{
					echo '	<p>CDP</p>';
				}

				echo '</div>';
			}
		?>
	</div>

		<h2>Les Techniciens</h2>
	<div class="ligne_worker">
		<?php
		foreach ($techniciens as $technicien){
			echo '<div class="equipier">';
			echo'	<img src="'.$niveau_url.'img/boy.svg" alt="logo techos">';
			echo '	<h4>'.$technicien["nom"].' '.$technicien["prenom"].'</h4>';
			if($technicien["role"] != ""){
				echo '	<p>'.$technicien["role"].'</p>';
			}else{
				echo '	<p>Technicien</p>';
			}

			echo '</div>';
		}
		?>
	</div>
</div>

<?php
	if(is_file('img/'.$name_route.'.jpg')){
		echo '<script>
		$(".home_poste").css("background-image", "url('.$niveau_url.'img/'.$name_route.'.jpg)");
		console.log("'.$niveau_url.'img/'.$name_route.'.jpg");
	</script>';
	}

}