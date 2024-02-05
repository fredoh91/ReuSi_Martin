<?php

namespace App\Entity;

use App\Repository\DMMRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DMMRepository::class)]
class DMM
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Libelle;

    #[ORM\Column(type: 'boolean')]
    private $Actif;

    #[ORM\OneToMany(targetEntity: SignalANSM::class, mappedBy: 'DMM')]
    private $signals;

    public function __construct()
    {
        $this->signals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->Actif;
    }

    public function setActif(bool $Actif): self
    {
        $this->Actif = $Actif;

        return $this;
    }

    /**
     * @return Collection|Signal[]
     */
    public function getSignals(): Collection
    {
        return $this->signals;
    }

    public function addSignal(SignalANSM $signal): self
    {
        if (!$this->signals->contains($signal)) {
            $this->signals[] = $signal;
            $signal->setDMM($this);
        }

        return $this;
    }

    public function removeSignal(SignalANSM $signal): self
    {
        if ($this->signals->removeElement($signal)) {
            // set the owning side to null (unless already changed)
            if ($signal->getDMM() === $this) {
                $signal->setDMM(null);
            }
        }

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->Actif;
    }
}
