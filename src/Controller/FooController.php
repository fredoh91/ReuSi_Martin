<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Foo;
use App\Form\FooType;
use App\Repository\FooRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/foo', name: 'foo')]
class FooController extends AbstractController
{
    // #[Route('/', name: 'foo_list')]
    #[Route('/', name: '_list')]
    public function index(FooRepository $fooRepository): Response
    {
        return $this->render('foo/index.html.twig', [
            "foos" => $fooRepository->findAll()
        ]);
    }

    // #[Route('/{id}/update', name: 'foo_update')]
    #[Route('/{id}/update', name: '_update')]
    public function update(Request $request, Foo $foo): Response
    {
        $form = $this->createForm(FooType::class, $foo)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute("foo_list");
        }

        return $this->render('foo/update.html.twig', [
            "form" => $form->createView()
        ]);
    }

    // #[Route('/create', name: 'foo_create')]
    #[Route('/create', name: '_create')]
    public function create(ManagerRegistry $doctrine,Request $request): Response
    {
        $foo = new Foo();
        $form = $this->createForm(FooType::class, $foo)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            // $this->getDoctrine()->getManager()->persist($foo);
            // $this->getDoctrine()->getManager()->flush();



            $entityManager = $doctrine->getManager();
            $entityManager->persist($foo);
            $entityManager->flush();


            return $this->redirectToRoute("foo_list");
        }

        return $this->render('foo/create.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
