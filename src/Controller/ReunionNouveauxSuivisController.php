<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReunionNouveauxSuivisController extends AbstractController
{
    /**
     * @Route("/reunion_nouveaux_suivis", name="reunion_nouveaux_suivis")
     */
    public function index(): Response
    {
        return $this->render('reunion_nouveaux_suivis/index.html.twig', [
            'controller_name' => 'ReunionNouveauxSuivisController',
        ]);
    }
}
