<?php
  session_start();
  include('connect.php');

  $mdp = $_POST['mdp'];

    $requete = "SELECT pseudo, mdp 
                FROM adherent
                WHERE pseudo='$pseudo' 
                AND mdp='$mdp'";

$connexion = connecter();
$resultat = mysqli_query($connexion, $requete);
mysqli_close($connexion);

    if (mysqli_num_rows($resultat) == 0)
      {
	  echo '<center><a href="index1.php" class="button">Veuillez réessayer</a></center>';
      
      }

     

          else
            {
            $_SESSION['pseudo']=$pseudo;
            header("location: index1.php");
            }



?>
