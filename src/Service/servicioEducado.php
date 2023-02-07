<?php
// src/Service/servicioEducado.php
namespace App\Service;

class servicioEducado
{
    public function saludoCordial(): string
    {
       

        return 'Hola buenos días, ¿Quieres un ochio?';
    }

    /**
     * @Route("/servicio", name="servicio")
     */
    public function new(saludoCordial $saludoCordial): Response
    {
        $mensaje = $saludoCordial->saludoCordial();
        
    }
}