<?php

namespace App\Entity;

use App\Repository\SignalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: '`signal`')]
#[ORM\Entity(repositoryClass: SignalRepository::class)]
class Signal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $DateCreation;

    #[ORM\Column(type: 'text', nullable: true)]
    private $Description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Indication;

    #[ORM\Column(type: 'text', nullable: true)]
    private $Contexte;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $NiveauRisqueInitial;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $NiveauRisqueFinal;

    #[ORM\Column(type: 'text', nullable: true)]
    private $AnaRisqueComment;

    #[ORM\Column(type: 'text', nullable: true)]
    private $ProposReducRisque;

    #[ORM\ManyToOne(targetEntity: SourceSignal::class, inversedBy: 'signals')]
    private $SourceSignal;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $RefSignal;

    #[ORM\ManyToOne(targetEntity: PoleDS::class, inversedBy: 'signals')]
    private $PoleDS;

    #[ORM\ManyToOne(targetEntity: DMM::class, inversedBy: 'signals')]
    private $DMM;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $IdentifiantSource;

    #[ORM\ManyToOne(targetEntity: PiloteDS::class, inversedBy: 'signals')]
    private $PiloteDS;

    #[ORM\ManyToOne(targetEntity: CoPiloteDS::class, inversedBy: 'signals')]
    private $CoPiloteDS;

    #[ORM\ManyToOne(targetEntity: StatutSignal::class, inversedBy: 'signals')]
    private $StatutSignal;

    #[ORM\ManyToOne(targetEntity: StatutEmetteur::class, inversedBy: 'signals')]
    private $StatutEmetteur;

    #[ORM\OneToMany(targetEntity: Suivi::class, mappedBy: 'SuiviSignal')]
    private $suivis;

    // #[ORM\OneToMany(targetEntity: ReleveDecision::class, mappedBy: 'ReleveDecisionSignal')]
    // private $releveDecisions;

    #[ORM\OneToMany(targetEntity: Produit::class, mappedBy: 'ProduitSignal')]
    private $produits;

    public function __construct()
    {
        $this->suivis = new ArrayCollection();
        $this->releveDecisions = new ArrayCollection();
        $this->produits = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeInterface $DateCreation): self
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getIndication(): ?string
    {
        return $this->Indication;
    }

    public function setIndication(?string $Indication): self
    {
        $this->Indication = $Indication;

        return $this;
    }

    public function getContexte(): ?string
    {
        return $this->Contexte;
    }

    public function setContexte(?string $Contexte): self
    {
        $this->Contexte = $Contexte;

        return $this;
    }

    public function getNiveauRisqueInitial(): ?string
    {
        return $this->NiveauRisqueInitial;
    }

    public function setNiveauRisqueInitial(?string $NiveauRisqueInitial): self
    {
        $this->NiveauRisqueInitial = $NiveauRisqueInitial;

        return $this;
    }

    public function getNiveauRisqueFinal(): ?string
    {
        return $this->NiveauRisqueFinal;
    }

    public function setNiveauRisqueFinal(?string $NiveauRisqueFinal): self
    {
        $this->NiveauRisqueFinal = $NiveauRisqueFinal;

        return $this;
    }

    public function getAnaRisqueComment(): ?string
    {
        return $this->AnaRisqueComment;
    }

    public function setAnaRisqueComment(?string $AnaRisqueComment): self
    {
        $this->AnaRisqueComment = $AnaRisqueComment;

        return $this;
    }

    public function getProposReducRisque(): ?string
    {
        return $this->ProposReducRisque;
    }

    public function setProposReducRisque(?string $ProposReducRisque): self
    {
        $this->ProposReducRisque = $ProposReducRisque;

        return $this;
    }

    public function getSourceSignal(): ?SourceSignal
    {
        return $this->SourceSignal;
    }

    public function setSourceSignal(?SourceSignal $SourceSignal): self
    {
        $this->SourceSignal = $SourceSignal;

        return $this;
    }

    public function getRefSignal(): ?string
    {
        return $this->RefSignal;
    }

    public function setRefSignal(?string $RefSignal): self
    {
        $this->RefSignal = $RefSignal;

        return $this;
    }

    public function getPoleDS(): ?PoleDS
    {
        return $this->PoleDS;
    }

    public function setPoleDS(?PoleDS $PoleDS): self
    {
        $this->PoleDS = $PoleDS;

        return $this;
    }

    public function getDMM(): ?DMM
    {
        return $this->DMM;
    }

    public function setDMM(?DMM $DMM): self
    {
        $this->DMM = $DMM;

        return $this;
    }

    public function getIdentifiantSource(): ?string
    {
        return $this->IdentifiantSource;
    }

    public function setIdentifiantSource(?string $IdentifiantSource): self
    {
        $this->IdentifiantSource = $IdentifiantSource;

        return $this;
    }

    public function getPiloteDS(): ?PiloteDS
    {
        return $this->PiloteDS;
    }

    public function setPiloteDS(?PiloteDS $PiloteDS): self
    {
        $this->PiloteDS = $PiloteDS;

        return $this;
    }

    public function getCoPiloteDS(): ?CoPiloteDS
    {
        return $this->CoPiloteDS;
    }

    public function setCoPiloteDS(?CoPiloteDS $CoPiloteDS): self
    {
        $this->CoPiloteDS = $CoPiloteDS;

        return $this;
    }

    public function getStatutSignal(): ?StatutSignal
    {
        return $this->StatutSignal;
    }

    public function setStatutSignal(?StatutSignal $StatutSignal): self
    {
        $this->StatutSignal = $StatutSignal;

        return $this;
    }

    public function getStatutEmetteur(): ?StatutEmetteur
    {
        return $this->StatutEmetteur;
    }

    public function setStatutEmetteur(?StatutEmetteur $StatutEmetteur): self
    {
        $this->StatutEmetteur = $StatutEmetteur;

        return $this;
    }

    /**
     * @return Collection|Suivi[]
     */
    public function getSuivis(): Collection
    {
        return $this->suivis;
    }

    public function addSuivi(Suivi $suivi): self
    {
        if (!$this->suivis->contains($suivi)) {
            $this->suivis[] = $suivi;
            $suivi->setSuiviSignal($this);
        }

        return $this;
    }

    public function removeSuivi(Suivi $suivi): self
    {
        if ($this->suivis->removeElement($suivi)) {
            // set the owning side to null (unless already changed)
            if ($suivi->getSuiviSignal() === $this) {
                $suivi->setSuiviSignal(null);
            }
        }

        return $this;
    }

    // /**
    //  * @return Collection|ReleveDecision[]
    //  */
    // public function getReleveDecisions(): Collection
    // {
    //     return $this->releveDecisions;
    // }

    // public function addReleveDecision(ReleveDecision $releveDecision): self
    // {
    //     if (!$this->releveDecisions->contains($releveDecision)) {
    //         $this->releveDecisions[] = $releveDecision;
    //         $releveDecision->setReleveDecisionSignal($this);
    //     }

    //     return $this;
    // }

    // public function removeReleveDecision(ReleveDecision $releveDecision): self
    // {
    //     if ($this->releveDecisions->removeElement($releveDecision)) {
    //         // set the owning side to null (unless already changed)
    //         if ($releveDecision->getReleveDecisionSignal() === $this) {
    //             $releveDecision->setReleveDecisionSignal(null);
    //         }
    //     }

    //     return $this;
    // }

    /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setProduitSignal($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getProduitSignal() === $this) {
                $produit->setProduitSignal(null);
            }
        }

        return $this;
    }


}
