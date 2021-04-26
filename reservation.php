<!DOCTYPE html>
<html lang="fr">
<?php
	session_start();
	include('bibliotheque.php');
	include('entete.php');

	?>

	<head>
		<meta charset="utf-8">
		<title>Réservation de votre voyage</title>
		<link rel="stylesheet" type="text/css" href="CSS/general.css" />
		<link rel="stylesheet" type="text/css" href="CSS/reservation.css" />
	</head>

<?php
	$requete=   "SELECT DATE_FORMAT (datedebutVoyage,'%d/%m/%Y') AS datedebutVoyage, 
	DATE_FORMAT(datefinVoyage, '%d/%m/%Y') AS datefinVoyage, nomVoyage, pays, prix, id
				 FROM voyage
				 WHERE datedebutVoyage > CURRENT_DATE
				 ORDER BY pays";

				 
$connexion = connecter();
$resultat = mysqli_query($connexion, $requete);

echo mysqli_error($connexion);
mysqli_close($connexion);

$ligne = mysqli_fetch_assoc($resultat);

?>

	<body>
		<header>

		</header>
			<section>
				<div>
					<caption><h2>Listes des voyages</h2></caption>
					<table>

						<tr>
						<th>Destination</th>
						<th>Pays</th>
						<th>Date Départ</th>
						<th>Date Retour</th>
						<th>Prix</th>
						</tr>

						<?php
						while ($ligne)
						{	
							?>
							<tr>
									<td><?=$ligne['nomVoyage'];?></td>
									<td><?=$ligne['pays'];?></td>
									<td><?=$ligne['datedebutVoyage'];?></td>
									<td><?=$ligne['datefinVoyage'];?></td>
									<td><?=$ligne['prix'];?></td>
									<td>
						<?php
							if (isset($_SESSION['pseudo']))
								{
						?>
							
										<form action="traitement_reservation.php" method="post">
							
											<input type="hidden" name="id" value="<?=$ligne['id'];?>">
											<input type="submit" name="envoi" value="Réserver" />
										</form>

									</td>
						<?php
								}
						?>
							</tr>
						<?php
					$ligne = mysqli_fetch_assoc($resultat);

						}
						
						?>

									
					</table>
				</div>

			</section>
	</body>
</html>