<?php
	include "connectAD.php";
	
	
	echo "TEST fonction nombrechampSQL <hr />";
	
	$sql= "SELECT * from matable;";
	
	$result = nombrechamp($sql);
	
	echo "RESULTAT : ".$result;
	
?>