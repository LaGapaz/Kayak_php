<?php
session_start();

include('../../../config/database.php');
include ('../../header.php');

$page_title = 'Participation à votre cours';
$page_css = ['general.css', 'reservation.css'];

if (isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];

    $connexion = connect();
    $requete = "SELECT niveau
                FROM adherent
                WHERE pseudo = '$pseudo';";
    $resultat = mysqli_query($connexion, $requete);
    $ligne = mysqli_fetch_assoc($resultat);
    $niveau = $ligne['niveau'];

    $requete = "SELECT DATE_FORMAT(date, '%d/%m/%Y') AS date, niveau, horaire, id
                FROM cours
                WHERE date > CURRENT_DATE AND niveau = '$niveau';";
} else {
    $requete = "SELECT DATE_FORMAT(date, '%d/%m/%Y') AS date, niveau, horaire, id
                FROM cours
                WHERE date > CURRENT_DATE;";
}

$connexion = connect();
$resultat = mysqli_query($connexion, $requete);

if (!$resultat) {
    echo mysqli_error($connexion);
} else {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?= $page_title ?></title>
    <?php foreach ($page_css as $css) { ?>
        <link rel="stylesheet" type="text/css" href="CSS/<?= $css ?>" />
    <?php } ?>
</head>
<body>
    <section>
        <div>
            <caption><h2>Listes des Cours</h2></caption>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Horaire</th>
                    <th>Niveau</th>
                </tr>
                <?php while ($ligne = mysqli_fetch_assoc($resultat)) { ?>
                    <tr>
                        <td><?= $ligne['date'] ?></td>
                        <td><?= $ligne['horaire'] ?>&nbsp;</td>
                        <td><?= $ligne['niveau'] ?></td>
                        <td>
                            <?php if (isset($_SESSION['pseudo'])) { ?>
                                <form action="traitement_participation_cours.php" method="post">
                                    <input type="hidden" name="id" value="<?= $ligne['id'] ?>">
                                    <input type="submit" name="envoi" value="Participer" />
                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</body>
</html>
<?php
}

mysqli_close($connexion);

?>
