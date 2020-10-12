<?php

use Dnd\Entity\Post;

$title = 'Mon blog';

?>

<?php ob_start(); ?>
  <h1>Mon super blog !</h1>
  <p>Derniers billets du blog :</p>


<?php
/** @var Post $post */
foreach ($posts as $post):

    ?>
  <div class="news">
    <h3>
        <?= htmlspecialchars($post->getTitle()) ?>
      <em>le <?= $post->getFormattedDate() ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post->getContent())) ?>
      <br />
      <em><a href="index.php?action=post&id=<?= $post->getId() ?>">Commentaires</a></em>
    </p>
  </div>
    <?php
endforeach;
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>