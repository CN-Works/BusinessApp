<?php

namespace App\Controller;

use App\Entity\Society;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SocietyController extends AbstractController
{
    #[Route('/society', name: 'app_society')]
    public function index(EntityManagerInterface $entityManager): Response
    {   
        $societies = $entityManager->getRepository(Society::class)->findAll();
        return $this->render('society/index.html.twig', [
            "societies" => $societies,
        ]);
    }
}
