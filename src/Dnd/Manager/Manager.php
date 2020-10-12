<?php

declare(strict_types=1);

namespace Dnd\Manager;

use Dnd\Entity\HydratorInterface;
use mysql_xdevapi\DatabaseObject;
use PDO;

/**
 * Class Manager
 *
 * @package   Dnd\Manager
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2004-present Agence Dn'D
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
abstract class Manager
{
    /**
     * Description $class field
     *
     * @var mixed $class
     */
    protected $class;
    /**
     * Description dbConnect function
     *
     * @return PDO
     */
    protected function dbConnect(): PDO
    {
        try
        {
            /** @var PDO $db */
            $db = new PDO('mysql:host=127.0.0.1;port=3307;dbname=blog;charset=utf8', 'mvc_tp', 'mvc_tp');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

    /**
     * Description getTable function
     *
     * @return string
     */
    abstract public function getTable(): string;

    /**
     * Description hydrateObject function
     *
     * @param mixed[] $data
     *
     * @return object[]
     */
    public function hydrateObjects(array $data): array
    {
        if (null === $this->class) {
            throw new \InvalidArgumentException('You need to init $class attribute before to use this function.');
        }
        /** @var object[] $objects */
        $objects = [];
        foreach ($data as $item) {
            $object = $this->hydrateObject($item);
            $objects[] = $object;
        }

        return $objects;
    }

    /**
     * Description hydrateObject function
     *
     * @param array $item
     *
     * @return HydratorInterface
     */
    public function hydrateObject(array $item): HydratorInterface
    {
        /** @var HydratorInterface $object */
        $object = new $this->class();
        $object->hydrate($item);

        return $object;
    }
}
