<?php

include('../config/global.php');

define('LINK_ACCUEIL', 'index.php');
define('LINK_COURS', './users/cours/participation_cours.php');
define('LINK_PLANNING', 'affichage_planning.php');
define('LINK_VOYAGES', 'reservation.php');
define('LINK_DECONNEXION', './forms/form_deconnexion.html');

function generateMenu() {
    if (isset($_SESSION['pseudo']) && $_SESSION['pseudo'] == 'admin') {
        return '
            <nav>
                <ul>
                    <li><a href="' . LINK_ACCUEIL . '">Accueil</a></li>
                    <li><a href="ajout_cours.php">Ajout de Cours</a></li>
                    <li><a href="ajout_voyage.php">Ajout de Voyages</a></li>
                    <li><a href="' . LINK_DECONNEXION . '">Se Déconnecter</a></li>
                </ul>
            </nav>
        ';
    } elseif (isset($_SESSION['pseudo'])) {
        return '
            <nav>
                <ul>
                    <li><a href="' . LINK_ACCUEIL . '">Accueil</a></li>
                    <li><a href="' . LINK_COURS . '">Nos Cours</a></li>
                    <li><a href="' . LINK_PLANNING . '">Espace Personnel</a></li>
                    <li><a href="' . LINK_VOYAGES . '">Nos Voyages</a></li>
                    <li><a href="' . LINK_DECONNEXION . '">Se Déconnecter</a></li>
                </ul>
            </nav>
        ';
    } else {
        return '
            <nav>
                <ul>
                    <li><a href="' . LINK_ACCUEIL . '">Accueil</a></li>
                    <li><a href="' . LINK_COURS . '">Nos Cours</a></li>
                    <li><a href="' . LINK_VOYAGES . '">Nos Voyages</a></li>
                </ul>
            </nav>
        ';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../styles/global.css">
</head>
<body>
    <header>
        <h1>Club de Kayak d'Aubervilliers</h1>
        <h4>Association Loi 1901</h4>
        <img src="<?php echo ban_path('images/myimage.jpg') ?>" alt="My Image" height="100%" width="100%">
        <?php echo generateMenu(); ?>
        <img src="<?php echo $IMAGE_PATH; ?>" alt="My Image">
    </header>
</body>
</html>