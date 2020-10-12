<?php

declare(strict_types=1);

namespace Dnd\Entity;

/**
 * Class Post
 *
 * @package   Dnd\Entity
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2004-present Agence Dn'D
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
class Post extends Hydrator implements DateInterface
{
    /**
     * Description $id field
     *
     * @var int $id
     */
    private $id;
    /**
     * Description $title field
     *
     * @var string $title
     */
    private $title;
    /**
     * Description $content field
     *
     * @var string|null $content
     */
    private $content;
    /**
     * Description $creation_date field
     *
     * @var \DateTime $creation_date
     */
    private $creation_date;

    /**
     * Description getId function
     *
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * Description setId function
     *
     * @param mixed $id
     *
     * @return void
     */
    public function setId($id): void
    {
        $this->id = (int) $id;
    }

    /**
     * Description getTitle function
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Description setTitle function
     *
     * @param string $title
     *
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Description getContent function
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Description setContent function
     *
     * @param ?string $content
     *
     * @return void
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * Description getCreationDate function
     *
     * @return \DateTime
     * @throws \Exception
     */
    public function getCreationDate(): \DateTime
    {
        /** @var \DateTime $date */
        $date = new \DateTime();
        if (null !== $this->creation_date && is_string($this->creation_date)) {
            $date = new \DateTime($this->creation_date);
        }

        return $date;
    }

    /**
     * Description setCreationDate function
     *
     * @param \DateTime|string $creation_date
     *
     * @return void
     * @throws \Exception
     */
    public function setCreationDate($creation_date): void
    {
        if (is_string($creation_date)) {
            $creation_date = new \DateTime($creation_date);
        }
        $this->creation_date = $creation_date;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     * @throws \Exception
     */
    public function getFormattedDate(): string
    {
        return $this->getCreationDate()->format(self::DATE_FORMAT);
    }
}
