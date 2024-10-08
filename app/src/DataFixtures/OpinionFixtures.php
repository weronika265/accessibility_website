<?php

/**
 * Opinion fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Opinion;
use App\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class OpinionFixtures.
 */
//class OpinionFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
class OpinionFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     *
     * @psalm-suppress PossiblyNullPropertyFetch
     * @psalm-suppress PossiblyNullReference
     * @psalm-suppress UnusedClosureParam
     */
    public function loadData(): void
    {
        if (null === $this->manager || null === $this->faker) {
            return;
        }

        $this->createMany(5, 'opinions', function (int $i) {
            $opinion = new Opinion();
            $opinion->setMessage($this->faker->sentence);
            $opinion->setDate(\DateTimeImmutable::createFromMutable($this->faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years', $timezone = null)));
            $opinion->setIsAccepted(false);
            $author = $this->getRandomReference('users');
            $opinion->setAuthor($author);

            return $opinion;
        });

        $this->manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return string[] of dependencies
     *
     * @psalm-return array{0: UserFixtures::class}
     */
    public function getDependencies(): array
    {
        return [UserFixtures::class];
    }
}
