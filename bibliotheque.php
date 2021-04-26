<?php
function connecter()
  {
    $hote       = 'localhost';
    $utilisateur= 'root';
    $passe      = '';
    $base       = 'kayak';
	
	 $connexion  = mysqli_connect($hote,$utilisateur,$passe,$base);
	// instruction qui permet de conserver les accents lors de la connexion au serveur de bases de données
    mysqli_query($connexion, 'SET NAMES UTF8');
    return $connexion;
 }
  
  // fonction qui renvoie le nombre de jours entre 2 dates
  function diff_jours($date1,$date2)
	{
	$timestamp1=date_timestamp_get(date_create_from_format('Y-m-d|',$date1,timezone_open('Europe/Paris')));
	$timestamp2=date_timestamp_get(date_create_from_format('Y-m-d|',$date2,timezone_open('Europe/Paris')));
  
	// On récupère la différence de timestamp entre les 2 précédents. Time stamp renvoie le nombre de secondes depuis le 1er janvier 1970
	$nbjoursTimestamp = $timestamp2 - $timestamp1;
 
	// ** Pour convertir le timestamp (exprimé en secondes) en jours **
	// On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
	$nbjours = $nbjoursTimestamp/86400; // 86 400 = 60*60*24
  
	return $nbjours;
	}
	
	
	
  
	// fonction qui renvoie le nombre de secondes depuis le 1er janvier 1970
   function horodatage($date1)
	{
	$timestamp=date_timestamp_get(date_create_from_format('Y-m-d|',$date1,timezone_open('Europe/Paris')));
    return $timestamp;
	}
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
?>
