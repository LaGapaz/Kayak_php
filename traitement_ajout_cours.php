<?php
	session_start();
		include('bibliotheque.php');

			$date = $_POST['date'];
			$horaire = $_POST['horaire'];
			$niveau = $_POST['niveau'];


				if (horodatage($date) < time())
				{
					echo 'Choissisez une date valide. <a href="index1.php">Accueil.</a>';
				}

					else
					{
						$requete =  "INSERT INTO cours (date,niveau,horaire)

							VALUES ('$date','$niveau','$horaire')";
			
							$connexion=connecter();
							$resultat = mysqli_query($connexion, $requete);
							mysqli_close($connexion);

							if (!$resultat)
             				{
               				 echo 'Problème en traitant la requête : '.$requete;
            				}
            
            					else
            					{
                				echo 'Nouveau cours enregistré. <a href="index1.php">Accueil.</a>';
					
								}
					}
?>