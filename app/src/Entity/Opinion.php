<?php

/**
 * Opinion entity.
 */

namespace App\Entity;

use App\Repository\OpinionRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

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
     */
    private $message;

    /**
     * Date.
     *
     * @var DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * Author.
     *
     * @var User
     *
     * @ORM\ManyToOne(
     *     targetEntity="App\Entity\User",
     *     inversedBy="opinions",
     * )
     * @ORM\JoinColumn(nullable=false)
     */
    private ?User $user = null;

    /**
     * Acceptance of the message.
     *
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $is_accepted;

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
     * Getter for Author.
     *
     * @return User|null Author entity
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * Setter for Author.
     *
     * @param User|null $user Author entity
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }
}
