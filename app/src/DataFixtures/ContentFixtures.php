<?php

/**
 * Content fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Content;
use Doctrine\Persistence\ObjectManager;

/**
 * Class ContentFixtures.
 *
 * @psalm-suppress MissingConstructor
 */
class ContentFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     *
     * @psalm-suppress PossiblyNullReference
     * @psalm-suppress UnusedClosureParam
     */
    public function loadData(): void
    {
        $this->createMany(13, 'content', function (int $i) {
            $content = new Content();
            $content->setCategory($this->faker->word);

            return $content;
        });

        $this->manager->flush();
    }
}
