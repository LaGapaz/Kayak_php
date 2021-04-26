<?php
	session_start();
 include('bibliotheque.php');

			$idVoyage = $_POST['id'];
       $pseudo = $_SESSION['pseudo'];

			$requete = "SELECT id
						FROM adherent
						WHERE pseudo = '$pseudo';";
	
  
      $connexion=connecter();
      $resultat = mysqli_query($connexion, $requete);

      $ligne= mysqli_fetch_assoc($resultat);

      $idAdherent = $ligne['id'];
      mysqli_close($connexion);
      
            // Ajouter le voyage dans la bdd
			
            $requete =  "INSERT INTO inscription (idAdherent,idVoyage)  
      					VALUES ('$idAdherent','$idVoyage')";

			
			
            $connexion=connecter();
            $resultat = mysqli_query($connexion, $requete);
            mysqli_close($connexion);
			
  header("location: affichage_planning.php");
     
?>