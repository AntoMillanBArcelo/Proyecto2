<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Mesa;

class mesaAdminController extends AbstractController
{
    #[Route('/mesaAdmin', name: 'app_mesa')]
    public function index(): Response
    {
        return $this->render('mesaAdmin/mesaAdmin.html.twig', [
            'controller_name' => 'mesaAdminController',
           ]);
    }
}