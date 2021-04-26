<?php
	session_start();
include('bibliotheque.php');

			$idpart = $_POST['id'];
			
			$pseudo = $_SESSION['pseudo'];

			$requete = "SELECT *
						FROM adherent
						WHERE pseudo = '$pseudo';";
	
			$connexion=connecter();
            $resultat = mysqli_query($connexion, $requete);

			$ligne= mysqli_fetch_assoc($resultat);

			$idadherent = $ligne['id'];

    		mysqli_close($connexion);
			
            $requete =  "DELETE
						FROM participation  
						WHERE id = '$idpart';";

			
			
			$connexion=connecter();
            $resultat = mysqli_query($connexion, $requete);
            echo mysqli_error($connexion);
            mysqli_close($connexion);
       		header("location: affichage_planning.php");
     
        ?>