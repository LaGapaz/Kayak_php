<!DOCTYPE html>
<html lang="fr">
	<meta charset="utf-8">
		<head>
			<title>Modifications Cours</title>
		</head>
<?php
session_start();
	include ('bibliotheque.php');
	include('entete.php');
?>
			<body>



<?php
	$requete = "SELECT *
				FROM cours";

$connexion = connecter();
$resultat = mysqli_query($connexion, $requete);

echo mysqli_error($connexion);
mysqli_close($connexion);

$ligne = mysqli_fetch_assoc($resultat);
?>

			<form action="traitement_ajout_cours.php" method="post">

				<fieldset>
          			<legend><b>Ajout d'un nouveau cours</b></legend>
       					<table>

						<tr> <td> Date: </td>
							<td> <input type="date" name="date"> </td>
						</tr>

						<tr> <td> Horaire : </td>
							<td> <input type="number" name="horaire"> </td>
						</tr>

						<tr>
							<td> Niveau : </td>
							<td> <input type="radio" name="niveau" value="blanc"> Pagaie Blanche (<em>Débutant</em>)
						<br />
                      <input type="radio" name="niveau" value="jaune"> Pagaie Jaune (<em>Amateur</em>)
						<br />
                      <input type="radio" name="niveau" value="vert"> Pagaie Verte (<em>Confirmé</em>)
						<br />
                      <input type="radio" name="niveau" value="bleu"> Pagaie Bleue (<em>Expert</em>) </td>
						</tr>
						<tr>
                     		<td> <input type="submit" name="envoi" value="Ajouter" /> </td>
                   		</tr>
						</table>
				</fieldset>
			</form>
		</body>
</html>