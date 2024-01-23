<?php

    // Connexion.
    session_start();
    
    if ( ! isset($_SESSION['username']) )
    {
        header('Location: ./index.php');
        exit();
	}
	
	include ('include/connexionBDD.php');


	// Récupération du Membre.
	$requete = $bdd->prepare('SELECT * FROM Membre WHERE email_membre = ?');
	$requete->execute(array($_SESSION['username']));
	$membre = $requete->fetch();


	if ( isset($_POST['nom_membre']) )
	{
		$requete = $bdd->prepare('UPDATE Membre SET nom_membre = ? WHERE email_membre = ?');
		$requete->execute(array($_POST['nom_membre'], $_SESSION['username']));
		header('Location: ./profil.php');
	}
	if ( isset($_POST['prenom_membre']) )
	{
		$requete = $bdd->prepare('UPDATE Membre SET prenom_membre = ? WHERE email_membre = ?');
		$requete->execute(array($_POST['prenom_membre'], $_SESSION['username']));
		header('Location: ./modification_membre.php');
	}
	if ( isset($_POST['email_membre']) )
	{
		$requete = $bdd->prepare('UPDATE Membre SET email_membre = ? WHERE email_membre = ?');
		$requete->execute(array($_POST['email_membre'], $_SESSION['username']));

		$requete = $bdd->prepare('UPDATE Fiche SET email_fiche = ? WHERE email_fiche = ?');
		$requete->execute(array($_POST['email_membre'], $_SESSION['username']));


		$_SESSION['username'] = $_POST['email_membre'];
		header('Location: ./profil.php');
	}
	if ( isset($_POST['mdp_membre']) )
	{
		$requete = $bdd->prepare('UPDATE Membre SET mdp_membre = ? WHERE email_membre = ?');
		$requete->execute(array(crypt($_POST['mdp_membre']), $_SESSION['username']));
		header('Location: ./profil.php');
	}
	if ( isset($_POST['sexe']) )
	{
		$requete = $bdd->prepare('UPDATE Membre SET sexe = ? WHERE email_membre = ?');
		$requete->execute(array($_POST['sexe'], $_SESSION['username']));
		header('Location: ./profil.php');
	}
	if ( isset($_POST['date_naissance_membre']) )
	{
		$requete = $bdd->prepare('UPDATE Membre SET date_naissance_membre = ? WHERE email_membre = ?');
		$requete->execute(array($_POST['date_naissance_membre'], $_SESSION['username']));
		header('Location: ./profil.php');
	}
	if ( isset($_FILES['photo']) )
	{
		$blob = file_get_contents($_FILES['photo']['tmp_name']);

		$requete = $bdd->prepare('UPDATE Membre SET photo = ? WHERE email_membre = ?');
		$requete->execute(array($blob, $_SESSION['username']));
		header('Location: ./profil.php');
	}

?>


<!DOCTYPE html>

<html lang="fr">

	<body>

		<?php

			include('include/header.php');
			include('include/navbar.php');

		?>

		<div class="marge_gauche">

			<h1>Modifier le profil de <?php echo $membre['prenom_membre'] . ' ' . $membre['nom_membre'] ?> </h1>
			
			<form action="modification_membre.php" method="POST">

				<div class="creamembre">
					<p>Nom : </p>
					<input type="text" name="nom_membre" value="<?php echo $membre['nom_membre']?>"/>
				</div>
				
				<div class="creamembre">
					<p>Prénom : </p>
					<input class="creamembre" type="text" name="prenom_membre" value="<?php echo $membre['prenom_membre']?>"/>
				</div>

				<div class="creamembre">
					<p>Email : </p>
					<input class="creamembre" type="text" name="email_membre" value="<?php echo $membre['email_membre']?>"/>
				</div>

				<div class="creamembre">
					<p>Mot de Passe : </p>
					<input class="creamembre" type="password" name="mdp_membre" value="<?php echo $membre['mdp_membre']?>"/>
				</div>
				
				<div class="creamembre">
					<p>Sexe </p>
					<input class="creamembre" type="text" name="sexe" value="<?php echo $membre['sexe']?>"/>
				</div>
				
				<div class="creamembre">
					<p>Date de Naissance : </p>
					<input class="creamembre" type="date" name="date_naissance_membre" value="<?php echo $membre['date_naissance_membre']?>"/>
				</div>

				<input type="submit" value="Enregistrer la fiche">
				
			</form>

			<h1>Modifier la photo de profil</h1>

			<?php 

				if ( $membre['photo'] != null )
				{
					echo "<img width='300px' height='300px' src='data:image/jpeg;base64," . base64_encode($membre['photo']) . "'> </img>";
				}

			?>

			<form action="modification_membre.php" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="MAX_FILE_SIZE" value="250000" />

				<div class="creamembre">
					<p>Photo de Profil : </p>
					<input type="file" name="photo"/>
				</div>

				<input type="submit" value="Enregistrer la photo de profil">

			</form>

		</div>

	<?php

		include ('include/footer.php');
	?>

	</body>

</html>
