<!DOCTYPE html>
<html lang="fr">
<?php
	session_start();
	include('bibliotheque.php');
	include('entete.php');
	?>

	<head>
		<meta charset="utf-8">
		<title>Participation a votre cours</title>
		<link rel="stylesheet" type="text/css" href="CSS/general.css" />
		<link rel="stylesheet" type="text/css" href="CSS/reservation.css" />
	</head>

<?php
if (isset($_SESSION['pseudo']))
	{
		$pseudo=$_SESSION['pseudo']; // on récupère le pseudo de l'adhérent connecté
	

$requete = "SELECT niveau
			FROM adherent
			WHERE pseudo = '$pseudo';";

$connexion = connecter();
$resultat = mysqli_query($connexion, $requete);

echo mysqli_error($connexion);
mysqli_close($connexion);
 $ligne= mysqli_fetch_assoc($resultat);

      $niveau = $ligne['niveau'];



	$requete=   "SELECT DATE_FORMAT (date,'%d/%m/%Y') AS date, niveau, horaire, id
				 FROM cours
				 WHERE date > CURRENT_DATE
				 AND niveau ='$niveau';";

				 
$connexion = connecter();
$resultat = mysqli_query($connexion, $requete);

echo mysqli_error($connexion);
mysqli_close($connexion);

$ligne = mysqli_fetch_assoc($resultat);
	}


	else
	{
	$requete=   "SELECT DATE_FORMAT (date,'%d/%m/%Y') AS date, niveau, horaire, id
				 FROM cours
				 WHERE date > CURRENT_DATE";

				 
$connexion = connecter();
$resultat = mysqli_query($connexion, $requete);

echo mysqli_error($connexion);
mysqli_close($connexion);

$ligne = mysqli_fetch_assoc($resultat);	
	}
?>

	<body>
		<header>

		</header>
			<section>
				<div>
					<caption><h2>Listes des Cours</h2></caption>
					<table>

						<tr>
						<th>Date</th>
						<th>Horaire</th>
						<th>Niveau</th>
						</tr>

						<?php
						while ($ligne)
						{	
							?>
							<tr>
									<td><?=$ligne['date'];?></td>
									<td><?=$ligne['horaire'];?>&nbsp</td>
									<td><?=$ligne['niveau'];?></td>

									<td>
								<?php
							if (isset($_SESSION['pseudo']))
								{
						?>
										<form action="traitement_participation_cours.php" method="post">

											<input type="hidden" name="id" value="<?=$ligne['id'];?>">
											<input type="submit" name="envoi" value="Participer" />
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