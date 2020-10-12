<?php

declare(strict_types=1);

/**
 * Description getPosts function
 *
 * @return false|PDOStatement
 */
function getPosts()
{
    try
    {
        /** @var PDO $db */
        $db = new PDO('mysql:host=127.0.0.1;port=3307;dbname=blog;charset=utf8', 'mvc_tp', 'mvc_tp');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    return $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
}
