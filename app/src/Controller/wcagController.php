<?php
/**
 * WCAG part controller.
 */

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Content;
use App\Form\Type\CommentType;
use App\Repository\CommentRepository;
use App\Repository\ContentRepository;
use App\Repository\OpinionRepository;
use Doctrine\Persistence\ManagerRegistry;
use Entity\Category;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class wcagController.
 *
 * @Route("/tworca")
 */
class wcagController extends AbstractController
{

    /**
     * Opinion repository.
     *
     * @var CommentRepository
     */
    private CommentRepository $commentRepository;

//    /**
//     * Content repository.
//     *
//     * @var ContentRepository
//     */
//    private ContentRepository $contentRepository;

    private ManagerRegistry $doctrine;


//    Add Content Repository
    /**
     * Contructor.
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
//        $this->contentRepository = $contentRepository;
    }

    /**
     * Strona Dla twórcy.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="tworca_index",
     * )
     */
    public function tworca(): Response
    {
        return $this->render(
            'WCAG/tworca.html.twig',
        );
    }

    /**
     * Checklista WCAG
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/WCAG_checklist",
     *     methods={"GET"},
     *     name="WCAG_checklist_index",
     * )
     */
    public function wcag_checklist(): Response
    {
        return $this->render(
            'WCAG/WCAG_checklist.html.twig',
        );
    }


//    KRYTERIA

//    setCategory()
    /**
     * 1.1 Alternatywa tekstowa
     *
     * @param Request $request HTTP request
     * @param CommentRepository $commentRepository Comment repository
     * @param ContentRepository $contentRepository Content repository
     *
     * @return Response HTTP response
     *
     * @Route(
     *     "/Postrzegalnosc/1_1",
     *     methods={"GET", "POST"},
     *     name="alt-txt_index",
     * )
     */
    public function altTxt(Request $request, CommentRepository $commentRepository, ContentRepository $contentRepository, PaginatorInterface $paginator): Response
    {
//        $comments = $commentRepository->queryAll();

        $pagination = $paginator->paginate(
            $commentRepository->queryAll(),
            $request->query->getInt('page', 1),
            CommentRepository::PAGINATOR_ITEMS_PER_PAGE
        );

//        $content = $this->contentRepository->findOneById(11);

        $user = $this->getUser();
        $comment = new Comment();
        $comment->setAuthor($user);

//        $comment->setContent($content);

//        $comment->setContent($content_name); // w setContent musi byc obiekt Content (czyli w zmiennej $content_name)
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->save($comment);

            $this->addFlash('success', 'Utworzono Komentarz. Czekaj na zatwierdzenie przez administratora.');

            return $this->redirectToRoute('alt-txt_index');
        }

        return $this->render(
            'WCAG/WCAG_success_criteria/1_1_alt-txt.html.twig',
            [
                'pagination' => $pagination,
                'form' => $form->createView()
            ]
        );
    }

    /**
     * 1.2 Multimedia
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Postrzegalnosc/1_2",
     *     methods={"GET"},
     *     name="multimedia_index",
     * )
     */
    public function multimedia(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/1_2_multimedia.html.twig',
        );
    }

    /**
     * 1.3 Możliwość adaptacji
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Postrzegalnosc/1_3",
     *     methods={"GET"},
     *     name="adapt_index",
     * )
     */
    public function adapt(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/1_3_adapt.html.twig',
        );
    }

    /**
     * 1.4 Rozróżnialność
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Postrzegalnosc/1_4",
     *     methods={"GET"},
     *     name="distinguish_index",
     * )
     */
    public function distinguish(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/1_4_distinguish.html.twig',
        );
    }

    /**
     * 2.1 Dostępność z klawiatury
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Funkcjonalnosc/2_1",
     *     methods={"GET"},
     *     name="keyboard_index",
     * )
     */
    public function keyboard(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/2_1_keyboard.html.twig',
        );
    }

    /**
     * 2.2 Wystarczający czas
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Funkcjonalnosc/2_2",
     *     methods={"GET"},
     *     name="time_index",
     * )
     */
    public function time(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/2_2_time.html.twig',
        );
    }

    /**
     * 2.3 Ataki padaczki
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Funkcjonalnosc/2_3",
     *     methods={"GET"},
     *     name="epilepsy_index",
     * )
     */
    public function epilepsy(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/2_3_epilepsy.html.twig',
        );
    }

    /**
     * 2.4 Możliwość nawigacji
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Funkcjonalnosc/2_4",
     *     methods={"GET"},
     *     name="nav_index",
     * )
     */
    public function nav(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/2_4_nav.html.twig',
        );
    }

    /**
     * 2.5 Metody obsługi
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Funkcjonalnosc/2_5",
     *     methods={"GET"},
     *     name="inputs_index",
     * )
     */
    public function inputs(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/2_5_inputs.html.twig',
        );
    }

    /**
     * 3.1 Możliwość odczytania
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Zrozumialosc/3_1",
     *     methods={"GET"},
     *     name="read_index",
     * )
     */
    public function read(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/3_1_read.html.twig',
        );
    }

    /**
     * 3.2 Przewidywalność
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Zrozumialosc/3_2",
     *     methods={"GET"},
     *     name="predict_index",
     * )
     */
    public function predict(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/3_2_predict.html.twig',
        );
    }

    /**
     * 3.3 Pomoc przy wprowadzaniu informacji
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Zrozumialosc/3_3",
     *     methods={"GET"},
     *     name="help_index",
     * )
     */
    public function help(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/3_3_help.html.twig',
        );
    }

    /**
     * 4.1 Kompatybilność
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Solidnosc/3_3",
     *     methods={"GET"},
     *     name="compatible_index",
     * )
     */
    public function compatible(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/4_1_compatible.html.twig',
        );
    }

