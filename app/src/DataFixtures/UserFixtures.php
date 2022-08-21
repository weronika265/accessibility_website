<?php
/**
 * User fixtures.
 */

namespace App\DataFixtures;

use App\Entity\User;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

/**
 * Class UserFixtures.
 */
class UserFixtures extends Fixture
{
    /**
     * Faker.
     *
     * @var Generator
     */
    protected Generator $faker;

    /**
     * Persistence object manager.
     *
     * @var ObjectManager
     */
    protected ObjectManager $manager;

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
     * Load.
     *
     * @param ObjectManager $manager Persistence object manager
     */
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create();

        $user1 = new User();
        $user1->setUsername('pointBlank146');
        $user1->setEmail('janek_cieron@mail.com');
        $user1->setRoles([User::ROLE_USER]);
        $user1->setPassword(
            $this->passwordHasher->hashPassword(
                $user1,
                'janek1234'
            )
        );
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('grzechotka9');
        $user2->setEmail('superpaulina@mail.com');
        $user2->setRoles([User::ROLE_USER]);
        $user2->setPassword(
            $this->passwordHasher->hashPassword(
                $user2,
                'qwerty'
            )
        );
        $manager->persist($user2);

        $admin = new User();
        $admin->setUsername('administrator');
        $admin->setEmail('admin@internal.com');
        $admin->setRoles([User::ROLE_ADMIN]);
        $admin->setPassword(
            $this->passwordHasher->hashPassword(
                $admin,
                'projectAdmin1'
            )
        );
        $manager->persist($admin);

        $manager->flush();
    }

//    /**
//     * Load data.
//     */
//    public function loadData(): void
//    {
///*        $this->createMany(3, 'users', function ($i) {
//            $user = new User();
//            $user->setUsername(sprintf('user%d', $i));
//            $user->setEmail(sprintf('user%d@example.com', $i));
//            $user->setRoles([User::ROLE_USER]);
//            $user->setPassword(
//                $this->passwordHasher->hashPassword(
//                    $user,
//                    'user1234'
//                )
//            );
//
//            return $user;
//        });
//
//        $this->createMany(1, 'admins', function ($i) {
//            $user = new User();
//            $user->setUsername(sprintf('admin%d', $i));
//            $user->setEmail(sprintf('admin%d@example.com', $i));
//            $user->setRoles([User::ROLE_ADMIN]);
//            $user->setPassword(
//                $this->passwordHasher->hashPassword(
//                    $user,
//                    'admin1234'
//                )
//            );
//
//            return $user;
//        });*/
//
//        $user1 = new User();
//        $user1->setUsername('pointBlank146');
//        $user1->setEmail('janek_cieron@mail.com');
//        $user1->setRoles([User::ROLE_USER]);
//        $user1->setPassword(
//            $this->passwordHasher->hashPassword(
//                $user1,
//                'janek1234'
//            )
//        );
////        $manager->persist($user1);
//
//        $user2 = new User();
//        $user2->setUsername('grzechotka9');
//        $user2->setEmail('superpaulina@mail.com');
//        $user2->setRoles([User::ROLE_USER]);
//        $user2->setPassword(
//            $this->passwordHasher->hashPassword(
//                $user2,
//                'qwerty'
//            )
//        );
////        $manager->persist($user2);
//
//        $admin = new User();
//        $admin->setUsername('administrator');
//        $admin->setEmail('admin@internal.com');
//        $admin->setRoles([User::ROLE_ADMIN]);
//        $admin->setPassword(
//            $this->passwordHasher->hashPassword(
//                $admin,
//                'projectAdmin1'
//            )
//        );
////        $manager->persist($admin);
////        return [$user1, $user2, $admin];
//
//        $this->manager->flush();
//    }
}