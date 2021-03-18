<?php

namespace App\Controller;

use App\Entity\Story;
use App\Entity\Creations;
use App\Entity\Specialties;
use App\Repository\StoryRepository;
use App\Repository\CreationsRepository;
use App\Repository\SpecialtiesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(SpecialtiesRepository $specialties, CreationsRepository $creations, StoryRepository $story): Response
    {

        $specialties = $this->getDoctrine()
        ->getRepository(Specialties::class)
        ->findAll();
        $creations = $this->getDoctrine()
        ->getRepository(Creations::class)
        ->findAll();
        $story = $this->getDoctrine()
        ->getRepository(Story::class)
        ->findAll();
        return $this->render('home/index.html.twig', [
            'specialties' => $specialties,
            'creations' => $creations,
            'story' => $story
        ]);
    }
}
