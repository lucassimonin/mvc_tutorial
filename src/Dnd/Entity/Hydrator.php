<?php

declare(strict_types=1);

namespace Dnd\Entity;

/**
 * Class Hydrator
 *
 * @package   Dnd\Entity
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2004-present Agence Dn'D
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
abstract class Hydrator implements HydratorInterface
{
    /**
     * {@inheritDoc}
     *
     * @param mixed[] $data
     *
     * @return void
     */
    public function hydrate(array $data): void
    {
        /**
         * @var mixed $key
         * @var mixed $value
         */
        foreach ($data as $key => $value) {
            /** @var string $method */
            $method = sprintf('set%s', ucfirst($key));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
