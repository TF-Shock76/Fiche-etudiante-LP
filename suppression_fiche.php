<?php
	session_start();
	echo $_SESSION['username']."<br/>".$_GET['id_fiche'];
	include ('include/connexionBDD.php');

	$requete = $bdd->prepare('DELETE FROM fiche WHERE id_fiche=?');
	

	$requete->execute(array($_GET['id_fiche']));
	$requete->closeCursor(); // Termine le traitement de la requête
	header('Location: ./page_liste_fiches.php');
?>
