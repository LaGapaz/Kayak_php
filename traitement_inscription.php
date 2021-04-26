<?php
	
include('bibliotheque.php');

// Vérifier que tous les champs obligatoires sont remplis



if ( !isset($_POST['sexe'])
  || empty($_POST['pseudo'])
  || empty($_POST['nom'])
  || empty($_POST['prenom'])
  || empty($_POST['mdp'])
  || empty($_POST['confirm_password'])
  || empty($_POST['email'])
  || empty($_POST['ville'])
  || empty($_POST['cp'])
  || empty($_POST['naissance'])
  || empty($_POST['telephone'])
  || !isset($_POST['niveau']) ) 
  
  	{
  		$message = "Erreur de saisie.";
  		$erreur = true;
  	}

		else
			{
			// Récupérer les valeurs du formulaire
			$sexe = $_POST['sexe'];
			$pseudo = $_POST['pseudo'];
		    $nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$mdp = $_POST['mdp'];
			$confirm_password = $_POST['confirm_password'];
			$email = $_POST['email'];
			$ville = $_POST['ville'];
			$cp = $_POST['cp'];
			$naissance = $_POST['naissance'];
			$telephone = $_POST['telephone'];
			$niveau = $_POST['niveau'];
			
			if ($mdp !=$confirm_password)
				{
				$message='Les mots de passe ne correspondent pas. Veuillez réessayer. ';
				$erreur= true;
				}
		
			else
				{
				$connexion= connecter();
				$requete = "SELECT * FROM adherent
									WHERE pseudo='$pseudo'";
					
				$resultat = mysqli_query($connexion, $requete);
				
				if (mysqli_num_rows($resultat) != 0)
				{
				$message = 'Le pseudo "'.$pseudo.'" est déjà pris.';
				$erreur= true;
				}

				else
					{
					// Ajouter le client dans la base
			
						$requete =  "INSERT INTO adherent (sexe,pseudo,nom,prenom,mdp,email,ville,cp,naissance,telephone,niveau)
							VALUES ('$sexe','$pseudo','$nom','$prenom','$mdp','$email','$ville','$cp','$naissance','$telephone','$niveau')";
			
			
			
			
							$connexion=connecter();
							$resultat = mysqli_query($connexion, $requete);
							mysqli_close($connexion);
							
			
			
            // Vérifier qu'il n'y avait pas de problèmes
            if (!$resultat)
              {
                $message = 'Problème en traitant la requête : '.$requete;
                $erreur = true;
              }
            else
            	{
                	$message = 'Vous avez été inscrit avec succés. <a href="index1.php">Veuillez vous connecter.</a>';
                	$erreur = false;
                
					$_SESSION['pseudo']=$pseudo;
					
				}
          			}
          		}
          	}
		  
      
  

///////////////////////////////////// PARTIE VISIBLE /////////////////////////////////////
echo $message;
if ($erreur)
  {
    echo ' <a href="index1.php">Veuillez réessayer. </a>';
  }

?>