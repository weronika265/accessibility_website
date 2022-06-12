<?php
/**
 * Home controller.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SiteController.
 */
class SiteController extends AbstractController
{
    /**
     * Strona główna.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="home_index",
     * )
     */
    public function index(): Response
    {
        return $this->render(
            'home.html.twig',
        );
    }

    /**
     * Strona Dla czytelnika.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/czytelnik",
     *     methods={"GET"},
     *     name="czytelnik_index",
     * )
     */
    public function czytelnik(): Response
    {
        return $this->render(
            'czytelnik.html.twig',
        );
    }

//    /**
//     * Kontakt.
//     *
//     * @return \Symfony\Component\HttpFoundation\Response HTTP response
//     *
//     * @Route(
//     *     "/kontakt",
//     *     methods={"GET"},
//     *     name="kontakt_index",
//     * )
//     */
//    public function kontakt(): Response
//    {
//        return $this->render(
//            'kontakt.html.twig',
//        );
//    }

    /**
     * Informacja o stronie.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/projekt_info",
     *     methods={"GET"},
     *     name="projekt_info_index",
     * )
     */
    public function projekt_info(): Response
    {
        return $this->render(
            'projekt_info.html.twig',
        );
    }

    /**
     * Mapa serwisu.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/mapa_serwisu",
     *     methods={"GET"},
     *     name="mapa_serwisu_index",
     * )
     */
    public function mapa_serwisu(): Response
    {
        return $this->render(
            'mapa_serwisu.html.twig',
        );
    }
}
