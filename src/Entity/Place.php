<?php

namespace App\Entity;

use App\Entity\Salle;
use App\Entity\Creneau;
use App\Entity\Stagiaire;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=PlaceRepository::class)
 */
class Place
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomPlace;

    /**
     * @ORM\OneToMany(targetEntity=Stagiaire::class, mappedBy="Place")
     */
    private $stagiaires;

    /**
     * @ORM\OneToMany(targetEntity=Creneau::class, mappedBy="Place")
     */
    private $creneaus;

    /**
     * @ORM\ManyToOne(targetEntity=Salle::class, inversedBy="places")
     */
    private $Salle;

    public function __construct()
    {
        $this->stagiaires = new ArrayCollection();
        $this->creneaus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPlace(): ?string
    {
        return $this->nomPlace;
    }

    public function setNomPlace(string $nomPlace): self
    {
        $this->nomPlace = $nomPlace;

        return $this;
    }

    /**
     * @return Collection|Stagiaire[]
     */
    public function getStagiaires(): Collection
    {
        return $this->stagiaires;
    }

    public function addStagiaire(Stagiaire $stagiaire): self
    {
        if (!$this->stagiaires->contains($stagiaire)) {
            $this->stagiaires[] = $stagiaire;
            $stagiaire->setPlace($this);
        }

        return $this;
    }

    public function removeStagiaire(Stagiaire $stagiaire): self
    {
        if ($this->stagiaires->removeElement($stagiaire)) {
            // set the owning side to null (unless already changed)
            if ($stagiaire->getPlace() === $this) {
                $stagiaire->setPlace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Creneau[]
     */
    public function getCreneaus(): Collection
    {
        return $this->creneaus;
    }

    public function addCreneau(Creneau $creneau): self
    {
        if (!$this->creneaus->contains($creneau)) {
            $this->creneaus[] = $creneau;
            $creneau->setPlace($this);
        }

        return $this;
    }

    public function removeCreneau(Creneau $creneau): self
    {
        if ($this->creneaus->removeElement($creneau)) {
            // set the owning side to null (unless already changed)
            if ($creneau->getPlace() === $this) {
                $creneau->setPlace(null);
            }
        }

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->Salle;
    }

    public function setSalle(?Salle $Salle): self
    {
        $this->Salle = $Salle;

        return $this;
    }
}
