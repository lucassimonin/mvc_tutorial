<?php

declare(strict_types=1);

namespace Dnd\Manager;

use Dnd\Entity\Comment;
use PDO;
use PDOStatement;

/**
 * Class CommentManager
 *
 * @package   Dnd\Manager
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2004-present Agence Dn'D
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
class CommentManager extends Manager
{
    /**
     * Description getComments function
     *
     * @param $postId
     *
     * @return Comment[]
     */
    public function getComments($postId)
    {
        /** @var PDO $db */
        $db = $this->dbConnect();
        /** @var string $sql */
        $sql = <<<SQL
SELECT * 
FROM {$this->getTable()}
WHERE post_id = ? 
ORDER BY comment_date DESC
SQL;
        /** @var PDOStatement|bool $comments */
        $comments = $db->prepare($sql);
        $comments->execute([$postId]);

        return $comments->fetchAll(PDO::FETCH_CLASS, Comment::class);
    }

    /**
     * Description postComment function
     *
     * @param $postId
     * @param $author
     * @param $comment
     *
     * @return bool
     */
    public function postComment($postId, $author, $comment): bool
    {
        /** @var PDO $db */
        $db = $this->dbConnect();
        /** @var string $sql */
        $sql = <<<SQL
INSERT INTO {$this->getTable()}(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW());
SQL;

        /** @var PDOStatement|bool $comments */
        $comments = $db->prepare($sql);

        return $comments->execute([$postId, $author, $comment]);
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getTable(): string
    {
        return 'comments';
    }
}
