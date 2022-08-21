<?php

/**
 * Content fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Content;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class ContentFixtures.
 *
 * @psalm-suppress MissingConstructor
 */
class ContentFixtures extends Fixture
{
//    /**
//     * Load data.
//     *
//     * @psalm-suppress PossiblyNullReference
//     * @psalm-suppress UnusedClosureParam
//     */
//    public function loadData(): void
//    {
//        $this->createMany(13, 'content', function (int $i) {
//            $content = new Content();
//            $content->setCategory($this->faker->word);
//
//            return $content;
//        });
//
//        $this->manager->flush();
//    }

    private array $categories = ['1_1_alt-txt', '1_2_multimedia', '1_3_adapt', '1_4_distinguish', '2_1_keyboard', '2_2_time', '2_3_epilepsy', '2_4_nav', '2_5_inputs', '3_1_read', '3_2_predict', '3_3_help', '4_1_compatible'];

    /**
     * Load.
     *
     * @param ObjectManager $manager Persistence object manager
     */
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create();

/*        $content = new Content();
        $content->setCategory('alt-txt');
        $manager->persist($content);*/

        foreach($this->categories as $category) {
            $content = new Content();
            $content->setCategory($category);
            $manager->persist($content);
        }

        $manager->flush();
    }
}
