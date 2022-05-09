<?php

/**
 * Opinion service.
 */

namespace App\Service;

use App\Entity\Opinion;
use App\Repository\OpinionRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class OpinionService.
 */
class OpinionService
{
    /**
     * Opinion repository.
     *
     * @var OpinionRepository
     */
    private OpinionRepository $opinionRepository;

    /**
     * Paginator.
     *
     * @var PaginatorInterface
     */
    private PaginatorInterface $paginator;

    /**
     * Contructor.
     *
     * @param OpinionRepository $opinionRepository
     * @param PaginatorInterface $paginator
     */
    public function __construct(OpinionRepository $opinionRepository, PaginatorInterface $paginator)
    {
        $this->opinionRepository = $opinionRepository;
        $this->paginator = $paginator;
    }

    /**
     * Get paginated list.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface<string, mixed> Paginated list
     */
    public function getPaginatedList(int $page): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->opinionRepository->queryAll(),
            $page,
            OpinionRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }

    /**
     * Save entity.
     *
     * @param Opinion $opinion Opinion entity
     */
    public function save(Opinion $opinion): void
    {
//        if ($opinion->getId() == null) {
//            $opinion->setDate(new \DateTimeImmutable());
//        }
//        $opinion->setDate(new \DateTimeImmutable());

        $this->opinionRepository->save($opinion);
    }
}