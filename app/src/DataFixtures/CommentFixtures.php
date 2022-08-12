<?php

/**
 * Comment fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class CommentFixtures.
 */
class CommentFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
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
//        if (null === $this->manager || null === $this->faker) {
//            return;
//        }
//
//        $this->createMany(20, 'comments', function (int $i) {
//            $comment = new Comment();
//            $comment->setMessage($this->faker->sentence);
//            $comment->setDate(\DateTimeImmutable::createFromMutable($this->faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years', $timezone = null)));
//            $comment->setIsAccepted(false);
//            $author = $this->getRandomReference('users');
//            $comment->setAuthor($author);
//            $content = $this->getRandomReference('content');
//            $comment->setContent($content);
//
//            return $comment;
//        });
//
//        $this->manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return string[] of dependencies
     *
//     * @psalm-return array{0: UserFixtures::class, 1:ContentFixtures::class}
     */
    public function getDependencies(): array
    {
        return [UserFixtures::class, ContentFixtures::class];
    }
}
