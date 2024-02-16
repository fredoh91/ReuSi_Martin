<?php

namespace App\Controller;

use App\Form\ProduitType;
use App\Entity\SignalANSM;
use App\Codex\RequetesCodex;
use App\Form\SearchCodexType;
use App\Entity\Codex\SearchCodex;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreationProduitController extends AbstractController
{
    #[Route('/creation_produit/recherche/{idSignal}', name: 'app_creation_produit')]
    public function index(ManagerRegistry $doctrine, Request $request, PaginatorInterface $paginator,int $idSignal): Response
    {
        
        $search = new SearchCodex;
        $form = $this->createForm(SearchCodexType::class, $search);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('recherche')->isClicked()) {
                // si on a cliqué sur le bouton de recherche 
                $RqCodex = new RequetesCodex($doctrine);
                $ListeProduits = $RqCodex->donneProduit_SearchCodex($search);
                $NbProduits = count($ListeProduits);
            } else if ($form->get('reset')->isClicked()) {
                // si on a cliqué sur le bouton reset 
                $RqCodex = new RequetesCodex($doctrine);
                $ListeProduits = $RqCodex->donneProduit_SearchCodex($search);
                $NbProduits = count($ListeProduits);
            } else {
                dd('je sais pas quoi faire');
            }
            
        } elseif ($form->isSubmitted() && $form->isValid() == false) {
            // Si on a cliqué sur un des boutons du paginator (le formulaire est alors "isSubmitted()" mais pas "isValid()")
            $RqCodex = new RequetesCodex($doctrine);
            $ListeProduits = $RqCodex->donneProduit_SearchCodex($search);
            $NbProduits = count($ListeProduits);

        } else {
            // Affichage de tous les susars par defaut :
            $RqCodex = new RequetesCodex($doctrine);
            $ListeProduits = $RqCodex->donneProduit_SearchCodex($search);
            $NbProduits = count($ListeProduits);
        }
        $LstProduits = $paginator->paginate(
            $ListeProduits, 
            $request->query->getInt('page', 1),
            15
        );
            
        if (!isset($NbProduits)) {
            $NbProduits = 0;
        }
        if (!isset($LstProduits)) {
            $LstProduits = [];
        }
        
        return $this->render('creation_produit/recherche.html.twig', [
            'LstProduits' => $LstProduits,
            'form' => $form->createView(),
            'NbProduits' => $NbProduits,
            'idSignal' => $idSignal,
        ]);
    }

    #[Route('/creation_produit/saisie/{idSignal}/{codeVU}', name: 'app_creation_produit_saisie')]
    public function saisie(ManagerRegistry $doctrine, Request $request, PaginatorInterface $paginator, EntityManagerInterface $em, int $idSignal, int $codeVU): Response
    {

        $RqCodex = new RequetesCodex($doctrine);
        $produit = $RqCodex->donneProduit_parCodeVU($codeVU);
        $signal = $em->getRepository(SignalANSM::class)->findOneById($idSignal);
        $produit->setProduitSignal($signal);
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $em->persist($produit);
            $em->flush();
            // return $this->redirectToRoute('affiche_signal'); 
            return $this->redirectToRoute('recherche_signal');
        }

        return $this->render('creation_produit/saisie.html.twig', [
            'form' => $form->createView(),
            'idSignal' => $idSignal,
            'codeVU' => $codeVU,
        ]);
    }


}
