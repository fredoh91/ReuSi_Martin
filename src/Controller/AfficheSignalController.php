<?php

namespace App\Controller;

use App\Form\SeekType;
use App\Entity\SignalANSM;
use App\Entity\Main\Signal;
use App\Form\NouvSignalDescSignalType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AfficheSignalController extends AbstractController
{
    #[Route(path: '/affiche_signal/{idSignal}', name: 'affiche_signal')]
    public function index(Request $request, ManagerRegistry $doctrine,EntityManagerInterface $em, int $idSignal): Response
    {
        
        $signal = $em->getRepository(SignalANSM::class)->findOneById($idSignal);
        $signalDescForm = $this->createForm(NouvSignalDescSignalType::class, $signal);
        $signalDescForm->handleRequest($request);
        // return $this->render('affiche_signal/index.html.twig', [
        //     'signals' => $signals,
        //     'controller_name' => 'AfficheSignalController',
        // ]);
        return $this->render('affiche_signal/affiche_signal.html.twig', [
            'signal' => $signal,
            'signal_desc_form' => $signalDescForm->createView(),
        ]);
    }
}
