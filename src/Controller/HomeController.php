<?php

namespace App\Controller;

use App\Entity\Creneau;
use App\Form\CreneauType;
use App\Form\NouveauCreneauType;
use App\Repository\PlaceRepository;
use App\Repository\SalleRepository;
use App\Repository\CreneauRepository;
use App\Repository\FormationRepository;
use App\Repository\StagiaireRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET","POST"})
     */
    public function index(FormationRepository $formationRepository, SalleRepository $salleRepository, StagiaireRepository $stagiaireRepository, PlaceRepository $placeRepository, CreneauRepository $creneauRepository,Request $request): Response
    {
        $creneau = new Creneau();
        $form = $this->createForm(NouveauCreneauType::class, $creneau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($creneau);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'formations' => $formationRepository->findAll(),
            'salles' => $salleRepository->findAll(),
            'stagiaires' => $stagiaireRepository->findAll(),
            'places' => $placeRepository->findAll(),
            'creneaux' => $creneauRepository->findAll(),
            'creneau' => $creneau,
            'form' => $form->createView(),
        ]);
    }

    /**
    * @Route("creneau/{id}/nouveau", name="nouveau-creneau", methods={"GET","POST"})) 
    */
    // public function nouveauCreneau(Request $request): Response
    // {
    //     $creneau = new Creneau();
    //     $form = $this->createForm(CreneauType::class, $creneau);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($creneau);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('home');
    //     }

    //     return $this->render('home/index.html.twig', [
    //         'creneau' => $creneau,
    //         'form' => $form->createView(),
    //     ]);
    // }
}
