<?php

    // Connexion.
    session_start();
    
    if ( ! isset($_SESSION['username']) )
    {
        header('Location: /index.php');
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

		<form action="page_liste_fiches.php" method="POST">

			<input type="submit" class="marge_gauche" name="vosfiches" value="Afficher uniquement vos fiches">

		</form>


		<form  class="marge_gauche" action="./page_liste_fiches.php" method="POST">

			<label for="nom">Nom :</label>
			<input type="text" name="nom">

			<label for="prenom">Prénom :</label>
			<input type="text" name="prenom">

			<label for="sexe">Sexe :</label>
			<select name="sexe">
				<option value="">---</option>
				<option value="H">Homme</option>
				<option value="F">Femme</option>
				<option value="NB">Non binaire</option>
			</select>

			<input type="submit" name="send">

		</form>


		<table class="marge_gauche" border="1">

			<tr>

				<th>Nom</th>
				<th>Prénom</th>
				<th>Identifiant de la fiche</th>
				<th>Nom de l'établissement</th>
				<th>Pays</th>
				<th>Libellé de la formation</th>
				<th>Niveau</th>
				<th>Date de début</th>
				<th>Date de fin</th>
				<th>Modification</th>
				<th>Suppression</th>

			</tr>

			<tr>
				
				<?php 

					if ( isset($_POST['vosfiches']) )
					{
						$reponse2 = $bdd->prepare('SELECT * FROM Fiche f JOIN Membre m ON f.email_fiche = m.email_membre WHERE m.email_membre = ? ORDER BY id_fiche');
						$reponse2->execute(array($_SESSION['username']));
					}
					else if ( isset($_POST['nom']) && $_POST['nom'] != '' )
					{
						$reponse2 = $bdd->prepare('SELECT * FROM Fiche f JOIN Membre m ON f.email_fiche = m.email_membre WHERE m.nom_membre = ? ORDER BY id_fiche');
						$reponse2->execute(array($_POST['nom']));
					}
					else if ( isset($_POST['prenom']) && $_POST['prenom'] != '' )
					{
						$reponse2 = $bdd->prepare('SELECT * FROM Fiche f JOIN Membre m ON f.email_fiche = m.email_membre WHERE m.prenom_membre = ? ORDER BY id_fiche');
						$reponse2->execute(array($_POST['prenom']));
					}
					else if ( isset($_POST['sexe']) && $_POST['sexe'] != '' )
					{
						$reponse2 = $bdd->prepare('SELECT * FROM Fiche f JOIN Membre m ON f.email_fiche = m.email_membre WHERE m.sexe = ? ORDER BY id_fiche');
						$reponse2->execute(array($_POST['sexe']));
					}
					else 
					{
						$reponse2 = $bdd->prepare('SELECT * FROM Fiche f JOIN Membre m ON f.email_fiche = m.email_membre ORDER BY id_fiche');
						$reponse2->execute(array());
					}

					while( $result2 = $reponse2->fetch() )
					{
						echo "<td>".$result2['nom_membre']."</td>";
						echo "<td>".$result2['prenom_membre']."</td>";
						echo "<td>".$result2['id_fiche']."</td>";
						echo "<td>".$result2['etabli_fiche']."</td>";
						echo "<td>".$result2['pays_fiche']."</td>";
						echo "<td>".$result2['libelle_fiche']."</td>";
						echo "<td>".$result2['niveau']."</td>";
						echo "<td>".$result2['date_deb_fiche']."</td>";
						echo "<td>".$result2['date_fin_fiche']."</td>";
						
						if($_SESSION['username'] == $result2['email_fiche'])
						{
							$id = $result2['id_fiche'];
							?><td>
								<form method="GET" action="page_crea_fiche.php">
									<input type="hidden" name="id_fiche" value="<?php echo $id?>">
									<input type="submit" value="Modifier">
								</form>
							</td>
							<td>
								<form method="GET" action="suppression_fiche.php">
									<input type="hidden" name="id_fiche" value="<?php echo $id?>">
									<input type="submit" value="Supprimer">
								</form>
							</td> 
							<?php
						}
						else
						{
							echo "<td>"."</td>";
							echo "<td>"."</td>";
						}

						echo "</tr>";
					}
				?>
				
			</tr>
					
		</table>

		<?php

			include('include/footer.php');
			$reponse2->closeCursor();

		?>

	</body>

</html>
