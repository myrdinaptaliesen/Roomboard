<?php

namespace App\Entity;

use App\Repository\CentreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CentreRepository::class)
 */
class Centre
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
    private $nomCentre;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="Centre")
     */
    private $formations;

    /**
     * @ORM\OneToMany(targetEntity=Salle::class, mappedBy="Centre")
     */
    private $salles;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="Centre")
     */
    private $utilisateurs;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
        $this->salles = new ArrayCollection();
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCentre(): ?string
    {
        return $this->nomCentre;
    }

    public function setNomCentre(string $nomCentre): self
    {
        $this->nomCentre = $nomCentre;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setCentre($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getCentre() === $this) {
                $formation->setCentre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Salle[]
     */
    public function getSalles(): Collection
    {
        return $this->salles;
    }

    public function addSalle(Salle $salle): self
    {
        if (!$this->salles->contains($salle)) {
            $this->salles[] = $salle;
            $salle->setCentre($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): self
    {
        if ($this->salles->removeElement($salle)) {
            // set the owning side to null (unless already changed)
            if ($salle->getCentre() === $this) {
                $salle->setCentre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setCentre($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getCentre() === $this) {
                $utilisateur->setCentre(null);
            }
        }

        return $this;
    }
}
