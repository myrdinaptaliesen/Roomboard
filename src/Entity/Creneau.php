<?php

namespace App\Entity;

use App\Repository\CreneauRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreneauRepository::class)
 */
class Creneau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $debutCreneau;

    /**
     * @ORM\Column(type="datetime")
     */
    private $finCreneau;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="creneaux")
     */
    private $Formation;

    /**
     * @ORM\ManyToOne(targetEntity=Place::class, inversedBy="creneaus")
     */
    private $Place;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDebutCreneau(): ?\DateTimeInterface
    {
        return $this->debutCreneau;
    }

    public function setDebutCreneau(\DateTimeInterface $debutCreneau): self
    {
        $this->debutCreneau = $debutCreneau;

        return $this;
    }

    public function getFinCreneau(): ?\DateTimeInterface
    {
        return $this->finCreneau;
    }

    public function setFinCreneau(\DateTimeInterface $finCreneau): self
    {
        $this->finCreneau = $finCreneau;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->Formation;
    }

    public function setFormation(?Formation $Formation): self
    {
        $this->Formation = $Formation;

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->Place;
    }

    public function setPlace(?Place $Place): self
    {
        $this->Place = $Place;

        return $this;
    }
}
