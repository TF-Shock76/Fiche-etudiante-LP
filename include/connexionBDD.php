<?php

	// Modifier les informations suivantes en fonction de votre base de données.
	$utilisateur = 'root';
	$motdepasse  = 'daguenet';

	$bdd = new PDO('mysql:host=localhost;dbname=gestion_academique;charset=utf8', $utilisateur, $motdepasse);

?>
