<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\ORM\Mapping as ORM;

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
}
