<?php

namespace App\Controller;

use App\Entity\Main\Signal;
use App\Form\SignalDescType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NouvSignalDescSignalController extends AbstractController
{
    #[Route('/nouv_signal_desc_signal', name: 'app_nouv_signal_desc_signal')]
    public function index(Request $request): Response
    {
        $signal = new Signal();

        $signal->setDateCreation(new DateTime());

        $signalDescForm = $this->createForm(SignalDescType::class, $signal);
        $signalDescForm->handleRequest($request);

        return $this->render('nouv_signal_desc_signal/index.html.twig', [
            'controller_name' => 'NouvSignalDescSignalController',
            'signal_desc_form' => $signalDescForm->createView(),
        ]);
    }
}
