<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $resa_somme = null;

    #[ORM\Column(length: 255)]
    private ?string $resa_etat = null;

    #[ORM\Column]
    private ?int $resa_numero = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $resa_date_paiement = null;

    #[ORM\Column(length: 10)]
    private ?string $resa_cle = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $resa_date_scan = null;

    #[ORM\Column(length: 100)]
    private ?string $resa_offre_nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $resa_offre_description = null;

    #[ORM\Column]
    private ?int $resa_offre_nb_personne = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $resa_offre_prix = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 2, scale: 0)]
    private ?string $resa_offre_taux_TVA = null;

    #[ORM\ManyToOne(inversedBy: 'pers_id_resa')]
    private ?Personne $personne = null;

    #[ORM\ManyToOne(inversedBy: 'offre_id_resa')]
    private ?Offre $offre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResaSomme(): ?string
    {
        return $this->resa_somme;
    }

    public function setResaSomme(string $resa_somme): static
    {
        $this->resa_somme = $resa_somme;

        return $this;
    }

    public function getResaEtat(): ?string
    {
        return $this->resa_etat;
    }

    public function setResaEtat(string $resa_etat): static
    {
        $this->resa_etat = $resa_etat;

        return $this;
    }

    public function getResaNumero(): ?int
    {
        return $this->resa_numero;
    }

    public function setResaNumero(int $resa_numero): static
    {
        $this->resa_numero = $resa_numero;

        return $this;
    }

    public function getResaDatePaiement(): ?\DateTimeInterface
    {
        return $this->resa_date_paiement;
    }

    public function setResaDatePaiement(\DateTimeInterface $resa_date_paiement): static
    {
        $this->resa_date_paiement = $resa_date_paiement;

        return $this;
    }

    public function getResaCle(): ?string
    {
        return $this->resa_cle;
    }

    public function setResaCle(string $resa_cle): static
    {
        $this->resa_cle = $resa_cle;

        return $this;
    }

    public function getResaDateScan(): ?\DateTimeInterface
    {
        return $this->resa_date_scan;
    }

    public function setResaDateScan(\DateTimeInterface $resa_date_scan): static
    {
        $this->resa_date_scan = $resa_date_scan;

        return $this;
    }

    public function getResaOffreNom(): ?string
    {
        return $this->resa_offre_nom;
    }

    public function setResaOffreNom(string $resa_offre_nom): static
    {
        $this->resa_offre_nom = $resa_offre_nom;

        return $this;
    }

    public function getResaOffreDescription(): ?string
    {
        return $this->resa_offre_description;
    }

    public function setResaOffreDescription(string $resa_offre_description): static
    {
        $this->resa_offre_description = $resa_offre_description;

        return $this;
    }

    public function getResaOffreNbPersonne(): ?int
    {
        return $this->resa_offre_nb_personne;
    }

    public function setResaOffreNbPersonne(int $resa_offre_nb_personne): static
    {
        $this->resa_offre_nb_personne = $resa_offre_nb_personne;

        return $this;
    }

    public function getResaOffrePrix(): ?string
    {
        return $this->resa_offre_prix;
    }

    public function setResaOffrePrix(string $resa_offre_prix): static
    {
        $this->resa_offre_prix = $resa_offre_prix;

        return $this;
    }

    public function getResaOffreTauxTVA(): ?string
    {
        return $this->resa_offre_taux_TVA;
    }

    public function setResaOffreTauxTVA(string $resa_offre_taux_TVA): static
    {
        $this->resa_offre_taux_TVA = $resa_offre_taux_TVA;

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
