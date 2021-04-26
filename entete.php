<!DOCTYPE html>
	<html lang="fr">
		<head>
 			<meta charset="utf-8">
				<title> Accueil</title>
					<link rel="stylesheet" type="text/css" href="CSS/general.css" />
		</head>
			<h1>Club de Kayak d'Aubervilliers</h1>
				<h4>Association Loi 1901</h4>
		<header>
  			<img src="CSS/ban.jpg" alt="" height="100%" width="100%">
  
<?php


 if (isset($_SESSION['pseudo']) AND ($_SESSION['pseudo']=="admin"))
		{

		$pseudo=$_SESSION['pseudo'];

?>

	<nav>
		<ul id="menu_horizontal">
			<li><a href="index1.php">Accueil</a></li>
			<li><a href="ajout_cours.php">Ajout de Cours</a></li>
			<li><a href="ajout_voyage.php">Ajout de Voyages</a></li>
			<li><a href="form_deconnexion.html">Se Déconnecter</a></li>
		</ul>
	</nav>

<?php 
		}

		elseif (isset($_SESSION['pseudo']))
			{
?>
 	<nav>
		<ul id="menu_horizontal">
			<li><a href="index1.php">Accueil</a></li>
			<li><a href="participation_cours.php">Nos Cours</a></li>
			<li><a href="affichage_planning.php">Espace Personnel</a></li>
			<li><a href="reservation.php">Nos Voyages</a></li>
			<li><a href="form_deconnexion.html">Se Déconnecter</a></li>
		</ul>
	</nav>

<?php
			}
			else
			{

?>
 	<nav>
		<ul id="menu_horizontal">
			<li><a href="index1.php">Accueil</a></li>
			<li><a href="participation_cours.php">Nos Cours</a></li>
			<li><a href="reservation.php">Nos Voyages</a></li>
		</ul>
	</nav>
<?php
			}
?>
		</header>
		<body>
		
	</body>
</html>