<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $pers_nom = null;

    #[ORM\Column(length: 100)]
    private ?string $pers_prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $pers_email = null;

    #[ORM\Column(length: 10)]
    private ?string $pers_tel = null;

    #[ORM\Column(length: 100)]
    private ?string $pers_nom_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $pers_mdp = null;

    #[ORM\Column]
    private ?bool $pers_client = null;

    #[ORM\Column]
    private ?bool $pers_admin = null;

    #[ORM\Column]
    private ?int $pers_numero_client = null;

    #[ORM\Column(length: 10)]
    private ?string $pers_cle = null;

    /**
     * @var Collection<int, panier>
     */
    #[ORM\OneToMany(targetEntity: panier::class, mappedBy: 'personne')]
    private Collection $pers_id;

    /**
     * @var Collection<int, offre>
     */
    #[ORM\OneToMany(targetEntity: offre::class, mappedBy: 'personne')]
    private Collection $pers_id_admin;

    /**
     * @var Collection<int, reservation>
     */
    #[ORM\OneToMany(targetEntity: reservation::class, mappedBy: 'personne')]
    private Collection $pers_id_resa;

    public function __construct()
    {
        $this->pers_id = new ArrayCollection();
        $this->pers_id_admin = new ArrayCollection();
        $this->pers_id_resa = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersNom(): ?string
    {
        return $this->pers_nom;
    }

    public function setPersNom(string $pers_nom): static
    {
        $this->pers_nom = $pers_nom;

        return $this;
    }

    public function getPersPrenom(): ?string
    {
        return $this->pers_prenom;
    }

    public function setPersPrenom(string $pers_prenom): static
    {
        $this->pers_prenom = $pers_prenom;

        return $this;
    }

    public function getPersEmail(): ?string
    {
        return $this->pers_email;
    }

    public function setPersEmail(string $pers_email): static
    {
        $this->pers_email = $pers_email;

        return $this;
    }

    public function getPersTel(): ?string
    {
        return $this->pers_tel;
    }

    public function setPersTel(string $pers_tel): static
    {
        $this->pers_tel = $pers_tel;

        return $this;
    }

    public function getPersNomUtilisateur(): ?string
    {
        return $this->pers_nom_utilisateur;
    }

    public function setPersNomUtilisateur(string $pers_nom_utilisateur): static
    {
        $this->pers_nom_utilisateur = $pers_nom_utilisateur;

        return $this;
    }

    public function getPersMdp(): ?string
    {
        return $this->pers_mdp;
    }

    public function setPersMdp(string $pers_mdp): static
    {
        $this->pers_mdp = $pers_mdp;

        return $this;
    }

    public function isPersClient(): ?bool
    {
        return $this->pers_client;
    }

    public function setPersClient(bool $pers_client): static
    {
        $this->pers_client = $pers_client;

        return $this;
    }

    public function isPersAdmin(): ?bool
    {
        return $this->pers_admin;
    }

    public function setPersAdmin(bool $pers_admin): static
    {
        $this->pers_admin = $pers_admin;

        return $this;
    }

    public function getPersNumeroClient(): ?int
    {
        return $this->pers_numero_client;
    }

    public function setPersNumeroClient(int $pers_numero_client): static
    {
        $this->pers_numero_client = $pers_numero_client;

        return $this;
    }

    public function getPersCle(): ?string
    {
        return $this->pers_cle;
    }

    public function setPersCle(string $pers_cle): static
    {
        $this->pers_cle = $pers_cle;

        return $this;
    }

    /**
     * @return Collection<int, panier>
     */
    public function getPersId(): Collection
    {
        return $this->pers_id;
    }

    public function addPersId(panier $persId): static
    {
        if (!$this->pers_id->contains($persId)) {
            $this->pers_id->add($persId);
            $persId->setPersonne($this);
        }

        return $this;
    }

    public function removePersId(panier $persId): static
    {
        if ($this->pers_id->removeElement($persId)) {
            // set the owning side to null (unless already changed)
            if ($persId->getPersonne() === $this) {
                $persId->setPersonne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, offre>
     */
    public function getPersIdAdmin(): Collection
    {
        return $this->pers_id_admin;
    }

    public function addPersIdAdmin(offre $persIdAdmin): static
    {
        if (!$this->pers_id_admin->contains($persIdAdmin)) {
            $this->pers_id_admin->add($persIdAdmin);
            $persIdAdmin->setPersonne($this);
        }

        return $this;
    }

    public function removePersIdAdmin(offre $persIdAdmin): static
    {
        if ($this->pers_id_admin->removeElement($persIdAdmin)) {
            // set the owning side to null (unless already changed)
            if ($persIdAdmin->getPersonne() === $this) {
                $persIdAdmin->setPersonne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, reservation>
     */
    public function getPersIdResa(): Collection
    {
        return $this->pers_id_resa;
    }

    public function addPersIdResa(reservation $persIdResa): static
    {
        if (!$this->pers_id_resa->contains($persIdResa)) {
            $this->pers_id_resa->add($persIdResa);
            $persIdResa->setPersonne($this);
        }

        return $this;
    }

    public function removePersIdResa(reservation $persIdResa): static
    {
        if ($this->pers_id_resa->removeElement($persIdResa)) {
            // set the owning side to null (unless already changed)
            if ($persIdResa->getPersonne() === $this) {
                $persIdResa->setPersonne(null);
            }
        }

        return $this;
    }

}
