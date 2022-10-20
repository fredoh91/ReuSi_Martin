<?php

namespace App\Entity;

use App\Repository\VUUtilRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VUUtilRepository::class)
 */
class VUUtil
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
    private $CodeVU;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CodeCIS;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CodeDossier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NomVU;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dbo_Autorisation_libAbr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dbo_ClasseATC_libAbr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dbo_ClasseATC_libCourt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $LibCourt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CodeContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NomContactLibra;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AdresseContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AdresseCompl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CodePost;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NomVille;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TelContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $FaxContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dbo_Pays_libCourt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dbo_StatutSpeci_libAbr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $StatutAbrege;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CodeActeur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CodeTigre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NomActeurLong;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AdresseComplExpl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CodePostExpl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NomVilleExpl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Complement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Fax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dbo_Pays_libAbr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CodeProduit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeVU(): ?string
    {
        return $this->CodeVU;
    }

    public function setCodeVU(string $CodeVU): self
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

    public function getNomVU(): ?string
    {
        return $this->NomVU;
    }

    public function setNomVU(?string $NomVU): self
    {
        $this->NomVU = $NomVU;

        return $this;
    }

    public function getDboAutorisationLibAbr(): ?string
    {
        return $this->dbo_Autorisation_libAbr;
    }

    public function setDboAutorisationLibAbr(?string $dbo_Autorisation_libAbr): self
    {
        $this->dbo_Autorisation_libAbr = $dbo_Autorisation_libAbr;

        return $this;
    }

    public function getDboClasseATCLibAbr(): ?string
    {
        return $this->dbo_ClasseATC_libAbr;
    }

    public function setDboClasseATCLibAbr(?string $dbo_ClasseATC_libAbr): self
    {
        $this->dbo_ClasseATC_libAbr = $dbo_ClasseATC_libAbr;

        return $this;
    }

    public function getDboClasseATCLibCourt(): ?string
    {
        return $this->dbo_ClasseATC_libCourt;
    }

    public function setDboClasseATCLibCourt(?string $dbo_ClasseATC_libCourt): self
    {
        $this->dbo_ClasseATC_libCourt = $dbo_ClasseATC_libCourt;

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

    public function getCodeContact(): ?string
    {
        return $this->CodeContact;
    }

    public function setCodeContact(?string $CodeContact): self
    {
        $this->CodeContact = $CodeContact;

        return $this;
    }

    public function getNomContactLibra(): ?string
    {
        return $this->NomContactLibra;
    }

    public function setNomContactLibra(?string $NomContactLibra): self
    {
        $this->NomContactLibra = $NomContactLibra;

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

    public function getDboPaysLibCourt(): ?string
    {
        return $this->dbo_Pays_libCourt;
    }

    public function setDboPaysLibCourt(?string $dbo_Pays_libCourt): self
    {
        $this->dbo_Pays_libCourt = $dbo_Pays_libCourt;

        return $this;
    }

    public function getDboStatutSpeciLibAbr(): ?string
    {
        return $this->dbo_StatutSpeci_libAbr;
    }

    public function setDboStatutSpeciLibAbr(?string $dbo_StatutSpeci_libAbr): self
    {
        $this->dbo_StatutSpeci_libAbr = $dbo_StatutSpeci_libAbr;

        return $this;
    }

    public function getStatutAbrege(): ?string
    {
        return $this->StatutAbrege;
    }

    public function setStatutAbrege(?string $StatutAbrege): self
    {
        $this->StatutAbrege = $StatutAbrege;

        return $this;
    }

    public function getCodeActeur(): ?string
    {
        return $this->CodeActeur;
    }

    public function setCodeActeur(?string $CodeActeur): self
    {
        $this->CodeActeur = $CodeActeur;

        return $this;
    }

    public function getCodeTigre(): ?string
    {
        return $this->CodeTigre;
    }

    public function setCodeTigre(?string $CodeTigre): self
    {
        $this->CodeTigre = $CodeTigre;

        return $this;
    }

    public function getNomActeurLong(): ?string
    {
        return $this->NomActeurLong;
    }

    public function setNomActeurLong(?string $NomActeurLong): self
    {
        $this->NomActeurLong = $NomActeurLong;

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

    public function getDboPaysLibAbr(): ?string
    {
        return $this->dbo_Pays_libAbr;
    }

    public function setDboPaysLibAbr(?string $dbo_Pays_libAbr): self
    {
        $this->dbo_Pays_libAbr = $dbo_Pays_libAbr;

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
