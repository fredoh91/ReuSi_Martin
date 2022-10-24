<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NouvSignalDescSignalController extends AbstractController
{
    #[Route('/nouv_signal_desc_signal', name: 'app_nouv_signal_desc_signal')]
    public function index(): Response
    {
        return $this->render('nouv_signal_desc_signal/index.html.twig', [
            'controller_name' => 'NouvSignalDescSignalController',
        ]);
    }
}