//  EXAMPLES
    /**
     * 1.3.2 Dobry przykład.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Postrzegalnosc/1_3_2_dobry",
     *     methods={"GET"},
     *     name="_1_3_2_dobry",
     * )
     */
    public function _1_3_2_dobry(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/examples/1_3_2_dobry.html.twig',
        );
    }

    /**
     * 1.3.2 Zły przykład.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Postrzegalnosc/1_3_2_zly",
     *     methods={"GET"},
     *     name="_1_3_2_zly",
     * )
     */
    public function _1_3_2_zly(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/examples/1_3_2_zly.html.twig',
        );
    }

    /**
     * 1.3.4 Dobry przykład.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Postrzegalnosc/1_3_4_dobry",
     *     methods={"GET"},
     *     name="_1_3_4_dobry",
     * )
     */
    public function _1_3_4_dobry(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/examples/1_3_4_dobry.html.twig',
        );
    }

    /**
     * 1.3.4 Zły przykład.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Postrzegalnosc/1_3_4_zly",
     *     methods={"GET"},
     *     name="_1_3_4_zly",
     * )
     */
    public function _1_3_4_zly(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/examples/1_3_4_zly.html.twig',
        );
    }

    /**
     * 2.1.2 Przykład.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Postrzegalnosc/2_1_2",
     *     methods={"GET"},
     *     name="_2_1_2_example",
     * )
     */
    public function _2_1_2(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/examples/2_1_2_example.html.twig',
        );
    }

    /**
     * 2.4.3 Przykład.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Postrzegalnosc/2_4_3",
     *     methods={"GET"},
     *     name="_2_4_3_example",
     * )
     */
    public function _2_4_3_(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/examples/2_4_3_example.html.twig',
        );
    }

    /**
     * 3.2.1 Dobry przykład.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Postrzegalnosc/3_2_1_dobry",
     *     methods={"GET"},
     *     name="_3_2_1_dobry",
     * )
     */
    public function _3_2_1_dobry(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/examples/3_2_1_dobry.html.twig',
        );
    }

    /**
     * 3.2.1 Zły przykład.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/Postrzegalnosc/3_2_1_zly",
     *     methods={"GET"},
     *     name="_3_2_1_zly",
     * )
     */
    public function _3_2_1_zly(): Response
    {
        return $this->render(
            'WCAG/WCAG_success_criteria/examples/3_2_1_zly.html.twig',
        );
    }

//  KOMENTARZE
    /**
     * Save entity.
     *
     * @param Comment $comment Opinion entity
     */
    public function save(Comment $comment): void
    {
        if ($comment->getId() == null) {
            $comment->setDate(new \DateTimeImmutable());
            $comment->setIsAccepted(0);
        }
        $comment->setDate(new \DateTimeImmutable());
        $comment->setIsAccepted(0);

        $this->commentRepository->save($comment);
    }

    /**
     * Save entity.
     *
     * @param Comment $comment Opinion entity
     */
    public function accept(Comment $comment): void
    {
        if ($comment->getId() == null) {
            $comment->setIsAccepted(1);
        }
        $comment->setIsAccepted(1);

        $this->commentRepository->save($comment);
    }

    /**
     * Save entity.
     *
     * @param Comment $comment Opinion entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Comment $comment): void
    {
        $this->commentRepository->delete($comment);
    }

    /**
     * Usuń opinię
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/admin/delete/{id}",
     *     methods={"GET", "DELETE"},
     *     name="comment_delete",
     * )
     */
    public function adminDelete(Request $request, Comment $comment): Response
    {
        $this->delete($comment);
        $this->addFlash('success', 'Odrzucono komentarz');

        return $this->redirectToRoute('admin_index');
    }

    /**
     * Zaakceptuj opinie
     *
     * @param Request $request HTTP Request
     *
     * @return Response HTTP response
     *
     * @Route(
     *     "/admin/accept/{id}",
     *     methods={"GET", "PUT"},
     *     name="comment_accept",
     * )
     */
    public function adminAccept(Request $request, Comment $comment): Response
    {
        $this->accept($comment);
        $this->addFlash('success', 'Zaakceptowano komentarz');

        return $this->redirectToRoute('admin_index');
    }
}