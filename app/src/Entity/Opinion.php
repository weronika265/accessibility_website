<?php

/**
 * Opinion entity.
 */

namespace App\Entity;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Opinion.
 *
 * @ORM\Entity(repositoryClass="App\Repository\OpinionRepository")
 * @ORM\Table(name="opinions")
 */
class Opinion
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
     * Opinion content.
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

//    /**
//     * Date.
//     *
//     * @var DateTimeInterface
//     *
//     * @ORM\Column(type="datetime")
//     *
//     * @ORM\Column(type="datetime")
//     * @Assert\NotBlank
//     */
//    private $date;

    /**
     * Date.
     *
     * @var DateTimeImmutable|null
     *
     * @psalm-suppress PropertyNotSetInConstructor
     *
     * @ORM\Column(type="datetime_immutable")
     */
    private ?DateTimeImmutable $date;

    /**
     * Acceptance of the message.
     *
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    public $is_accepted;
    //private by default

    /**
     * Author.
     *
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="opinions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * Getter for Id.
     *
     * @return int|null Result
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for the opinion content.
     *
     * @return string|null Opinion content
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Setter for the opinion content.
     *
     * @param string $message Opinion content
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * Getter for the date.
     *
     * @return DateTimeImmutable|null Date
     */
    public function getDate(): ?DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * Setter for the date.
     *
     * @param DateTimeImmutable $date Date
     */
    public function setDate(DateTimeImmutable $date): void
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
     * Getter for Author.
     *
     * @return User|null User
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }

    /**
     * Setter for Author.
     *
     * @param User|null $author Author
     */
    public function setAuthor(?User $author): void
    {
        $this->author = $author;
    }
}
