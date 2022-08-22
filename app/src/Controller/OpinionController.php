<?php

/**
 * Opinion controller.
 */

namespace App\Controller;

use App\Entity\Opinion;
use App\Form\Type\OpinionType;
use App\Service\OpinionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class OpinionController.
 */
class OpinionController extends AbstractController
{
    /**
     * Opinion service.
     *
     * @var \App\Service\OpinionService Opinion service
     */
    private OpinionService $opinionService;

    /**
     * Contructor.
     */
    public function __construct(OpinionService $opinionService)
    {
        $this->opinionService = $opinionService;
    }

//    /**
//     * Kontakt
//     *
//     * @param Request $request HTTP Request
//     *
//     * @return \Symfony\Component\HttpFoundation\Response HTTP response
//     *
//     * @Route(
//     *     "/kontakt",
//     *     methods={"GET"},
//     *     name="kontakt_index",
//     * )
//     */
//    public function index(Request $request): Response
//    {
////        $opinions = $opinionRepository->findAll();
//
//        $pagination = $this->opinionService->getPaginatedList(
//            $request->query->getInt('page', 1)
//        );
//
////        return $this->render(
////            'kontakt.html.twig',
////            ['opinions' => $opinions]
////        );
//
//        return $this->render(
//            'kontakt.html.twig',
//            ['pagination' => $pagination]
//        );
//    }

    /**
     * Opinie.
     *
     * @param Request $request HTTP Request
     *
     * @return Response HTTP response
     *
     * @Route(
     *     "/opinie",
     *     methods={"GET", "POST"},
     *     name="opinie_index",
     * )
     */
    public function index(Request $request): Response
    {
        $pagination = $this->opinionService->getPaginatedList(
            $request->query->getInt('page', 1)
        );

        $user = $this->getUser();
        $opinion = new Opinion();
        $opinion->setAuthor($user);
        $form = $this->createForm(OpinionType::class, $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->opinionService->save($opinion);

            $this->addFlash('success', 'Utworzono opinię. Czekaj na zatwierdzenie przez administratora.');

            return $this->redirectToRoute('opinie_index');
        }

        return $this->render(
            'kontakt.html.twig',
            [
                'pagination' => $pagination,
                'form' => $form->createView()
            ]
        );
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
     *     name="opinion_delete",
     * )
     */
    public function delete(Request $request, Opinion $opinion): Response
    {
//        $form = $this->createForm(FormType::class, $opinion, ['method' => 'DELETE']);
//        $form->handleRequest($request);
//
//        if ($request->isMethod('DELETE') && !$form->isSubmitted()) {
//            $form->submit($request->request->get($form->getName()));
//        }
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $this->opinionService->delete($opinion);
//            $this->addFlash('success', 'Odrzucono opinię');
//
//            return $this->redirectToRoute('admin_index');
//        }
//
//        return $this->render(
//            'opinion/delete.html.twig',
//            [
//                'form' => $form->createView(),
//                'opinion' => $opinion,
//            ]
//        );
            $this->opinionService->delete($opinion);
            $this->addFlash('success', 'Odrzucono opinię');

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
     *     name="opinion_accept",
     * )
     */
    public function accept(Request $request, Opinion $opinion): Response
    {
            $this->opinionService->accept($opinion);
            $this->addFlash('success', 'Zaakceptowano opinię');

            return $this->redirectToRoute('admin_index');
    }
}
