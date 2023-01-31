<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Juego;

class JuegoController extends AbstractController
{
    #[Route('/juego', name: 'app_juego')]
    public function index(): Response
    {
        return $this->render('juego/index.html.twig', [
            'controller_name' => 'JuegoController',
        ]);
    }
}
