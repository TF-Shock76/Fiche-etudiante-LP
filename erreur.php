<!DOCTYPE html>

<html lang="fr">

	<body>

		<?php
			include ('include/header.php');
			include ('include/navbarConnex.php');
		?>
	  
	  	<div class="marge_gauche">

			<h1> Inscription </h1>

			<br />

			<p> Cette adresse mail est déjà utilisée. Réessayez avec une autre adresse. </p>

			<br />

			<form action="inscription.php" method="POST">

				<input type="submit" value="Retour à l'inscription">

			</form>

		</div>

		<?php
			include ('include/footer.php');
		?>

	</body>

</html>
