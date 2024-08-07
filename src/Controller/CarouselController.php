<?php

namespace App\Controller;

use App\Repository\DossierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarouselController extends AbstractController
{
    #[Route('/carousel', name: 'app_carousel')]
     
    public function index(DossierRepository $dossierRepository): Response
    {
        $dossiers = $dossierRepository->findAll();

        return $this->render('carousel/index.html.twig', [
            'dossiers' => $dossiers,
        ]);
    }
}