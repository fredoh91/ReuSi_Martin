<?php

namespace App\Controller;

use DateTime;
use App\Entity\Suivi;
use App\Entity\Mesure;
// use App\Form\SignalDescType;
use App\Entity\SignalANSM;
use App\Form\NouvSignalSuiviType;
use App\Form\NouvSignalMesureType;
use App\Form\NouvSignalDescSignalType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NouveauSignalController extends AbstractController
{
    #[Route(path: '/nouveau_signal', name: 'nouveau_signal')]
    public function index(ManagerRegistry $doctrine,Request $request): Response
    {
        $signal = new SignalANSM();
        $signal->setDateCreation(new DateTime());

        $signalDescForm = $this->createForm(NouvSignalDescSignalType::class, $signal);
        $signalDescForm->handleRequest($request);

        // $suivi = new Suivi();
        // // $suivi->setDateCreation(new DateTime());
        // // $signal->getSuivis()->add($suivi);

        // $suiviForm = $this->createForm(NouvSignalSuiviType::class, $suivi);
        // $suiviForm->handleRequest($request);

        // $mesure = new Mesure();
        // // $suivi->setDateCreation(new DateTime());

        // $mesureForm = $this->createForm(NouvSignalMesureType::class, $mesure);
        // $mesureForm->handleRequest($request);


        // // test debut
        // $items = ['signal' => $signal
        //          , 'suivi' => $suivi
        //          , 'mesure' => $mesure
        //          ];
        // $form = $this->createForm($items);

        // $form = $this->createFormBuilder($items)
        // ->add('signal', NouvSignalDescSignalType::class)
        // // ->add('suivi', NouvSignalSuiviType::class)
        // // ->add('mesure', NouvSignalMesureType::class)
        // ->add('save', SubmitType::class, ['label' => 'Do Something'])
        //  ->getForm();

        // test fin

        if ($signalDescForm->isSubmitted() && $signalDescForm->isValid()) {
            // dd($signalDescForm);
            $entityManager = $doctrine->getManager();
            $entityManager->persist($signal);
            // dump($signal);
            $entityManager->flush();

            if($signalDescForm->get('AjoutProduit')->isClicked()) {
                dd($signal->getId());
            } else {

            }

            // return $this->redirectToRoute("nouveau_signal");
            return $this->redirectToRoute("recherche_signal");
        }




        // return $this->render('nouveau_signal/index.html.twig', [
        //     'form' => $form->createView(),
        // ]);
        return $this->render('nouveau_signal/index.html.twig', [
            'signal_desc_form' => $signalDescForm->createView(),
            // 'suivi_form' => $suiviForm->createView(),
            // 'mesure_form' => $mesureForm->createView(),
        ]);





    }
}
