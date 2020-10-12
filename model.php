<?php

declare(strict_types=1);

/**
 * Description getPosts function
 *
 * @return false|PDOStatement
 */
function getPosts()
{
    /** @var PDO $db */
    $db = dbConnect();

    return $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
}

/**
 * Description getPost function
 *
 * @param $postId
 *
 * @return mixed
 */
function getPost($postId)
{
    /** @var PDO $db */
    $db = dbConnect();
    /** @var PDOStatement|bool $req */
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));

    return $req->fetch();
}

/**
 * Description getComments function
 *
 * @param $postId
 *
 * @return bool|PDOStatement
 */
function getComments($postId)
{
    /** @var PDO $db */
    $db = dbConnect();
    /** @var PDOStatement|bool $comments */
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

/**
 * Description dbConnect function
 *
 * @return PDO
 */
function dbConnect()
{
    try
    {
        /** @var PDO $db */
        $db = new PDO('mysql:host=127.0.0.1;port=3307;dbname=blog;charset=utf8', 'mvc_tp', 'mvc_tp');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
