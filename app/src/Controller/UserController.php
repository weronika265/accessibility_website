<?php

/**
 * User controller.
 */

namespace App\Controller;

use App\Entity\Opinion;
use App\Service\OpinionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController.
 */
class UserController extends AbstractController
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


//    OPINION TU WYWALA BLAD - NIE WIE, KTORE OPINION, BO WSZYSTKIE RAZEM?
    /**
     * Panel administatora.
     *
     * @param Request $request HTTP Request
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/admin",
     *     methods={"GET"},
     *     name="admin_index",
     * )
     */
    public function admin(Request $request): Response
    {
        $pagination = $this->opinionService->getPaginatedList(
            $request->query->getInt('page', 1)
        );

//        $form = $this->createForm(FormType::class, $opinion, [
//            'method' => 'DELETE',
//            'action' => $this->generateUrl('admin_index', ['id' => $opinion->getId()]),
//        ]);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $this->opinionService->delete($opinion);
//
//            $this->addFlash('success', 'Usunięto opinię');
//
//            return $this->redirectToRoute('admin_index');
//        }

        return $this->render(
            'user/admin.html.twig',
            [
                'pagination' => $pagination,
            ]
        );
    }

    /**
     * Konto użytkownika.
     *
     * @param Request $request HTTP Request
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/konto",
     *     methods={"GET"},
     *     name="user_index",
     * )
     */
    public function konto(Request $request): Response
    {
        $pagination = $this->opinionService->getPaginatedList(
            $request->query->getInt('page', 1)
        );

        return $this->render(
            'user/user_profile.html.twig',
            [
                'pagination' => $pagination,
            ]
        );
    }
}