<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SavoirPlusController extends AbstractController
{
    #[Route('/savoir/plus', name: 'app_savoir_plus')]
    public function index(): Response
    {
        return $this->render('savoir_plus/index.html.twig', [
            'controller_name' => 'SavoirPlusController',
        ]);
    }
}
