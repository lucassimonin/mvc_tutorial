<?php

declare(strict_types=1);

namespace Dnd\Manager;

use Dnd\Entity\Post;
use PDO;
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
     * @return Post[]
     */
    public function getPosts(): array
    {
        /** @var PDO $db */
        $db = $this->dbConnect();
        /** @var string $sql */
        $sql = <<<SQL
SELECT *
FROM {$this->getTable()} 
ORDER BY creation_date DESC LIMIT 0, 5
SQL;

        /** @var PDOStatement|bool $req */
        $req = $db->query($sql);

        return $req->fetchAll(\PDO::FETCH_CLASS, Post::class);
    }

    /**
     * Description getPost function
     *
     * @param $postId
     *
     * @return Post|null
     */
    public function getPost($postId): ?Post
    {
        /** @var PDO $db */
        $db = $this->dbConnect();
        /** @var string $sql */
        $sql = <<<SQL
SELECT *
FROM {$this->getTable()}
WHERE id = ?
SQL;
        /** @var PDOStatement|bool $req */
        $req = $db->prepare($sql);
        $req->execute([$postId]);
        $req->setFetchMode(PDO::FETCH_CLASS, Post::class);

        return $req->fetch();
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getTable(): string
    {
        return 'posts';
    }
}
