<?php

namespace App\Entity;

use App\Repository\SuiviRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuiviRepository::class)]
class Suivi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $DateSuivi;

    #[ORM\Column(type: 'text', nullable: true)]
    private $Description;

    #[ORM\ManyToOne(targetEntity: EmetteurSuivi::class, inversedBy: 'suivis')]
    private $EmetteurSuivi;

    #[ORM\ManyToOne(targetEntity: Signal::class, inversedBy: 'suivis')]
    private $SuiviSignal;

    #[ORM\OneToMany(mappedBy: 'Suivi', targetEntity: ReleveDecision::class)]
    private Collection $releveDecisions;

    public function __construct()
    {
        $this->releveDecisions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSuivi(): ?\DateTimeInterface
    {
        return $this->DateSuivi;
    }

    public function setDateSuivi(?\DateTimeInterface $DateSuivi): self
    {
        $this->DateSuivi = $DateSuivi;

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

    public function getEmetteurSuivi(): ?EmetteurSuivi
    {
        return $this->EmetteurSuivi;
    }

    public function setEmetteurSuivi(?EmetteurSuivi $EmetteurSuivi): self
    {
        $this->EmetteurSuivi = $EmetteurSuivi;

        return $this;
    }

    public function getSuiviSignal(): ?Signal
    {
        return $this->SuiviSignal;
    }

    public function setSuiviSignal(?Signal $SuiviSignal): self
    {
        $this->SuiviSignal = $SuiviSignal;

        return $this;
    }

    /**
     * @return Collection<int, ReleveDecision>
     */
    public function getReleveDecisions(): Collection
    {
        return $this->releveDecisions;
    }

    public function addReleveDecision(ReleveDecision $releveDecision): self
    {
        if (!$this->releveDecisions->contains($releveDecision)) {
            $this->releveDecisions->add($releveDecision);
            $releveDecision->setSuivi($this);
        }

        return $this;
    }

    public function removeReleveDecision(ReleveDecision $releveDecision): self
    {
        if ($this->releveDecisions->removeElement($releveDecision)) {
            // set the owning side to null (unless already changed)
            if ($releveDecision->getSuivi() === $this) {
                $releveDecision->setSuivi(null);
            }
        }

        return $this;
    }
}
