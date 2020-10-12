<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=127.0.0.1;port=3307;dbname=blog;charset=utf8', 'mvc_tp', 'mvc_tp');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// On récupère les 5 derniers billets
$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

while ($donnees = $req->fetch())
{
    ?>
    <div class="news">
        <h3>
            <?php echo htmlspecialchars($donnees['titre']); ?>
            <em>le <?php echo $donnees['date_creation_fr']; ?></em>
        </h3>

        <p>
            <?php
            // On affiche le contenu du billet
            echo nl2br(htmlspecialchars($donnees['contenu']));
            ?>
            <br />
            <em><a href="#">Commentaires</a></em>
        </p>
    </div>
    <?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
</body>
</html>