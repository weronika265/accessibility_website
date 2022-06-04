<?php
/**
 * WCAG part controller.
 */

namespace App\Controller;

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

    /**
     * ARIA.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/ARIA",
     *     methods={"GET"},
     *     name="ARIA_index",
     * )
     */
    public function ARIA(): Response
    {
        return $this->render(
            'WCAG/ARIA.html.twig',
        );
    }

    /**
     * Narzędzia.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/tools",
     *     methods={"GET"},
     *     name="tools_index",
     * )
     */
    public function tools(): Response
    {
        return $this->render(
            'WCAG/tools.html.twig',
        );
    }
}