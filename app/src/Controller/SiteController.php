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

    /**
     * Strona Dla twórcy.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/tworca",
     *     methods={"GET"},
     *     name="tworca_index",
     * )
     */
    public function tworca(): Response
    {
        return $this->render(
            'tworca.html.twig',
        );
    }

    /**
     * Kontakt.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/kontakt",
     *     methods={"GET"},
     *     name="kontakt_index",
     * )
     */
    public function kontakt(): Response
    {
        return $this->render(
            'kontakt.html.twig',
        );
    }

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
     * Rejestracja.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/rejestracja",
     *     methods={"GET"},
     *     name="rejestracja_index",
     * )
     */
    public function rejestracja(): Response
    {
        return $this->render(
            'rejestracja.html.twig',
        );
    }

    /**
     * Logowanie.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/logowanie",
     *     methods={"GET"},
     *     name="logowanie_index",
     * )
     */
    public function logowanie(): Response
    {
        return $this->render(
            'logowanie.html.twig',
        );
    }
}
