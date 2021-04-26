<?php

	if (isset($_SESSION['pseudo']))
	{
		include('form_deconnexion.html');
	}
	else
	{
		include('form_connexion.html');
		include('inscription.html');
	}

?> 