<?php

/**
 * Comment entity.
 */

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Comment.
 *
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 * @ORM\Table(name="comments")
 */
class Comment
{
    /**
     * Primary key.
     *
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(
     *     name="id",
     *     type="integer",
     *     nullable=false,
     * )
     */
    private $id;

    /**
     * Comment content.
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=255,
     *     unique=false,
     * )
     *
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *     max="255",
     * )
     */
    private $message;

    /**
     * Date.
     *
     * @var DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    private $date;

    /**
     * Location of the message.
     *
     * @var Content
     *
     * @ORM\ManyToOne(
     *     targetEntity="App\Entity\Content",
     *     inversedBy="comments",
     * )
     * @ORM\JoinColumn(nullable=false)
     */
    private $content;

    /**
     * Acceptance of the message.
     *
     * @var boolean
     *
     * @ORM\Column(
     *     type="boolean",
     * )
     */
    private $is_accepted;

    /**
     * Author.
     *
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

//    /**
//     * Location.
//     *
//     * @ORM\ManyToOne(targetEntity=Content::class, inversedBy="comments")
//     * @ORM\JoinColumn(nullable=true)
//     */
//    private $location;

    /**
     * Getter for the id.
     *
     * @return int|null Result
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for the comment content.
     *
     * @return string|null Comment content
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Setter for the comment content.
     *
     * @param string $message Comment content
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * Getter for the date.
     *
     * @return DateTimeInterface|null Date
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * Setter for the date.
     *
     * @param DateTimeInterface $date Date
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * Getter for the acceptance of the message.
     *
     * @return bool|null Bool
     */
    public function getIsAccepted(): ?bool
    {
        return $this->is_accepted;
    }

    /**
     * Setter for the acceptance of the message.
     *
     * @param bool $is_accepted Bool
     */
    public function setIsAccepted(bool $is_accepted): void
    {
        $this->is_accepted = $is_accepted;
    }

    /**
     * Getter for Content.
     *
     * @return Content|null Content entity
     */
    public function getContent(): ?Content
    {
        return $this->content;
    }

    /**
     * Setter for Content.
     *
     * @param Content|null $content Content entity
     */
    public function setContent(?Content $content): void
    {
        $this->content = $content;

    }

    /**
     * Getter for Author.
     *
     * @return User|null User entity
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }

    /**
     * Setter for Author.
     *
     * @param User|null $author User entity
     */
    public function setAuthor(?User $author): void
    {
        $this->author = $author;
    }

//    public function getLocation(): ?Content
//    {
//        return $this->location;
//    }
//
//    public function setLocation(?Content $location): self
//    {
//        $this->location = $location;
//
//        return $this;
//    }
}
