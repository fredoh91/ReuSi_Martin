<?php

namespace App\Entity\Codex;

use App\Repository\SAVURepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SAVURepository::class)]
class SAVU
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodeVU;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodeCIS;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodeDossier;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $NomVu;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $NumElement;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodeSubstance;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $NumComposant;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodeUniteDosage;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodeNature;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $DosageLibraTypo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $DosageLibra;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $LibCourt;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $NomSubstance;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CodeProduit;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCodeCIS(): ?string
    {
        return $this->CodeCIS;
    }

    public function setCodeCIS(?string $CodeCIS): self
    {
        $this->CodeCIS = $CodeCIS;

        return $this;
    }

    public function getCodeDossier(): ?string
    {
        return $this->CodeDossier;
    }

    public function setCodeDossier(?string $CodeDossier): self
    {
        $this->CodeDossier = $CodeDossier;

        return $this;
    }

    public function getNomVu(): ?string
    {
        return $this->NomVu;
    }

    public function setNomVu(?string $NomVu): self
    {
        $this->NomVu = $NomVu;

        return $this;
    }

    public function getNumElement(): ?string
    {
        return $this->NumElement;
    }

    public function setNumElement(?string $NumElement): self
    {
        $this->NumElement = $NumElement;

        return $this;
    }

    public function getCodeSubstance(): ?string
    {
        return $this->CodeSubstance;
    }

    public function setCodeSubstance(?string $CodeSubstance): self
    {
        $this->CodeSubstance = $CodeSubstance;

        return $this;
    }

    public function getNumComposant(): ?string
    {
        return $this->NumComposant;
    }

    public function setNumComposant(?string $NumComposant): self
    {
        $this->NumComposant = $NumComposant;

        return $this;
    }

    public function getCodeUniteDosage(): ?string
    {
        return $this->CodeUniteDosage;
    }

    public function setCodeUniteDosage(?string $CodeUniteDosage): self
    {
        $this->CodeUniteDosage = $CodeUniteDosage;

        return $this;
    }

    public function getCodeNature(): ?string
    {
        return $this->CodeNature;
    }

    public function setCodeNature(?string $CodeNature): self
    {
        $this->CodeNature = $CodeNature;

        return $this;
    }

    public function getDosageLibraTypo(): ?string
    {
        return $this->DosageLibraTypo;
    }

    public function setDosageLibraTypo(?string $DosageLibraTypo): self
    {
        $this->DosageLibraTypo = $DosageLibraTypo;

        return $this;
    }

    public function getDosageLibra(): ?string
    {
        return $this->DosageLibra;
    }

    public function setDosageLibra(?string $DosageLibra): self
    {
        $this->DosageLibra = $DosageLibra;

        return $this;
    }

    public function getLibCourt(): ?string
    {
        return $this->LibCourt;
    }

    public function setLibCourt(?string $LibCourt): self
    {
        $this->LibCourt = $LibCourt;

        return $this;
    }

    public function getNomSubstance(): ?string
    {
        return $this->NomSubstance;
    }

    public function setNomSubstance(?string $NomSubstance): self
    {
        $this->NomSubstance = $NomSubstance;

        return $this;
    }

    public function getCodeProduit(): ?string
    {
        return $this->CodeProduit;
    }

    public function setCodeProduit(?string $CodeProduit): self
    {
        $this->CodeProduit = $CodeProduit;

        return $this;
    }
}
