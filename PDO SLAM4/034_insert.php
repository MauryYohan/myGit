<?php
	include 'connect.php';
	
	$sql = "INSERT INTO `matable` (`macolonne`) VALUES
												('valeur1'),
												('valeur2'),
												('valeur3');
																";
	
	$nombre_changement= $connexion->exec($sql);
	echo "La requête à ajouté : $nombre_changement lignes.";	

	// Fermeture de la connexion
	$connexion = NULL;
?>