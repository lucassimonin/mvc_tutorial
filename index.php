<?php

declare(strict_types=1);

require('model.php');

/** @var false|PDOStatement $posts */
$posts = getPosts();

require('indexView.php');
