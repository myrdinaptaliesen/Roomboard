<?php

namespace App\Controller;

use App\Repository\PlaceRepository;
use App\Repository\SalleRepository;
use App\Repository\CreneauRepository;
use App\Repository\FormationRepository;
use App\Repository\StagiaireRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(FormationRepository $formationRepository, SalleRepository $salleRepository, StagiaireRepository $stagiaireRepository, PlaceRepository $placeRepository, CreneauRepository $creneauRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'formations' => $formationRepository->findAll(),
            'salles' => $salleRepository->findAll(),
            'stagiaires' => $stagiaireRepository->findAll(),
            'places' => $placeRepository->findAll(),
            'creneaux' => $creneauRepository->findAll(),
        ]);
    }
}
