<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReunionNouveauxSuiviActionsController extends AbstractController
{
    #[Route(path: '/reunion_nouveaux_suivi_actions', name: 'reunion_nouveaux_suivi_actions')]
    public function index(): Response
    {
        return $this->render('reunion_nouveaux_suivi_actions/index.html.twig', [
            'controller_name' => 'ReunionNouveauxSuiviActionsController',
        ]);
    }
}
