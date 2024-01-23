<?php
	session_start();

	include ('include/connexionBDD.php');

	$requete = $bdd->prepare('INSERT INTO fiche (email_fiche, etabli_fiche, pays_fiche, libelle_fiche, niveau, date_deb_fiche, date_fin_fiche) VALUES (?,?,?,?,?,?,?)');
	
	if(!empty($_POST['etablissement']) && !empty($_POST['pays']) && !empty($_POST['libelle_form']) && (!empty($_POST['date_fin']) && !empty($_POST['date_deb'])) && $_POST['date_fin'] >= $_POST['date_deb'])
	{
		
		if((!empty($_POST['niveau']) && is_numeric($_POST['niveau'])))
			$niveau = $_POST['niveau'];
		else if(empty($_POST['niveau']) || $_POST['niveau']==0 || !is_numeric($_POST['niveau']))
			$niveau = 1;
		else
			header('Location: ./page_crea_fiche.php');

		
		$email         = $_SESSION['username'];
		$etablissement = $_POST['etablissement'];
		$pays          = $_POST['pays'];
		$libelle_form  = $_POST['libelle_form'];
		$date_deb      = $_POST['date_deb']; 
		$date_fin      = $_POST['date_fin'];

		$requete->execute(array($email, $etablissement, $pays, $libelle_form, $niveau, $date_deb, $date_fin));
		$requete->closeCursor(); // Termine le traitement de la requête
		header('Location: ./page_liste_fiches.php');
	}
	else
	{
		header('Location: ./page_crea_fiche.php');
	}
?>
