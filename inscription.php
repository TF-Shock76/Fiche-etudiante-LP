<?php

	include ('include/connexionBDD.php');

    // Connexion.
    session_start();
	session_destroy();
	

	if ( isset($_POST['email']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['mdp']) AND isset($_POST['sexe']) AND isset($_POST['ddn']) )
	{
		
		if (! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			header('Location: ./inscription.php');
		}

		$requete = $bdd->prepare('SELECT COUNT(email_membre) FROM Membre WHERE email_membre = ?');
		$requete->execute(array($_POST['email']));
		$rep = $requete->fetch();

		echo $rep;

		if ( $rep != 0 )
		{
			header('Location: ./erreur.php');
		}


		$requete = $bdd->prepare('INSERT INTO Membre (email_membre, nom_membre, prenom_membre, mdp_membre, sexe, date_naissance_membre) VALUES (?,?,?,?,?,?)');

		$email  = $_POST['email'];
		$nom    = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mdp    = crypt( $_POST['mdp'] );
		$sexe   = $_POST['sexe'];
		$ddn    = $_POST['ddn'];
	
		$requete->execute(array($email, $nom, $prenom, $mdp, $sexe, $ddn));
		$requete->closeCursor();
	
		//header('Location: ./connexion.php');

	}

?>


<!DOCTYPE html>

<html lang="fr">

	<body>

		<?php
			include ('include/header.php');
			include ('include/navbarConnex.php');
		?>
	  
	  
		<h1> Inscription </h1>

		<form action="./inscription.php" method="POST">

			<label for="nom">Nom :</label>
			<br />
			<input type="text" name="nom" required>

			<br /> <br />

			<label for="prenom">Prénom :</label>
			<br />
			<input type="text" name="prenom" required>

			<br /> <br />

			<label for="email">Email :</label>
			<br />
			<input type="email" name="email" required>

			<br /> <br />

			<label for="mdp">Mot de Passe :</label>
			<br />
			<input type="password" name="mdp" minlength="4" maxlength="50" required>

			<br /> <br />

			<label for="sexe">Sexe :</label>
			<br />
			<select name="sexe">
				<option value="H">Homme</option>
				<option value="F">Femme</option>
				<option value="NB">Non binaire</option>
			</select>

			<br /> <br />

			<label for="ddn">Date de naissance :</label>
			<br />
			<input type="date" name="ddn" required>

			<br /> <br /> <br />

			<input type="submit" name="send">

		</form>

		<?php
			include ('include/footer.php');
		?>

	</body>

</html>
