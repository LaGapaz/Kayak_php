<!DOCTYPE html>
<html lang="fr">

<?php
	session_start();
	include('bibliotheque.php');
	include('entete.php');
	?>

	
	<div id="planning">
		<h2>Votre Planning</h2>
<?php
$pseudo=$_SESSION['pseudo']; // on récupère le pseudo de l'adhérent connecté

$requete = "SELECT id, pseudo, nom, prenom
			FROM adherent
			WHERE pseudo = '$pseudo'";

$connexion = connecter();
$resultat = mysqli_query($connexion, $requete);

echo mysqli_error($connexion);
mysqli_close($connexion);
$ligne= mysqli_fetch_assoc($resultat);

	$id = $ligne['id'];
	$nom = $ligne['nom'];
	$prenom = $ligne['prenom'];

	echo $nom; 
	?>
	<?php
	echo $prenom;
// requête qui permet de sélectionner les cours
	$requete=   "SELECT DATE_FORMAT (date,'%d/%m/%Y') AS date, horaire, cours.id, participation.idadherent, participation.idcours, participation.id
				 FROM participation, cours
				 WHERE idadherent = '$id'
				 AND participation.idcours = cours.id
				 ORDER BY date;";

				 
$connexion = connecter();
$resultat = mysqli_query($connexion, $requete);

echo mysqli_error($connexion);
mysqli_close($connexion);

$ligne = mysqli_fetch_assoc($resultat);

?>
	<body>
		
			<section>
				
				<!--affichage des cours-->
					<caption><h3>Listes de vos cours</h3></caption>
					<table>

						<tr>
						<th>Date</th>
						<th>Horaire</th>
						</tr>
						<?php
						while ($ligne)
						{
						?>
							<tr>
									<td><?=$ligne['date'];?></td>
									<td><?=$ligne['horaire'];?></td>
									<td>
										<form action="traitement_annulation_cours.php" method="post">
											<input type="hidden" name="id" value="<?=$ligne['id'];?>">
											<input type="submit" name="envoi" value="Annuler" />
										</form>
									</td>
							</tr>
					
<?php 
					$ligne = mysqli_fetch_assoc($resultat);
						}
?>

					</table>
<?php
// requête qui permet de sélectionner les voyages						
	$requete=   "SELECT DATE_FORMAT (datedebutVoyage,'%d/%m/%Y') AS datedebutVoyage, DATE_FORMAT(datefinVoyage, '%d/%m/%Y') AS datefinVoyage, nomVoyage, pays, voyage.id, inscription.idAdherent
				 FROM inscription, voyage
				 WHERE idAdherent = '$id'
				 AND inscription.idVoyage = voyage.id";

				 
$connexion = connecter();
$resultat = mysqli_query($connexion, $requete);

echo mysqli_error($connexion);
mysqli_close($connexion);

$ligne = mysqli_fetch_assoc($resultat);

?>									
				
				
				<!--affichage des voyages-->
					<caption><h3>Listes de vos voyages</h3></caption>
					<table>

						<tr>
						<th>Destination</th>
						<th>Pays</th>
						<th>Départ</th>
						<th>Arrivée</th>
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
							</tr>
<?php 
					$ligne = mysqli_fetch_assoc($resultat);

						}
						
?>

									
					</table>
				</section>	
				</div>
			
		</body>

</html>