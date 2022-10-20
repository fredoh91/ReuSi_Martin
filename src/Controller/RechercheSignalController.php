<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheSignalController extends AbstractController
{
    /**
     * @Route("/recherche_signal", name="recherche_signal")
     */
    public function index(): Response
    {
        return $this->render('recherche_signal/index.html.twig', [
            'controller_name' => 'RechercheSignalController',
        ]);
    }
}
