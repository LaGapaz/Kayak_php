<?php
session_start();
	include('bibliotheque.php');

	$destination = $_POST['destination'];
	$pays = $_POST['pays'];
	$debutvoyage = $_POST['debut'];
	$finvoyage = $_POST['fin'];
	$prix = $_POST['prix'];

				if (horodatage($debutvoyage) < time() or horodatage($debutvoyage)>horodatage($finvoyage))

				{
				echo 'Dates non valable. &nbsp <a href="index1.php">Accueil.</a>';
					
				}

					else
					{
						$requete =  "INSERT INTO voyage (nomVoyage,pays,datedebutVoyage,datefinVoyage,prix)

							VALUES ('$destination','$pays','$debutvoyage','$finvoyage','$prix')";
			
							$connexion=connecter();
							$resultat = mysqli_query($connexion, $requete);
							mysqli_close($connexion);

							if (!$resultat)
             				{
               				 echo 'Problème en traitant la requête : '.$requete;
               				 
            				}
            
            					else
            					{
                					echo 'Nouveau voyage enregistré. &nbsp <a href="index1.php">Accueil.</a>';
                					
					
								}
					}

?>