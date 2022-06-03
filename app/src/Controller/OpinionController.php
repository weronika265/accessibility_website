<?php

/**
 * Opinion controller.
 */

namespace App\Controller;

use App\Entity\Opinion;
use App\Form\Type\OpinionType;
use App\Service\OpinionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     * Kontakt
     *
     * @param Request $request HTTP Request
     *
     * @return Response HTTP response
     *
     * @Route(
     *     "/kontakt",
     *     methods={"GET", "POST"},
     *     name="kontakt_index",
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

            $this->addFlash('success', 'Utworzono Opinię. Czekaj na zatwierdzenie przez administratora.');

            return $this->redirectToRoute('kontakt_index');
        }

        return $this->render(
            'kontakt.html.twig',
            [
                'pagination' => $pagination,
                'form' => $form->createView()
            ]
        );
    }
//    TODO:
//    Display only accepted comments.
//    If send -> save and display only form admin -> if accepted [display] -> if not accepted [delete]
}
