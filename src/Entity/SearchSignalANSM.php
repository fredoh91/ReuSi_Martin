<?php

namespace App\Entity;

class SearchSignalANSM
{
    private ?int $id = null;
    private ?\DateTimeInterface $debutDateCreation = null;
    private ?\DateTimeInterface $finDateCreation = null;
    private ?string $Description = null;
    private ?string $Indication = null;
    private ?string $DenoDCI = null;
    private ?string $Contexte = null;
    private ?NiveauRisqueInitial $NiveauRisqueInitial = null;
    private ?NiveauRisqueFinal $NiveauRisqueFinal = null;
    private ?string $AnaRisqueComment = null;
    private ?string $ProposReducRisque = null;
    private ?string $SourceSignal = null;
    private ?string $RefSignal = null;
    private ?PoleDS $PoleDS = null;
    private ?DMM $DMM = null;
    private ?string $IdentifiantSource = null;
    private ?PiloteDS $PiloteDS = null;
    private ?CoPiloteDS $CoPiloteDS = null;
    private ?StatutSignal $StatutSignal = null;
    private ?StatutEmetteur $StatutEmetteur = null;
    private ?Produit $produits = null;
    private ?Suivi $suivis = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDebutDateCreation(): ?\DateTimeInterface
    {
        return $this->debutDateCreation;
    }

    public function setDebutDateCreation(?\DateTimeInterface $debutDateCreation): self
    {
        $this->debutDateCreation = $debutDateCreation;

        return $this;
    }


    public function getFinDateCreation(): ?\DateTimeInterface
    {
        return $this->finDateCreation;
    }

    public function setFinDateCreation(?\DateTimeInterface $finDateCreation): self
    {
        $this->finDateCreation = $finDateCreation;

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

    public function getDenoDCI(): ?string
    {
        return $this->DenoDCI;
    }

    public function setDenoDCI(?string $DenoDCI): self
    {
        $this->DenoDCI = $DenoDCI;

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

    public function setNiveauRisqueInitial(?NiveauRisqueInitial $NiveauRisqueInitial): self
    {
        $this->NiveauRisqueInitial = $NiveauRisqueInitial;

        return $this;
    }

    public function getNiveauRisqueFinal(): ?string
    {
        return $this->NiveauRisqueFinal;
    }

    public function setNiveauRisqueFinal(?NiveauRisqueFinal $NiveauRisqueFinal): self
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

    public function getProduits(): ?Produit
    {
        return $this->produits;
    }

    public function setProduits(?Produit $produits): self
    {
        $this->produits = $produits;

        return $this;
    }

    public function getSuivis(): ?Suivi
    {
        return $this->suivis;
    }

    public function setSuivis(?Suivi $suivis): self
    {
        $this->suivis = $suivis;

        return $this;
    }
}
