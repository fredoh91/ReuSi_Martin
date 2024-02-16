<?php

namespace App\Controller;

use App\Entity\SignalANSM;
use App\Entity\SearchSignalANSM;
use App\Form\SearchSignalANSMType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RechercheSignalController extends AbstractController
{
    #[Route('/recherche_signal', name: 'recherche_signal')]
    public function index(ManagerRegistry $doctrine,Request $request, EntityManagerInterface $em): Response
    {
        
        $search = new SearchSignalANSM;
        $form = $this->createForm(SearchSignalANSMType::class, $search);
        $form->handleRequest($request);
        
        $entityManager = $doctrine->getManager();
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            if ($form->get('Recherche')->isClicked()) {
                // si on a cliqué sur le bouton de recherche 
                $signals = $entityManager->getRepository(SignalANSM::class)->findBySearchSignalANSM($search);

            } else if ($form->get('Reset')->isClicked()) {
                // si on a cliqué sur le bouton reset 
                $signals = $em->getRepository(SignalANSM::class)->findAll_DtCreaDesc();
            } else {
                dd('je sais pas quoi faire');
            }
            
        } elseif ($form->isSubmitted() && $form->isValid() == false) {
            // Si on a cliqué sur un des boutons du paginator (le formulaire est alors "isSubmitted()" mais pas "isValid()")
            $signals = $entityManager->getRepository(SignalANSM::class)->findBySearchSignalANSM($search);
        } else {
            // Affichage de tous les signaux par defaut :
            $signals = $em->getRepository(SignalANSM::class)->findAll_DtCreaDesc();
        }
        
        $nbSignals = count( $signals);

        return $this->render('recherche_signal/recherche_signal.html.twig', [
            'form' => $form->createView(),
            'signals' => $signals,
            // 'controller_name' => 'AfficheSignalController',
            'nbSignals' => $nbSignals,
        ]);
    }
}
