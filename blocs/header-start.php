<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
    <?php
    //Si le titre est indiqué, on l'affiche entre les balises <title>
    echo (!empty($titre))?'<title>'.$titre.'</title>':'<title>BAP La Poste</title>';
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <?php
        echo '<link rel="stylesheet" media="screen" type="text/css" title="Design" href="'.$niveau_url.'css/design.css" />';
    ?>

</head>
<!-- CE SITE A BESOIN DE JAVASCRIPT POUR FONCTIONNER CORRECTEMENT-->
<body>
