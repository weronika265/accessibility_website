<?php

namespace App\Repository;

use App\Entity\Content;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Content>
 *
 * @method Content|null find($id, $lockMode = null, $lockVersion = null)
 * @method Content|null findOneBy(array $criteria, array $orderBy = null)
 * @method Content[]    findAll()
 * @method Content[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentRepository extends ServiceEntityRepository
{
//    /**
//     * Content repository.
//     */
//    private ContentRepository $contentRepository;

    //    Add Content Repository
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Content::class);
//        $this->contentRepository = $contentRepository;
    }

//    /**
//     * Find by Id.
//     *
//     * @param int $id Content Id
//     *
//     * @return Content|null Content entity
//     */
//    public function findOneById(int $id): ?Content
//    {
//        return $this->contentRepository->findOneById($id);
//    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Content $entity): void
    {
        $this->_em->persist($entity);
            $this->_em->flush();
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Content $entity): void
    {
        $this->_em->remove($entity);
            $this->_em->flush();
    }

    // /**
    //  * @return Content[] Returns an array of Content objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Content
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * Data.
     *
     * @var array<int, array<string, mixed>>
     */
    private array $data = [
        1 => '1.1',
        2 => '1.2',
        3 => '1.3',
        4 => '1.4',
        5 => '2.1',
        6 => '2.2',
        7 => '2.3',
        8 => '2.4',
        9 => '2.5',
        10 => '3.1',
        11 => '3.2',
        12 => '3.3',
        13 => '4.1',
    ];

    /**
     * Find all.
     *
     * @return array[] Result
     *
     * @psalm-return array<int, array<string, mixed>>
     */
    public function findAllEntries(): array
    {
        return $this->data;
    }

    /**
     * Find one by Id.
     *
     * @param int $id Id
     *
     * @return array<string, mixed>|null Result
     */
    public function findOneById(int $id): ?array
    {
        return count($this->data) && isset($this->data[$id])
            ? $this->data[$id]
            : null;
    }
}
