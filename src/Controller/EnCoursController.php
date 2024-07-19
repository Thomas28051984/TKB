<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EnCoursController extends AbstractController
{
    #[Route('/en/cours', name: 'app_en_cours')]
    public function index(): Response
    {
        return $this->render('en_cours/index.html.twig', [
            'controller_name' => 'EnCoursController',
        ]);
    }
}
