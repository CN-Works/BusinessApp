<?php

namespace App\Controller;

use App\Entity\Society;
use App\Form\SocietyType;
use App\Repository\SocietyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SocietyController extends AbstractController
{
    #[Route('/society', name: 'app_society')]
    public function index(SocietyRepository $societyRepository): Response
    {   
        // getting all societies from SocietyRepository
        $societies = $societyRepository->findBy([],["label" => "ASC"]);
        return $this->render('society/index.html.twig', [
            "societies" => $societies,
        ]);
    }

    #[Route('/society/new', name: 'new_society')]
    #[Route('/society/{id}/edit', name: 'edit_society')]
    public function new_edit(Society $society = null,Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$society) {
            $society = new Society;
        }

        $form = $this->createForm(SocietyType::class, $society );

        $form->handleRequest($request);

        // Checks if form inputs are in a valid type
        if ($form->isSubmitted() && $form->isValid()) {

            // Affecting the form data into the object
            $society = $form->getData();

            // Preparing society object
            $entityManager->persist($society);
            // Saving in db
            $entityManager->flush();

            // Redirection to all societies
            return $this->redirectToRoute("app_society");
        }

        return $this->render('society/new.html.twig', [
            'formAddSociety' => $form,
        ]);
    }

    #[Route('/society/{id}', name: 'show_society')]
    public function showSociety(Society $society): Response {
        // Getting the wanted society object by using id and and ParamConverter
        // Same concept as "findOneById"
        return $this->render('society/show_society.html.twig', [
            "society" => $society,
        ]);
    }
}
