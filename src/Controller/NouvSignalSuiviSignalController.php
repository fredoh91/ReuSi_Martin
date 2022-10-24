<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NouvSignalSuiviSignalController extends AbstractController
{
    #[Route('/nouv_signal_suivi_signal', name: 'app_nouv_signal_suivi_signal')]
    public function index(): Response
    {
        return $this->render('nouv_signal_suivi_signal/index.html.twig', [
            'controller_name' => 'NouvSignalSuiviSignalController',
        ]);
    }
}
