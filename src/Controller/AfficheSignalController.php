<?php

namespace App\Controller;

use App\Entity\SignalANSM;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AfficheSignalController extends AbstractController
{
    #[Route('/affiche_signal', name: 'affiche_signal')]
    public function index(EntityManagerInterface $em): Response
    {
        
        $signals = $em->getRepository(SignalANSM::class)->findAll();


        return $this->render('affiche_signal/index.html.twig', [
            'signals' => $signals,
            'controller_name' => 'AfficheSignalController',
        ]);
    }
}
