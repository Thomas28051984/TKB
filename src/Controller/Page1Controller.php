<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Page1Controller extends AbstractController
{
    #[Route('/page1', name: 'app_page1')]
    public function index(): Response
    {
        return $this->render('page1/index.html.twig', [
            'controller_name' => 'Page1Controller',
        ]);
    }
}
