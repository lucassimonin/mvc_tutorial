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