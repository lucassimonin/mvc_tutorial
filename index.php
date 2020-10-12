<?php

require('model.php');

/** @var false|PDOStatement $posts */
$posts = getPosts();

require('indexView.php');
