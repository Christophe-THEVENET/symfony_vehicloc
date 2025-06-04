<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    /* ******************* INDEX ******************* */
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(CarRepository $repository): Response
    {
        $cars = $repository->findBy([], ['id' => 'DESC']);
        if (empty($cars)) {
            $this->addFlash('warning', 'No cars available at the moment.');
        }
        return $this->render('home/index.html.twig', [
            'cars' => $cars
        ]);
    }
    /* ******************* SHOW******************* */
    #[Route('/{id}', name: 'app_car_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(?Car $car): Response
    {
        return $this->render('home/car-show.html.twig', [
            'car' => $car,
        ]);
    }
    /* ******************* DELETE ******************* */
    #[Route('/delete/{id}', name: 'app_car_delete', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function remove(?Car $car, EntityManagerInterface $em): Response
    {
        if (!$car) {
            $this->addFlash('error', 'Pas de voiture.');
            return $this->redirectToRoute('app_home');
        }

        $em->remove($car);
        $em->flush();

        $this->addFlash('success', 'Voiture supprimée.');
        return $this->redirectToRoute('app_home');
    }

    // ***************************** NEW *********************************
    // ***************************** EDIT *********************************
    #[Route('/new', name: 'app_car_new', methods: ['GET', 'POST'])]
    #[Route('/edit/{id<\d+>}', name: 'app_car_edit', methods: ['GET', 'POST'])]
    public function new(?Car$car, Request $request, EntityManagerInterface $em): Response
    {

    
        $car ??= new Car();
        $form = $this->createForm(CarType::class, $car);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($car);
            $em->flush();

            return $this->redirectToRoute('app_car_show', ['id' => $car->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('home/car-new.html.twig', [
            'form' => $form,
        ]);
    }
}
