<?php

namespace App\Entity;

use App\Repository\ReleveDecisionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReleveDecisionRepository::class)]
class ReleveDecision
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $DateReuSig;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $NiveauRisque;

    #[ORM\Column(type: 'text', nullable: true)]
    private $InfoAvis;

    #[ORM\ManyToOne(targetEntity: ClassificationRevDec::class, inversedBy: 'releveDecisions')]
    private $Classification;

    // #[ORM\ManyToOne(targetEntity: Signal::class, inversedBy: 'releveDecisions')]
    // private $ReleveDecisionSignal;

    #[ORM\OneToMany(targetEntity: Mesure::class, cascade: ['persist'], mappedBy: 'MesureReleveDecision')]
    private $mesures;

    #[ORM\ManyToOne(targetEntity: PassageCTP::class, inversedBy: 'releveDecisions')]
    private $PassageCTP;

    #[ORM\ManyToOne(targetEntity: PassageRSS::class, inversedBy: 'releveDecisions')]
    private $PassageRSS;

    #[ORM\ManyToOne(inversedBy: 'releveDecisions')]
    private ?Suivi $Suivi = null;

    public function __construct()
    {
        $this->mesures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReuSig(): ?\DateTimeInterface
    {
        return $this->DateReuSig;
    }

    public function setDateReuSig(\DateTimeInterface $DateReuSig): self
    {
        $this->DateReuSig = $DateReuSig;

        return $this;
    }

    public function getNiveauRisque(): ?string
    {
        return $this->NiveauRisque;
    }

    public function setNiveauRisque(?string $NiveauRisque): self
    {
        $this->NiveauRisque = $NiveauRisque;

        return $this;
    }

    public function getInfoAvis(): ?string
    {
        return $this->InfoAvis;
    }

    public function setInfoAvis(?string $InfoAvis): self
    {
        $this->InfoAvis = $InfoAvis;

        return $this;
    }

    public function getClassification(): ?ClassificationRevDec
    {
        return $this->Classification;
    }

    public function setClassification(?ClassificationRevDec $Classification): self
    {
        $this->Classification = $Classification;

        return $this;
    }

    // public function getReleveDecisionSignal(): ?Signal
    // {
    //     return $this->ReleveDecisionSignal;
    // }

    // public function setReleveDecisionSignal(?Signal $ReleveDecisionSignal): self
    // {
    //     $this->ReleveDecisionSignal = $ReleveDecisionSignal;

    //     return $this;
    // }

    /**
     * @return Collection|Mesure[]
     */
    public function getMesures(): Collection
    {
        return $this->mesures;
    }

    public function addMesure(Mesure $mesure): self
    {
        if (!$this->mesures->contains($mesure)) {
            $this->mesures[] = $mesure;
            $mesure->setMesureReleveDecision($this);
        }

        return $this;
    }

    public function removeMesure(Mesure $mesure): self
    {
        if ($this->mesures->removeElement($mesure)) {
            // set the owning side to null (unless already changed)
            if ($mesure->getMesureReleveDecision() === $this) {
                $mesure->setMesureReleveDecision(null);
            }
        }

        return $this;
    }

    public function getPassageCTP(): ?PassageCTP
    {
        return $this->PassageCTP;
    }

    public function setPassageCTP(?PassageCTP $PassageCTP): self
    {
        $this->PassageCTP = $PassageCTP;

        return $this;
    }

    public function getPassageRSS(): ?PassageRSS
    {
        return $this->PassageRSS;
    }

    public function setPassageRSS(?PassageRSS $PassageRSS): self
    {
        $this->PassageRSS = $PassageRSS;

        return $this;
    }

    public function getSuivi(): ?Suivi
    {
        return $this->Suivi;
    }

    public function setSuivi(?Suivi $Suivi): self
    {
        $this->Suivi = $Suivi;

        return $this;
    }
}
