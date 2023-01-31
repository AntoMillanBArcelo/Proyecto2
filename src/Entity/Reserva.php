<?php

namespace App\Entity;

use App\Repository\ReservaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservaRepository::class)]
class Reserva
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $f_ini = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $f_fin = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $f_cancelacion = null;

    #[ORM\ManyToOne(inversedBy: 'reserva')]
    private ?Juego $juego = null;

    #[ORM\ManyToOne(inversedBy: 'reserva')]
    private ?Usuario $usuario = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFIni(): ?\DateTimeInterface
    {
        return $this->f_ini;
    }

    public function setFIni(\DateTimeInterface $f_ini): self
    {
        $this->f_ini = $f_ini;

        return $this;
    }

    public function getFFin(): ?\DateTimeInterface
    {
        return $this->f_fin;
    }

    public function setFFin(\DateTimeInterface $f_fin): self
    {
        $this->f_fin = $f_fin;

        return $this;
    }

    public function getFCancelacion(): ?\DateTimeInterface
    {
        return $this->f_cancelacion;
    }

    public function setFCancelacion(\DateTimeInterface $f_cancelacion): self
    {
        $this->f_cancelacion = $f_cancelacion;

        return $this;
    }

    public function getJuego(): ?Juego
    {
        return $this->juego;
    }

    public function setJuego(?Juego $juego): self
    {
        $this->juego = $juego;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
}
