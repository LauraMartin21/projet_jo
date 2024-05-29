<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $offre_nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $offre_description = null;

    #[ORM\Column]
    private ?int $offre_nb_personne = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $offre_prix = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 2, scale: 0)]
    private ?string $offre_taux_TVA = null;

    #[ORM\Column]
    private ?int $offre_id_admin = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $offre_date_creation = null;

    #[ORM\Column(length: 255)]
    private ?string $offre_etat = null;

    #[ORM\Column]
    private ?int $offre_nb = null;

    /**
     * @var Collection<int, Personne>
     */
    #[ORM\OneToMany(targetEntity: Personne::class, mappedBy: 'relation')]
    private Collection $offre_relation;

    /**
     * @var Collection<int, panier>
     */
    #[ORM\OneToMany(targetEntity: panier::class, mappedBy: 'offre')]
    private Collection $offre_id;

    #[ORM\ManyToOne(inversedBy: 'pers_id_admin')]
    private ?Personne $personne = null;

    /**
     * @var Collection<int, reservation>
     */
    #[ORM\OneToMany(targetEntity: reservation::class, mappedBy: 'offre')]
    private Collection $offre_id_resa;

    public function __construct()
    {
        $this->offre_relation = new ArrayCollection();
        $this->offre_id = new ArrayCollection();
        $this->offre_id_resa = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffreNom(): ?string
    {
        return $this->offre_nom;
    }

    public function setOffreNom(string $offre_nom): static
    {
        $this->offre_nom = $offre_nom;

        return $this;
    }

    public function getOffreDescription(): ?string
    {
        return $this->offre_description;
    }

    public function setOffreDescription(string $offre_description): static
    {
        $this->offre_description = $offre_description;

        return $this;
    }

    public function getOffreNbPersonne(): ?int
    {
        return $this->offre_nb_personne;
    }

    public function setOffreNbPersonne(int $offre_nb_personne): static
    {
        $this->offre_nb_personne = $offre_nb_personne;

        return $this;
    }

    public function getOffrePrix(): ?string
    {
        return $this->offre_prix;
    }

    public function setOffrePrix(string $offre_prix): static
    {
        $this->offre_prix = $offre_prix;

        return $this;
    }

    public function getOffreTauxTVA(): ?string
    {
        return $this->offre_taux_TVA;
    }

    public function setOffreTauxTVA(string $offre_taux_TVA): static
    {
        $this->offre_taux_TVA = $offre_taux_TVA;

        return $this;
    }

    public function getOffreIdAdmin(): ?int
    {
        return $this->offre_id_admin;
    }

    public function setOffreIdAdmin(int $offre_id_admin): static
    {
        $this->offre_id_admin = $offre_id_admin;

        return $this;
    }

    public function getOffreDateCreation(): ?\DateTimeInterface
    {
        return $this->offre_date_creation;
    }

    public function setOffreDateCreation(\DateTimeInterface $offre_date_creation): static
    {
        $this->offre_date_creation = $offre_date_creation;

        return $this;
    }

    public function getOffreEtat(): ?string
    {
        return $this->offre_etat;
    }

    public function setOffreEtat(string $offre_etat): static
    {
        $this->offre_etat = $offre_etat;

        return $this;
    }

    public function getOffreNb(): ?int
    {
        return $this->offre_nb;
    }

    public function setOffreNb(int $offre_nb): static
    {
        $this->offre_nb = $offre_nb;

        return $this;
    }

    /**
     * @return Collection<int, Personne>
     */
    public function getOffreRelation(): Collection
    {
        return $this->offre_relation;
    }

    public function addOffreRelation(Personne $offreRelation): static
    {
        if (!$this->offre_relation->contains($offreRelation)) {
            $this->offre_relation->add($offreRelation);
            $offreRelation->setRelation($this);
        }

        return $this;
    }

    public function removeOffreRelation(Personne $offreRelation): static
    {
        if ($this->offre_relation->removeElement($offreRelation)) {
            // set the owning side to null (unless already changed)
            if ($offreRelation->getRelation() === $this) {
                $offreRelation->setRelation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, panier>
     */
    public function getOffreId(): Collection
    {
        return $this->offre_id;
    }

    public function addOffreId(panier $offreId): static
    {
        if (!$this->offre_id->contains($offreId)) {
            $this->offre_id->add($offreId);
            $offreId->setOffre($this);
        }

        return $this;
    }

    public function removeOffreId(panier $offreId): static
    {
        if ($this->offre_id->removeElement($offreId)) {
            // set the owning side to null (unless already changed)
            if ($offreId->getOffre() === $this) {
                $offreId->setOffre(null);
            }
        }

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

    /**
     * @return Collection<int, reservation>
     */
    public function getOffreIdResa(): Collection
    {
        return $this->offre_id_resa;
    }

    public function addOffreIdResa(reservation $offreIdResa): static
    {
        if (!$this->offre_id_resa->contains($offreIdResa)) {
            $this->offre_id_resa->add($offreIdResa);
            $offreIdResa->setOffre($this);
        }

        return $this;
    }

    public function removeOffreIdResa(reservation $offreIdResa): static
    {
        if ($this->offre_id_resa->removeElement($offreIdResa)) {
            // set the owning side to null (unless already changed)
            if ($offreIdResa->getOffre() === $this) {
                $offreIdResa->setOffre(null);
            }
        }

        return $this;
    }
}
