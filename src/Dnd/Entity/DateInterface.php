<?php

declare(strict_types=1);

namespace Dnd\Entity;

/**
 * Interface DateInterface
 *
 * @package   Dnd\Entity
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2004-present Agence Dn'D
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
interface DateInterface
{
    /**
     * Description DATE_FORMAT constant
     *
     * @var string DATE_FORMAT
     */
    public const DATE_FORMAT = 'd/m/Y à H:s:i';

    /**
     * Description getFormattedDate function
     *
     * @return string
     */
    public function getFormattedDate(): string;
}
