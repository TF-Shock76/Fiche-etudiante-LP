<?php

	session_start();
	
	include ('include/connexionBDD.php');
	
	$reponse = $bdd->query('SELECT * FROM membre');

	while ($mail = $reponse->fetch())
	{
		$mdpcrypt = crypt($_POST['password'], $mail['mdp_membre']);

		if ( ($_POST['username'] == $mail['email_membre']) && strcmp ($mdpcrypt, $mail['mdp_membre']) == 0 )
    	{
    		$_SESSION['username'] = $_POST['username'];
    		header('Location: ./accueil.php');
    	}


    	if((empty($_POST['username']) && empty($_POST['password'])))
		{
			echo 'Entrez une valeur dans chaque rubrique';
		} 
		else{
			if($_POST['username'] != $mail['email_membre'] || $_POST['password'] != $mail['mdp_membre'])
			{
				if($_POST['username'] != $mail['email_membre'] && !empty($_POST['username']))
				{
					echo 'Login erroné, veuillez entrer une adresse mail correcte';
				}
				else if($_POST['username'] == $mail['email_membre'] && $_POST['password'] != $mail['mdp_membre'] && empty($_POST['password']))
				{
					echo 'Veuillez entrer un mot de passe';
				} 
					
				else if($_POST['username'] == $mail['email_membre'] && $_POST['password'] != $mail['mdp_membre'] && !empty($_POST['password']))
				{
					echo 'Mot de passe incorrect';
				}
			
			}
		}
			
    }

	$reponse->closeCursor(); // Termine le traitement de la requête

?>