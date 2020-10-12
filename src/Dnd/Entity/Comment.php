<?php

declare(strict_types=1);

namespace Dnd\Entity;

/**
 * Class Comment
 *
 * @package   Dnd\Entity
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2004-present Agence Dn'D
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
class Comment implements DateInterface
{
    /**
     * Description $id field
     *
     * @var int $id
     */
    private $id;
    /**
     * Description $id field
     *
     * @var int $postId
     */
    private $postId;
    /**
     * Description $author field
     *
     * @var string $author
     */
    private $author;
    /**
     * Description $comment field
     *
     * @var string $comment
     */
    private $comment;
    /**
     * Description $comment_date field
     *
     * @var \DateTime $comment_date
     */
    private $comment_date;

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
     * @param int $id
     *
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Description getPostId function
     *
     * @return int
     */
    public function getPostId(): int
    {
        return (int)$this->postId;
    }

    /**
     * Description setPostId function
     *
     * @param int $postId
     *
     * @return void
     */
    public function setPostId(int $postId): void
    {
        $this->postId = $postId;
    }

    /**
     * Description getAuthor function
     *
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Description setAuthor function
     *
     * @param string $author
     *
     * @return void
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * Description getComment function
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Description setComment function
     *
     * @param string $comment
     *
     * @return void
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * Description getCommentDate function
     *
     * @return \DateTime
     * @throws \Exception
     */
    public function getCommentDate(): \DateTime
    {
        /** @var \DateTime $date */
        $date = new \DateTime();
        if (null !== $this->comment_date && is_string($this->comment_date)) {
            $date = new \DateTime($this->comment_date);
        }

        return $date;
    }



    /**
     * Description setCommentDate function
     *
     * @param \DateTime $comment_date
     *
     * @return void
     */
    public function setCommentDate(\DateTime $comment_date): void
    {
        $this->comment_date = $comment_date;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     * @throws \Exception
     */
    public function getFormattedDate(): string
    {
        return $this->getCommentDate()->format(self::DATE_FORMAT);
    }
}
