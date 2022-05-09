<?php

/**
 * Content entity
 */

namespace App\Entity;

use App\Repository\ContentRepository;
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
}
