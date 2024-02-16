<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AfficheProduitController extends AbstractController
{
    #[Route('/affiche_produit/{idProduit}', name: 'affiche_produit')]
    public function index(Request $request, EntityManagerInterface $em, int $idProduit): Response
    {
        $produit = $em->getRepository(Produit::class)->findOneById($idProduit);
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $idSignal=$produit->getProduitSignal()->getId();
            $em->persist($produit);
            $em->flush();
            // return $this->redirectToRoute('affiche_signal'); 
            return $this->redirectToRoute('affiche_signal', [
                'idSignal' => $idSignal,
            ]);
        }


        // return $this->render('affiche_produit/affiche_produit.html.twig', [
            return $this->render('creation_produit/saisie.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }
}
