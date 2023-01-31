<?php

namespace App\Entity;

use App\Repository\JuegoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JuegoRepository::class)]
class Juego
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?int $ancho = null;

    #[ORM\Column]
    private ?int $largo = null;

    #[ORM\Column]
    private ?int $min_jugador = null;

    #[ORM\Column]
    private ?int $max_jugador = null;

    #[ORM\OneToMany(mappedBy: 'juego', targetEntity: reserva::class)]
    private Collection $reserva;

    #[ORM\ManyToMany(targetEntity: evento::class, inversedBy: 'juegos')]
    private Collection $evento;

    public function __construct()
    {
        $this->reserva = new ArrayCollection();
        $this->evento = new ArrayCollection();
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

    public function getAncho(): ?int
    {
        return $this->ancho;
    }

    public function setAncho(int $ancho): self
    {
        $this->ancho = $ancho;

        return $this;
    }

    public function getLargo(): ?int
    {
        return $this->largo;
    }

    public function setLargo(int $largo): self
    {
        $this->largo = $largo;

        return $this;
    }

    public function getMinJugador(): ?int
    {
        return $this->min_jugador;
    }

    public function setMinJugador(int $min_jugador): self
    {
        $this->min_jugador = $min_jugador;

        return $this;
    }

    public function getMaxJugador(): ?int
    {
        return $this->max_jugador;
    }

    public function setMaxJugador(int $max_jugador): self
    {
        $this->max_jugador = $max_jugador;

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
            $reserva->setJuego($this);
        }

        return $this;
    }

    public function removeReserva(reserva $reserva): self
    {
        if ($this->reserva->removeElement($reserva)) {
            // set the owning side to null (unless already changed)
            if ($reserva->getJuego() === $this) {
                $reserva->setJuego(null);
            }
        }

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
}
