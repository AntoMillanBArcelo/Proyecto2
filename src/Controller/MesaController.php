<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Mesa;

/**
 * @Route("/api", name="api_")
 */
class MesaController extends AbstractController
{
    #[Route('/mesa2', name: 'app_mesa')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MesaController.php',
        ]);
    }

    /**
    * @Route("/mesa", name="project_index", methods={"GET"})
    */
    public function select(ManagerRegistry $doctrine): Response
    {
        $mesa = $doctrine
            ->getRepository(Mesa::class)
            ->findAll();
  
        $data = [];
  
        foreach ($mesa as $mesaObj) {
           $data[] = [
               'id' => $mesaObj->getId(),
               'ancho' => $mesaObj->getAncho(),
               'largo' => $mesaObj->getAncho(),
               'x' => $mesaObj->getX(),
               'y' => $mesaObj->getY(),
           ];
        }
  
        return $this->json($data);
    }

    /**
     * @Route("/mesa", name="project_new", methods={"POST"})
     */
    public function new(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
  
        $mesa = new Mesa();
        $mesa->setAncho($request->request->get('ancho'));
        $mesa->setLargo($request->request->get('largo'));
        $mesa->setX($request->request->get('x'));
        $mesa->setY($request->request->get('y'));

  
        $entityManager->persist($mesa);
        $entityManager->flush();
  
        return $this->json('Creada una nueva mesa de manera exitosa con id ' . $mesa->getId());
    }

    /**
     * @Route("/mesa/{id}", name="project_show", methods={"GET"})
     */
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $mesa = $doctrine->getRepository(Mesa::class)->find($id);
  
        if (!$mesa) {
  
            return $this->json('No se ha encontrado ninguna mesa con la id' . $id, 404);
        }
  
        $data =  [
            'id' => $mesa->getId(),
            'ancho' => $mesa->getAncho(),
            'largo' => $mesa->getLargo(),
            'x' => $mesa->getX(),
            'y' => $mesa->getY(),
        ];
          
        return $this->json($data);
    }

    /**
     * @Route("/mesa/{id}", name="project_edit", methods={"PUT"})
     */
    public function edit(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $mesa = $entityManager->getRepository(Mesa::class)->find($id);
  
        if (!$mesa) {
            return $this->json('No se ha encontrado ninguna mesa con la id' . $id, 404);
        }
  
        $mesa->setAncho($request->request->get('ancho'));
        $mesa->setLargo($request->request->get('largo'));
        $mesa->setX($request->request->get('x'));
        $mesa->setY($request->request->get('y'));
        $entityManager->flush();
  
        $data =  [
            'id' => $mesa->getId(),
            'ancho' => $mesa->getAncho(),
            'largo' => $mesa->getLargo(),
            'x' => $mesa->getX(),
            'y' => $mesa->getY(),
        ];
          
        return $this->json($data);
    }

    /**
     * @Route("/mesa/{id}", name="project_delete", methods={"DELETE"})
     */
    public function delete(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $mesa = $entityManager->getRepository(Mesa::class)->find($id);
  
        if (!$mesa) {
            return $this->json('No se ha encontrado ninguna mesa con la id' . $id, 404);
        }
  
        $entityManager->remove($mesa);
        $entityManager->flush();
  
        return $this->json('Se ha borrado con exito la mesa con id ' . $id);
    }
}
