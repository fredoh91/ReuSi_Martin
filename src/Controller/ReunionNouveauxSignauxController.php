<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReunionNouveauxSignauxController extends AbstractController
{
    #[Route(path: '/reunion_nouveaux_signaux', name: 'reunion_nouveaux_signaux')]
    public function index(): Response
    {
        return $this->render('reunion_nouveaux_signaux/index.html.twig', [
            'controller_name' => 'ReunionNouveauxSignauxController',
        ]);
    }
}
