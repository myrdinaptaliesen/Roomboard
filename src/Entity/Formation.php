<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
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
    private $intituleFormation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbStagiaires;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $debutFormation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $finFormation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleurFormation;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="formations")
     */
    private $Type;

    /**
     * @ORM\ManyToOne(targetEntity=Centre::class, inversedBy="formations")
     */
    private $Centre;

    /**
     * @ORM\OneToMany(targetEntity=Stagiaire::class, mappedBy="Formation")
     */
    private $stagiaires;

    /**
     * @ORM\OneToMany(targetEntity=Creneau::class, mappedBy="Formation")
     */
    private $creneaux;

    public function __construct()
    {
        $this->stagiaires = new ArrayCollection();
        $this->creneaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntituleFormation(): ?string
    {
        return $this->intituleFormation;
    }

    public function setIntituleFormation(string $intituleFormation): self
    {
        $this->intituleFormation = $intituleFormation;

        return $this;
    }

    public function getNbStagiaires(): ?int
    {
        return $this->nbStagiaires;
    }

    public function setNbStagiaires(?int $nbStagiaires): self
    {
        $this->nbStagiaires = $nbStagiaires;

        return $this;
    }

    public function getDebutFormation(): ?\DateTimeInterface
    {
        return $this->debutFormation;
    }

    public function setDebutFormation(?\DateTimeInterface $debutFormation): self
    {
        $this->debutFormation = $debutFormation;

        return $this;
    }

    public function getFinFormation(): ?\DateTimeInterface
    {
        return $this->finFormation;
    }

    public function setFinFormation(?\DateTimeInterface $finFormation): self
    {
        $this->finFormation = $finFormation;

        return $this;
    }

    public function getCouleurFormation(): ?string
    {
        return $this->couleurFormation;
    }

    public function setCouleurFormation(?string $couleurFormation): self
    {
        $this->couleurFormation = $couleurFormation;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->Type;
    }

    public function setType(?Type $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getCentre(): ?Centre
    {
        return $this->Centre;
    }

    public function setCentre(?Centre $Centre): self
    {
        $this->Centre = $Centre;

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
            $stagiaire->setFormation($this);
        }

        return $this;
    }

    public function removeStagiaire(Stagiaire $stagiaire): self
    {
        if ($this->stagiaires->removeElement($stagiaire)) {
            // set the owning side to null (unless already changed)
            if ($stagiaire->getFormation() === $this) {
                $stagiaire->setFormation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Creneau[]
     */
    public function getCreneaux(): Collection
    {
        return $this->creneaux;
    }

    public function addCreneaux(Creneau $creneaux): self
    {
        if (!$this->creneaux->contains($creneaux)) {
            $this->creneaux[] = $creneaux;
            $creneaux->setFormation($this);
        }

        return $this;
    }

    public function removeCreneaux(Creneau $creneaux): self
    {
        if ($this->creneaux->removeElement($creneaux)) {
            // set the owning side to null (unless already changed)
            if ($creneaux->getFormation() === $this) {
                $creneaux->setFormation(null);
            }
        }

        return $this;
    }
}
