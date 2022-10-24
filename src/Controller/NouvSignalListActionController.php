<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NouvSignalListActionController extends AbstractController
{
    #[Route('/nouv_signal_list_action', name: 'app_nouv_signal_list_action')]
    public function index(): Response
    {
        return $this->render('nouv_signal_list_action/index.html.twig', [
            'controller_name' => 'NouvSignalListActionController',
        ]);
    }
}
