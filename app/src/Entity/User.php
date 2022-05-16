<?php

/**
 * User Entity
 */

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\Json;

/**
 * Class User.
 *
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(
 *     name="users",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(
 *                  name="email_idx",
 *                  columns={"email"},
 *          )
 *      }
 * )
 *
 * @UniqueEntity(fields={"username"})
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * Role user.
     *
     * @var string
     */
    const ROLE_USER = 'ROLE_USER';

    /**
     * Role admin.
     *
     * @var string
     */
    const ROLE_ADMIN = 'ROLE_ADMIN';

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
     * Roles.
     *
     * @var Json
     *
     * @ORM\Column(
     *     type="json",
     * )
     */
    private $roles = [];

    /**
     * Password.
     *
     * @var string The hashed password
     * @ORM\Column(
     *     type="string",
     *     length=255,
     *     unique=false,
     * )
     */
    private $password;

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
     * A visual identifier that represents this user.
     *
     * @see UserInterface UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * Getter for User name.
     *
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
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
     * Getter for the Roles.
     *
     * @return array<int, string> Roles
     *
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * Setter for the Roles.
     *
     * @param array<int, string> $roles Roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * Getter for the Password.
     *
     * @return string|null Password
     *
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Setter for the Password.
     *
     * @param string $password Password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
