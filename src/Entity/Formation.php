<?php

namespace App\Entity;

use App\Repository\FormationRepository;
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
}
