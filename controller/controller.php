<?php

require('model/model.php');

/**
 * Description listPosts function
 *
 * @return void
 */
function listPosts(): void
{
    /** @var false|PDOStatement $posts */
    $posts = getPosts();

    require('view/indexView.php');
}

/**
 * Description post function
 *
 * @return void
 */
function post(): void
{
    /** @var mixed $post */
    $post = getPost($_GET['id']);
    /** @var false|PDOStatement $comments */
    $comments = getComments($_GET['id']);

    require('view/postView.php');
}

/**
 * Description addComment function
 *
 * @param $postId
 * @param $author
 * @param $comment
 *
 * @return void
 */
function addComment($postId, $author, $comment): void
{
    /** @var bool $affectedLines */
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}