<?php

namespace App\Entity\Main;

use App\Repository\Main\MesureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MesureRepository::class)
 */
class Mesure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=LibelleMesure::class, inversedBy="mesures")
     */
    private $LibelleMesure;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DatePrev;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateRealisation;

    /**
     * @ORM\ManyToOne(targetEntity=ReleveDecision::class, inversedBy="mesures")
     */
    private $MesureReleveDecision;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleMesure(): ?LibelleMesure
    {
        return $this->LibelleMesure;
    }

    public function setLibelleMesure(?LibelleMesure $LibelleMesure): self
    {
        $this->LibelleMesure = $LibelleMesure;

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

    public function getDatePrev(): ?\DateTimeInterface
    {
        return $this->DatePrev;
    }

    public function setDatePrev(?\DateTimeInterface $DatePrev): self
    {
        $this->DatePrev = $DatePrev;

        return $this;
    }

    public function getDateRealisation(): ?\DateTimeInterface
    {
        return $this->DateRealisation;
    }

    public function setDateRealisation(?\DateTimeInterface $DateRealisation): self
    {
        $this->DateRealisation = $DateRealisation;

        return $this;
    }

    public function getMesureReleveDecision(): ?ReleveDecision
    {
        return $this->MesureReleveDecision;
    }

    public function setMesureReleveDecision(?ReleveDecision $MesureReleveDecision): self
    {
        $this->MesureReleveDecision = $MesureReleveDecision;

        return $this;
    }
}
