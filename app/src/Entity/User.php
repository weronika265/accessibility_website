<?php

/**
 * User Entity
 */

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints\Json;

/**
 * Class User.
 *
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(
 *     name="users",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(
 *                  name="username_idx",
 *                  columns={"username"},
 *          )
 *      }
 * )
 *
 * @UniqueEntity(fields={"username"})
 */
class User
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
     *     options={"unsigned"=true},
     * )
     */
    private $id;

    /**
     * User name.
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=32,
     *     unique=true,
     * )
     */
    private $username;

    /**
     * E-mail.
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=50,
     *     unique=true,
     * )
     */
    private $email;

    /**
     * Password.
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=255,
     *     unique=false,
     * )
     */
    private $password;

    /**
     * Roles.
     *
     * @var Json
     *
     * @ORM\Column(
     *     type="json",
     * )
     */
    private $role = [];

    /**
     * Opinions
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Opinion", mappedBy="user")
     */
    private $opinions;

    /**
     * Comments.
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="user")
     */
    private $comments;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->opinions = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

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
     * Getter for User name.
     *
     * @return string User name
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    /**
     * Setter for User name.
     *
     * @param string $username User name
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * Getter for the E-mail.
     *
     * @return string|null E-mail
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Setter for the E-mail.
     *
     * @param string $email E-mail
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Getter for the Password.
     *
     * @return string|null Password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Setter for the Password.
     *
     * @param string|null $password Password
     */
    public function setPassword(?string $password): void
    {
        $this->password = (string) $password;
    }

    /**
     * Getter for the Roles.
     *
     * @return array Roles
     */
    public function getRole(): array
    {
        return $this->role;
    }

    /**
     * Setter for the Roles.
     *
     * @param array $role Role
     */
    public function setRole(array $role): void
    {
        $this->role = $role;
    }

    /**
     * Getter for Opinions.
     *
     * @return Collection<int, Opinion> Opinion entity collection
     */
    public function getOpinions(): Collection
    {
        return $this->opinions;
    }

    /**
     * Add Opinion to collection.
     *
     * @param \App\Entity\Opinion $opinion Opinion entity
     */
    public function addOpinion(Opinion $opinion): void
    {
        if (!$this->opinions->contains($opinion)) {
            $this->opinions[] = $opinion;
            $opinion->setUser($this);
        }
    }

    /**
     * Remove Opinion from collection.
     *
     * @param Opinion $opinion Opinion entity
     */
    public function removeOpinion(Opinion $opinion): void
    {
        if ($this->opinions->removeElement($opinion)) {
            // set the owning side to null (unless already changed)
            if ($opinion->getUser() === $this) {
                $opinion->setUser(null);
            }
        }
    }

    /**
     * Getter for Comments.
     *
     * @return Collection<int, Comment> Comment entity collection
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    /**
     * Add Comment to collection.
     *
     * @param Comment $comment Comment entity
     */
    public function addComment(Comment $comment): void
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setUser($this);
        }
    }

    /**
     * Remove Comment from collection.
     *
     * @param Comment $comment Comment entity
     */
    public function removeComment(Comment $comment): void
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }
    }
}
