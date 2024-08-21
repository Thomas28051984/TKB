<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Finder\Finder;

class CarouselController extends AbstractController
{
    #[Route('/carousel', name: 'app_carousel')]
    public function index(Request $request): Response
    {
        $imageDirectories = ['Cequevoitfox', 'Conversation', 'Delirium', 'Festivaloffavignon', 'Huitfemmes', 'Jeuxdecannes', 'Lagrandemuraille', 'Lespalmes', 'Lesrats', 'Mastication', 'Naïs', 'Perenoelordure', 'Soudainletedernier', 'Uncoindazur', 'Uneheure', 'Compromis' ]; // Liste des dossiers disponibles
        $selectedDirectory = $request->query->get('directory', $imageDirectories[0]);

        if (!in_array($selectedDirectory, $imageDirectories)) {
            throw $this->createNotFoundException('Le dossier sélectionné n\'existe pas.');
        }

        $images = [];
        $finder = new Finder();
        $finder->files()->in($this->getParameter('kernel.project_dir') . '/public/images/' . $selectedDirectory);

        foreach ($finder as $file) {
            $images[] = 'images/' . $selectedDirectory . '/' . $file->getFilename();
        }

        return $this->render('carousel/index.html.twig', [
            'images' => $images,
            'directories' => $imageDirectories,
            'selectedDirectory' => $selectedDirectory,
        ]);
    }
}
