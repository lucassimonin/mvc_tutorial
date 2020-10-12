<?php

declare(strict_types=1);

namespace Dnd\Manager;

use PDOStatement;

/**
 * Class PostManager
 *
 * @package   Dnd\Manager
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2004-present Agence Dn'D
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
class PostManager extends Manager
{
    /**
     * Description getPosts function
     *
     * @return false|PDOStatement
     */
    public function getPosts()
    {
        /** @var string $dateFormat */
        $dateFormat = self::DATE_FORMAT;
        /** @var PDO $db */
        $db = $this->dbConnect();
        /** @var string $sql */
        $sql = <<<SQL
SELECT id, title, content, DATE_FORMAT(creation_date, "$dateFormat") AS creation_date_fr 
FROM posts 
ORDER BY creation_date DESC LIMIT 0, 5
SQL;

        return $db->query($sql);
    }

    /**
     * Description getPost function
     *
     * @param $postId
     *
     * @return mixed
     */
    public function getPost($postId)
    {
        /** @var string $dateFormat */
        $dateFormat = self::DATE_FORMAT;
        /** @var PDO $db */
        $db = $this->dbConnect();
        /** @var string $sql */
        $sql = <<<SQL
SELECT id, title, content, DATE_FORMAT(creation_date, "$dateFormat") AS creation_date_fr 
FROM posts
WHERE id = ?
SQL;
        /** @var PDOStatement|bool $req */
        $req = $db->prepare($sql);
        $req->execute([$postId]);

        return $req->fetch();
    }
}
