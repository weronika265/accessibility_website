<?php

/**
 * User fixtures.
 */

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

/**
 * Class UserFixtures.
 *
 * @psalm-suppress MissingConstructor
 */
class UserFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     *
     * @psalm-suppress PossiblyNullReference
     * @psalm-suppress UnusedClosureParam
     */
    public function loadData(): void
    {
        $this->createMany(10, 'users', function (int $i) {
            $user = new User();
            $user->setUsername($this->faker->userName);
            $user->setEmail($this->faker->email);
            $user->setPassword('1234');

            return $user;
        });

        $this->manager->flush();
    }
}
