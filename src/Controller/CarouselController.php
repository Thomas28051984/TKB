<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarouselController extends AbstractController
{
    #[Route('/album', name: 'album')]
    public function index(): Response
    {
        return $this->render('carousel/index.html.twig');
    }

    #[Route('/album/photos/{folder}', name: 'photos_by_folder')]
    public function getPhotosByFolder(string $folder): JsonResponse
    {
        $baseDir = $this->getParameter('kernel.project_dir') . '/public/images/' . $folder;
        $photos = [];

        if (is_dir($baseDir)) {
            foreach (scandir($baseDir) as $file) {
                if ($file !== '.' && $file !== '..') {
                    $photos[] = '/images/' . $folder . '/' . $file;
                }
            }
        }

        return new JsonResponse($photos);
    }

    #[Route('/album/default-photos', name: 'default_photos')]
    public function getDefaultPhotos(): JsonResponse
    {
        $folder = 'Naïs';  // Nom du dossier par défaut
        return $this->getPhotosByFolder($folder);
    }
}
