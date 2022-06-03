<?php

/**
 * Content entity
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Content.
 *
 * @ORM\Entity(repositoryClass="App\Repository\ContentRepository")
 * @ORM\Table(name="content")
 */
class Content
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
     * Location of the message.
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=32,
     *     unique=false,
     * )
     */
    private $category;

    /**
     * Comments.
     *
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="location", orphanRemoval=true)
     */
    private $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

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
     * Getter for Location of the message.
     *
     * @return string|null Location of the message
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * Setter for Location of the message
     *
     * @param string $category Location of the message
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * Getter for Comments.
     *
     * @return Collection<int, Comment> Comment collection
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    /**
     * Add comment.
     *
     * @param Comment $comment
     */
    public function addComment(Comment $comment): void
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setContent($this);
        }
    }

    /**
     * Remove comment
     * @param Comment $comment
     * @return void
     */
    public function removeComment(Comment $comment): void
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getContent() === $this) {
                $comment->setContent(null);
            }
        }
    }
}
