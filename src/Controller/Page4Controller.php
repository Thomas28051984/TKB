<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Page4Controller extends AbstractController
{
    #[Route('/page4', name: 'app_page4')]
    public function index(): Response
    {
        return $this->render('page4/index.html.twig', [
            'controller_name' => 'Page4Controller',
        ]);
    }
}
