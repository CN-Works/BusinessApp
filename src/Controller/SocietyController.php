<?php

namespace App\Controller;

use App\Entity\Society;
use App\Repository\SocietyRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    #[Route('/society/{id}', name: 'show_society')]
    public function showSociety(Society $society): Response {
        // Getting the wanted society object by using id and and ParamConverter
        // Same concept as "findOneById"
        return $this->render('society/show_society.html.twig', [
            "society" => $society,
        ]);
    }
}
