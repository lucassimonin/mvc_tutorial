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
    $bd = new PDO('mysql:host=127.0.0.1;port=3307;dbname=blog;charset=utf8', 'mvc_tp', 'mvc_tp');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// On récupère les 5 derniers billets
$req = $bd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

while ($data = $req->fetch())
{
    ?>
    <div class="news">
        <h3>
            <?php echo htmlspecialchars($data['title']); ?>
            <em>le <?php echo $data['date_creation_fr']; ?></em>
        </h3>

        <p>
            <?php
            // On affiche le contenu du billet
            echo nl2br(htmlspecialchars($data['content']));
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