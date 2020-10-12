<?php

declare(strict_types=1);

namespace Dnd\Manager;

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
     * @return bool|PDOStatement
     */
    public function getComments($postId)
    {
        /** @var string $dateFormat */
        $dateFormat = self::DATE_FORMAT;
        /** @var PDO $db */
        $db = $this->dbConnect();
        /** @var string $sql */
        $sql = <<<SQL
SELECT id, author, comment, DATE_FORMAT(comment_date, "$dateFormat") AS comment_date_fr 
FROM comments 
WHERE post_id = ? 
ORDER BY comment_date DESC
SQL;
        /** @var PDOStatement|bool $comments */
        $comments = $db->prepare($sql);
        $comments->execute(array($postId));

        return $comments;
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
INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW());
SQL;

        /** @var PDOStatement|bool $comments */
        $comments = $db->prepare($sql);

        return $comments->execute(array($postId, $author, $comment));
    }
}
