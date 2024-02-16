<?php

namespace App\Controller;

use App\Entity\Main\Mesure;
use App\Entity\Main\ReleveDecision;
use App\Entity\Main\Suivi;
use App\Form\ReleveType;
use App\Form\SuiviType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NouvSignalSuiviSignalController extends AbstractController
{
    #[Route('/nouv_signal_suivi_signal', name: 'app_nouv_signal_suivi_signal')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        $suivi = new Suivi();
        $suiviForm = $this->createForm(SuiviType::class, $suivi);
        $suiviForm->handleRequest($request);
        
        if ($suiviForm->isSubmitted() && $suiviForm->isValid()) { 
            
        }

        $releve = new ReleveDecision();
        //$releve->getMesures()->add(new Mesure());
        $releveForm = $this->createForm(ReleveType::class, $releve);
        $releveForm->handleRequest($request);
        
        if ($releveForm->isSubmitted() && $releveForm->isValid()) { 
            $data = $releveForm->getData();
            $em->persist($data);
            $em->flush();
        }

        return $this->render('nouv_signal_suivi_signal/index.html.twig', [
            // 'controller_name' => 'NouvSignalSuiviSignalController',
            'suivi_form' => $suiviForm->createView(),
            'releve_form' => $releveForm->createView(),
        ]);
    }
}
