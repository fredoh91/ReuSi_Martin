<?php

namespace App\Controller;

use App\Entity\Signal;
use App\Form\SignalDescType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NouveauSignalController extends AbstractController
{
    #[Route(path: '/nouveau_signal', name: 'nouveau_signal')]
    public function index(Request $request): Response
    {
        $signal = new Signal();
        $signal->setDateCreation(new DateTime());

        $signalDescForm = $this->createForm(SignalDescType::class, $signal);
        $signalDescForm->handleRequest($request);

        return $this->render('nouveau_signal/index.html.twig', [
            'controller_name' => 'NouveauSignalController',
            'signal_desc_form' => $signalDescForm->createView(),
        ]);
    }
}
