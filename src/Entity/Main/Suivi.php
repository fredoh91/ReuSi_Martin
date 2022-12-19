<?php

namespace App\Entity\Main;

use App\Repository\Main\SuiviRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuiviRepository::class)
 */
class Suivi
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateSuivi;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity=EmetteurSuivi::class, inversedBy="suivis")
     */
    private $EmetteurSuivi;

    /**
     * @ORM\ManyToOne(targetEntity=Signal::class, inversedBy="suivis")
     */
    private $SuiviSignal;

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
}
