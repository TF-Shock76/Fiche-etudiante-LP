<?php

    // Connexion.
    session_start();
    
    if ( ! isset($_SESSION['username']) )
    {
        header('Location: ./index.php');
        exit();
	}

	$email = $_SESSION['username'];
	
	include('include/connexionBDD.php');

	$req = $bdd->prepare('SELECT * FROM Membre WHERE email_membre = ?;');
	$req->execute(array($_SESSION['username']));
	$rep = $req->fetch();
?>


<!DOCTYPE html>

<html lang="fr">

	<?php

		include('include/header.php');
		include('include/navbar.php');

	?>

	<body>

		<div class="marge_gauche">

			<form action="modification_membre.php" method="POST">

				<input type="submit" value="Modifier votre profil">

			</form>


			<p> Email : <?php echo $rep['email_membre'] ?> </p>

			<p> Nom :  <?php echo $rep['nom_membre'] ?> </p>

			<p> Prénom : <?php echo $rep['prenom_membre'] ?> </p>

			<p> Sexe : <?php 
			
				if ( $rep['sexe'] == 'H' )
				{
					echo 'Homme';
				}
				else if ( $rep['sexe'] == 'F' )
				{
					echo 'Femme';
				}
				if ($rep['sexe'] == 'NB' )
				{
					echo 'Nom Binaire';
				}
				
				?> 

			</p>

			<p> Date de Naissance : <?php echo $rep['date_naissance_membre'] ?> </p>

			<?php 

				if ( $rep['photo'] != null )
				{
					echo "<img width='300px' height='300px' src='data:image/jpeg;base64," . base64_encode($rep['photo']) . "'> </img>";
				}

			?>

		</div>


		<?php
			include('include/footer.php');
		?>

	</body>

</html>
