<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NouveauSuiviController extends AbstractController
{
    #[Route(path: '/nouveau_suivi', name: 'nouveau_suivi')]
    public function index(): Response
    {
        return $this->render('nouveau_suivi/index.html.twig', [
            'controller_name' => 'NouveauSuiviController',
        ]);
    }
}
