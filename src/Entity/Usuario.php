<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $correo = null;

    #[ORM\Column(length: 255)]
    private ?string $contrasenia = null;

    #[ORM\Column(length: 10)]
    private ?string $rol = null;

    #[ORM\ManyToMany(targetEntity: evento::class, inversedBy: 'usuarios')]
    private Collection $evento;

    #[ORM\OneToMany(mappedBy: 'usuario', targetEntity: reserva::class)]
    private Collection $reserva;

    public function __construct()
    {
        $this->evento = new ArrayCollection();
        $this->reserva = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getContrasenia(): ?string
    {
        return $this->contrasenia;
    }

    public function setContrasenia(string $contrasenia): self
    {
        $this->contrasenia = $contrasenia;

        return $this;
    }

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(string $rol): self
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * @return Collection<int, evento>
     */
    public function getEvento(): Collection
    {
        return $this->evento;
    }

    public function addEvento(evento $evento): self
    {
        if (!$this->evento->contains($evento)) {
            $this->evento->add($evento);
        }

        return $this;
    }

    public function removeEvento(evento $evento): self
    {
        $this->evento->removeElement($evento);

        return $this;
    }

    /**
     * @return Collection<int, reserva>
     */
    public function getReserva(): Collection
    {
        return $this->reserva;
    }

    public function addReserva(reserva $reserva): self
    {
        if (!$this->reserva->contains($reserva)) {
            $this->reserva->add($reserva);
            $reserva->setUsuario($this);
        }

        return $this;
    }

    public function removeReserva(reserva $reserva): self
    {
        if ($this->reserva->removeElement($reserva)) {
            // set the owning side to null (unless already changed)
            if ($reserva->getUsuario() === $this) {
                $reserva->setUsuario(null);
            }
        }

        return $this;
    }
}
