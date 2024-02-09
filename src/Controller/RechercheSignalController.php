<?php

namespace App\Controller;

use App\Entity\Main\Signal;
use App\Form\SeekType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheSignalController extends AbstractController
{
    #[Route(path: '/recherche_signal', name: 'recherche_signal')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {

        return $this->render('recherche_signal/index.html.twig', [
            'controller_name' => 'RechercheSignalController',
        ]);
    }
}
