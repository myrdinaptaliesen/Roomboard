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
}
