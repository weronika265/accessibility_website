<?php
/**
 * User fixtures.
 */

namespace App\DataFixtures;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Class UserFixtures.
 */
class UserFixtures extends AbstractBaseFixtures
{
    /**
     * Password hasher.
     */
    private UserPasswordHasherInterface $passwordHasher;

    /**
     * UserFixtures constructor.
     *
     * @param UserPasswordHasherInterface $passwordHasher Password hasher
     */
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * Load data.
     */
    protected function loadData(): void
    {
        $this->createMany(3, 'users', function ($i) {
            $user = new User();
            $user->setUsername(sprintf('user%d', $i));
            $user->setEmail(sprintf('user%d@example.com', $i));
            $user->setRoles([User::ROLE_USER]);
            $user->setPassword(
                $this->passwordHasher->hashPassword(
                    $user,
                    'user1234'
                )
            );

            return $user;
        });

        $this->createMany(1, 'admins', function ($i) {
            $user = new User();
            $user->setUsername(sprintf('admin%d', $i));
            $user->setEmail(sprintf('admin%d@example.com', $i));
            $user->setRoles([User::ROLE_ADMIN]);
            $user->setPassword(
                $this->passwordHasher->hashPassword(
                    $user,
                    'admin1234'
                )
            );

            return $user;
        });

        $this->manager->flush();
    }
}