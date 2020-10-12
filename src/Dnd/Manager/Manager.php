<?php

declare(strict_types=1);

namespace Dnd\Manager;

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
class Manager
{
    /**
     * Description DATE_FORMAT constant
     *
     * @var string DATE_FORMAT
     */
    public const DATE_FORMAT = '%d/%m/%Y à %Hh%imin%ss';
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
}
