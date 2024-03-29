<?php

namespace App\Controller;

use App\Repository\MenuRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'app_menu')]
    public function index(MenuRepository $menuRepository, RestaurantRepository $restaurantRepository): Response
    {
        return $this->render('menu/index.html.twig', [
            'menus' => $menuRepository->findBy(['available' => true]),
            'Restaurant' => $restaurantRepository->findAll(),
        ]);
    }
}
