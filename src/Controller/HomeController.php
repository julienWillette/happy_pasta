<?php

namespace App\Controller;

use App\Entity\Specialties;
use App\Repository\SpecialtiesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(SpecialtiesRepository $specialties): Response
    {

        $specialties = $this->getDoctrine()
        ->getRepository(Specialties::class)
        ->findAll();
        return $this->render('home/index.html.twig', [
            'specialties' => $specialties
        ]);
    }
}
