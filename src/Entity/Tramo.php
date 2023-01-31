<?php

namespace App\Entity;

use App\Repository\TramoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TramoRepository::class)]
class Tramo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $f_inicio = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $f_fin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFInicio(): ?\DateTimeInterface
    {
        return $this->f_inicio;
    }

    public function setFInicio(\DateTimeInterface $f_inicio): self
    {
        $this->f_inicio = $f_inicio;

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
}
