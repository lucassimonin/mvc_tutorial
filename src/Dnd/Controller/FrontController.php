<?php

declare(strict_types=1);

namespace Dnd\Controller;

use Dnd\Manager\CommentManager;
use Dnd\Manager\PostManager;
use PDOStatement;

/**
 * Class FrontController
 *
 * @package   Dnd\Controller
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2004-present Agence Dn'D
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
class FrontController
{
    /**
     * Description $postManager field
     *
     * @var PostManager $postManager
     */
    private $postManager;
    /**
     * Description $commentManager field
     *
     * @var CommentManager $commentManager
     */
    private $commentManager;
    /**
     * Front constructor
     */
    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    /**
     * Description listPosts function
     *
     * @return void
     */
    public function listPosts(): void
    {
        /** @var false|PDOStatement $posts */
        $posts = $this->postManager->getPosts();

        require(__DIR__ . '/../Resources/view/indexView.php');
    }

    /**
     * Description post function
     *
     * @return void
     */
    public function post(): void
    {
        /** @var mixed $post */
        $post = $this->postManager->getPost($_GET['id']);
        /** @var false|PDOStatement $comments */
        $comments = $this->commentManager->getComments($_GET['id']);

        require(__DIR__ . '/../Resources/view/postView.php');
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
    public function addComment($postId, $author, $comment): void
    {
        /** @var bool $affectedLines */
        $affectedLines = $this->commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
}
