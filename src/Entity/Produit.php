<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Denomination;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $DCI;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Dosage;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Voie;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Laboratoire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $idLaboratoire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $TypeProcedure;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodeCIS;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodeVU;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodeDissier;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $NomVU;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Codex;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Titulaire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $idTitulaire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $AdresseContact;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $AdresseCompl;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodePost;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $NomVille;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $TelContact;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $FaxContact;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Adresse;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $AdresseComplExpl;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodePostExpl;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $NomVilleExpl;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Complement;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Tel;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Fax;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodeATC;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $LibATC;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $DP;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $PrescriptionDelivrance;

    #[ORM\ManyToOne(targetEntity: SignalANSM::class, inversedBy: 'produits')]
    private $ProduitSignal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDenomination(): ?string
    {
        return $this->Denomination;
    }

    public function setDenomination(?string $Denomination): self
    {
        $this->Denomination = $Denomination;

        return $this;
    }

    public function getDCI(): ?string
    {
        return $this->DCI;
    }

    public function setDCI(?string $DCI): self
    {
        $this->DCI = $DCI;

        return $this;
    }

    public function getDosage(): ?string
    {
        return $this->Dosage;
    }

    public function setDosage(?string $Dosage): self
    {
        $this->Dosage = $Dosage;

        return $this;
    }

    public function getVoie(): ?string
    {
        return $this->Voie;
    }

    public function setVoie(?string $Voie): self
    {
        $this->Voie = $Voie;

        return $this;
    }

    public function getLaboratoire(): ?string
    {
        return $this->Laboratoire;
    }

    public function setLaboratoire(?string $Laboratoire): self
    {
        $this->Laboratoire = $Laboratoire;

        return $this;
    }

    public function getIdLaboratoire(): ?string
    {
        return $this->idLaboratoire;
    }

    public function setIdLaboratoire(?string $idLaboratoire): self
    {
        $this->idLaboratoire = $idLaboratoire;

        return $this;
    }

    public function getTypeProcedure(): ?string
    {
        return $this->TypeProcedure;
    }

    public function setTypeProcedure(?string $TypeProcedure): self
    {
        $this->TypeProcedure = $TypeProcedure;

        return $this;
    }

    public function getCodeCIS(): ?string
    {
        return $this->CodeCIS;
    }

    public function setCodeCIS(?string $CodeCIS): self
    {
        $this->CodeCIS = $CodeCIS;

        return $this;
    }

    public function getCodeVU(): ?string
    {
        return $this->CodeVU;
    }

    public function setCodeVU(?string $CodeVU): self
    {
        $this->CodeVU = $CodeVU;

        return $this;
    }

    public function getCodeDissier(): ?string
    {
        return $this->CodeDissier;
    }

    public function setCodeDissier(?string $CodeDissier): self
    {
        $this->CodeDissier = $CodeDissier;

        return $this;
    }

    public function getNomVU(): ?string
    {
        return $this->NomVU;
    }

    public function setNomVU(?string $NomVU): self
    {
        $this->NomVU = $NomVU;

        return $this;
    }

    public function getCodex(): ?bool
    {
        return $this->Codex;
    }

    public function setCodex(?bool $Codex): self
    {
        $this->Codex = $Codex;

        return $this;
    }

    public function getTitulaire(): ?string
    {
        return $this->Titulaire;
    }

    public function setTitulaire(?string $Titulaire): self
    {
        $this->Titulaire = $Titulaire;

        return $this;
    }

    public function getIdTitulaire(): ?string
    {
        return $this->idTitulaire;
    }

    public function setIdTitulaire(?string $idTitulaire): self
    {
        $this->idTitulaire = $idTitulaire;

        return $this;
    }

    public function getAdresseContact(): ?string
    {
        return $this->AdresseContact;
    }

    public function setAdresseContact(?string $AdresseContact): self
    {
        $this->AdresseContact = $AdresseContact;

        return $this;
    }

    public function getAdresseCompl(): ?string
    {
        return $this->AdresseCompl;
    }

    public function setAdresseCompl(?string $AdresseCompl): self
    {
        $this->AdresseCompl = $AdresseCompl;

        return $this;
    }

    public function getCodePost(): ?string
    {
        return $this->CodePost;
    }

    public function setCodePost(?string $CodePost): self
    {
        $this->CodePost = $CodePost;

        return $this;
    }

    public function getNomVille(): ?string
    {
        return $this->NomVille;
    }

    public function setNomVille(?string $NomVille): self
    {
        $this->NomVille = $NomVille;

        return $this;
    }

    public function getTelContact(): ?string
    {
        return $this->TelContact;
    }

    public function setTelContact(?string $TelContact): self
    {
        $this->TelContact = $TelContact;

        return $this;
    }

    public function getFaxContact(): ?string
    {
        return $this->FaxContact;
    }

    public function setFaxContact(?string $FaxContact): self
    {
        $this->FaxContact = $FaxContact;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getAdresseComplExpl(): ?string
    {
        return $this->AdresseComplExpl;
    }

    public function setAdresseComplExpl(?string $AdresseComplExpl): self
    {
        $this->AdresseComplExpl = $AdresseComplExpl;

        return $this;
    }

    public function getCodePostExpl(): ?string
    {
        return $this->CodePostExpl;
    }

    public function setCodePostExpl(?string $CodePostExpl): self
    {
        $this->CodePostExpl = $CodePostExpl;

        return $this;
    }

    public function getNomVilleExpl(): ?string
    {
        return $this->NomVilleExpl;
    }

    public function setNomVilleExpl(?string $NomVilleExpl): self
    {
        $this->NomVilleExpl = $NomVilleExpl;

        return $this;
    }

    public function getComplement(): ?string
    {
        return $this->Complement;
    }

    public function setComplement(?string $Complement): self
    {
        $this->Complement = $Complement;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(?string $Tel): self
    {
        $this->Tel = $Tel;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->Fax;
    }

    public function setFax(?string $Fax): self
    {
        $this->Fax = $Fax;

        return $this;
    }

    public function getCodeATC(): ?string
    {
        return $this->CodeATC;
    }

    public function setCodeATC(?string $CodeATC): self
    {
        $this->CodeATC = $CodeATC;

        return $this;
    }

    public function getLibATC(): ?string
    {
        return $this->LibATC;
    }

    public function setLibATC(?string $LibATC): self
    {
        $this->LibATC = $LibATC;

        return $this;
    }

    public function getDP(): ?string
    {
        return $this->DP;
    }

    public function setDP(?string $DP): self
    {
        $this->DP = $DP;

        return $this;
    }

    public function getPrescriptionDelivrance(): ?string
    {
        return $this->PrescriptionDelivrance;
    }

    public function setPrescriptionDelivrance(?string $PrescriptionDelivrance): self
    {
        $this->PrescriptionDelivrance = $PrescriptionDelivrance;

        return $this;
    }

    public function getProduitSignal(): ?SignalANSM
    {
        return $this->ProduitSignal;
    }

    public function setProduitSignal(?SignalANSM $ProduitSignal): self
    {
        $this->ProduitSignal = $ProduitSignal;

        return $this;
    }

    public function isCodex(): ?bool
    {
        return $this->Codex;
    }
}
