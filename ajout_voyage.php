<!DOCTYPE html>
<html lang="fr">
	<meta charset="utf-8">
		<head>
			<title>Modifications Voyages</title>
			<link rel="stylesheet" type="text/css" href="CSS/general.css" />
			<link rel="stylesheet" type="text/css" href="CSS/reservation.css" />
		</head>
<?php
session_start();
	include ('bibliotheque.php');
	include ('entete.php');
?>
			<body>

			<form action="traitement_ajout_voyage.php" method="post">

				<fieldset>
          			<legend><b>Ajout d'un nouveau voyage</b></legend>
       					<table>
						<tr> <td> Destination : </td>
							<td> <input type="text" name="destination" size="46" maxlength="250"> </td>
						</tr>

						<tr> <td> Pays : </td>
							<td> <input type="text" name="pays" size="46" maxlength="250"> </td>
						</tr>

						<tr> <td> Début du voyage : </td>
							<td> <input type="date" name="debut"> </td>
						</tr>

						<tr> <td> Fin du voyage : </td>
							<td> <input type="date" name="fin"> </td>
						</tr>

						<tr> <td> Prix : </td>
							<td> <input type="number" name="prix"> </td>
						</tr>


						<tr>
                     		<td> <input type="submit" name="envoi" value="Ajouter" /> </td>
                   		</tr>
						</table>
				</fieldset>
			</form>
		</body>
</html>