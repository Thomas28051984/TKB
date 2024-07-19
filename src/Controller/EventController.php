<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/calendar", name="calendar")
     */
    public function index(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findAll();

        $eventsArray = array_map(function($event) {
            return [
                'title' => $event->getTitle(),
                'start' => $event->getStart()->format('Y-m-d\TH:i:s'),
                'end' => $event->getEnd() ? $event->getEnd()->format('Y-m-d\TH:i:s') : null,
            ];
        }, $events);

        // Ajout de logs pour vérifier les événements
        error_log(print_r($eventsArray, true));

        return $this->render('calendar/index.html.twig', [
            'events' => json_encode($eventsArray),
        ]);
    }

    /**
     * @Route("/event/new", name="event_new")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $event = new Event();

        if ($request->query->has('start')) {
            $event->setStart(new \DateTime($request->query->get('start')));
        }
        if ($request->query->has('end')) {
            $event->setEnd($request->query->get('end') ? new \DateTime($request->query->get('end')) : null);
        }

        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($event->getStart() === null) {
                $this->addFlash('error', 'La date de début ne peut pas être nulle.');
                return $this->redirectToRoute('event_new');
            }

            $entityManager->persist($event);
            $entityManager->flush();

            return $this->redirectToRoute('calendar');
        }

        return $this->render('event/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}