<?php

    // Connexion.
    session_start();
    
    if ( ! isset($_SESSION['username']) )
    {
        header('Location: ./index.php');
        exit();
    }
   
    include ('include/connexionBDD.php');

?>


<!DOCTYPE html>

<html lang="fr">

	<?php

		include ('include/header.php');
		include ('include/navbar.php');

	?>

	<body>

		<?php

			if (isset($_GET['id_fiche']))
			{
				$requete = $bdd->prepare('SELECT * FROM fiche WHERE id_fiche = ?');
				$requete->execute(array($_GET['id_fiche']));
				$fiche = $requete->fetch();
				$id = $_GET['id_fiche'];
		

				include('include/modif_fiche.php');
			}
			else
			{
				include('include/crea_fiche.php');
			}

			include ('include/footer.php');

		?>
	
	</body>

</html>
