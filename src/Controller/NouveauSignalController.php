<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NouveauSignalController extends AbstractController
{
    #[Route(path: '/nouveau_signal', name: 'nouveau_signal')]
    public function index(): Response
    {
        return $this->render('nouveau_signal/index.html.twig', [
            'controller_name' => 'NouveauSignalController',
        ]);
    }
}
