<?php

declare(strict_types=1);

namespace Dnd\Entity;

/**
 * Class HydratorInterface
 *
 * @package   Dnd\Entity
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2004-present Agence Dn'D
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
interface HydratorInterface
{
    /**
     * Description hydrate function
     *
     * @param mixed[] $data
     *
     * @return void
     */
    public function hydrate(array $data): void;
}
