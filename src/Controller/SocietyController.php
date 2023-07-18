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
        $societies = $societyRepository->findAll();
        return $this->render('society/index.html.twig', [
            "societies" => $societies,
        ]);
    }
}
