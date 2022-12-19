<?php

namespace App\Controller;

use App\Entity\Main\Signal;
use App\Form\SeekType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheSignalController extends AbstractController
{
    /**
     * @Route("/recherche_signal", name="recherche_signal")
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $substance = $_GET['substance'] ?? '';
        $produit = $_GET['produit'] ?? '';

        $seekForm = $this->createForm(SeekType::class);
        $seekForm->handleRequest($request);

        if ($seekForm->isSubmitted() && $seekForm->isValid()) {
            $data = $seekForm->getData();
            $substance=$data['denomination'];
            $produit=$data['DCI'];

            return $this->redirectToRoute('recherche_signal', ['substance' => $substance, 'produit' => $produit]);
        }
        
        /*$sortTable = [];
        if ($substance != null) {
            $sortTable['substance'] = $substance;
        }
        if ($produit != null) {
            $sortTable['produit'] = $produit;
        }
        $table = $doctrine->getRepository(Signal::class)->findBy($sortTable);*/
        $table = $doctrine->getRepository(Signal::class)->findLike($produit, $substance);

        return $this->render('recherche_signal/index.html.twig', [
            'table' => $table,
            'controller_name' => 'RechercheSignalController',
        ]);
    }
}
