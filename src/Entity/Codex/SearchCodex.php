<?php

namespace App\Entity\Codex;

class SearchCodex
{
    // private ?int $master_id = null;
    private ?string $denomination = null;
    private ?string $dci = null;
 
    // public function getMasterId(): ?int
    // {
    //     return $this->master_id;
    // }

    // public function setMasterId(int $master_id): self
    // {
    //     $this->master_id = $master_id;

    //     return $this;
    // }

    public function getdenomination(): ?string
    {
        return $this->denomination;
    }

    public function setdenomination(string $denomination): self
    {
        $this->denomination = $denomination;

        return $this;
    }


    public function getdci(): ?string
    {
        return $this->dci;
    }

    public function setdci(string $dci): self
    {
        $this->dci = $dci;

        return $this;
    }
}
