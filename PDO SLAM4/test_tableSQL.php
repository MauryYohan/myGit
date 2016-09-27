<?php
	include "connectAD.php";
	
	
	#echo "<br /> <br /> <br /> TEST nomChamp<hr />";	
	#$sql= "SELECT * from matable;";

	#$result = nomChamp($sql,1);
	#echo $result;
	
	#$requete = afficheRequeteSQL($sql);
	#echo $requete;
	
	
	echo "TEST afficheRequeteSQL<hr />";
	$sql= "SELECT * from matable;";
	$result = nomChamp($sql,1);
	echo $result;
	
	afficheRequeteSQL($sql);
	

?>