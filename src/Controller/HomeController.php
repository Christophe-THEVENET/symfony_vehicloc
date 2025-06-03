<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(CarRepository $repository): Response
    {
        $cars = $repository->findAll();
        if (empty($cars)) {
            $this->addFlash('warning', 'No cars available at the moment.');
        }
        return $this->render('home/index.html.twig', [
            'cars' => $cars
        ]);
    }

    #[Route('/{id}', name: 'app_car_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(?Car $car): Response
    {
        return $this->render('home/car-show.html.twig', [
            'car' => $car,
        ]);
    }
}
