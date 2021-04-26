<?php
	session_start();
 include('bibliotheque.php');

			$idcours = $_POST['id'];
			$pseudo = $_SESSION['pseudo'];

			$requete = "SELECT id
						FROM adherent
						WHERE pseudo = '$pseudo';";
	
			$connexion=connecter();
            $resultat = mysqli_query($connexion, $requete);

			$ligne= mysqli_fetch_assoc($resultat);

			$idadherent = $ligne['id'];
    		mysqli_close($connexion);
    		
            // Ajouter le cours dans la bdd
			
            $requete =  "INSERT INTO participation (idadherent,idcours)  
             					VALUES ('$idadherent','$idcours')";

			
			
			$connexion=connecter();
            $resultat = mysqli_query($connexion, $requete);
            mysqli_close($connexion);
            header("location: affichage_planning.php");
     
		?>