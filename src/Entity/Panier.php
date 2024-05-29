<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $panier_date = null;

    #[ORM\ManyToOne(inversedBy: 'pers_id')]
    private ?Personne $personne = null;

    #[ORM\ManyToOne(inversedBy: 'offre_id')]
    private ?Offre $offre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPanierDate(): ?\DateTimeInterface
    {
        return $this->panier_date;
    }

    public function setPanierDate(\DateTimeInterface $panier_date): static
    {
        $this->panier_date = $panier_date;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): static
    {
        $this->personne = $personne;

        return $this;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): static
    {
        $this->offre = $offre;

        return $this;
    }

}
