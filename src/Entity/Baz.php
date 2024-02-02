<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BazRepository;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BazRepository::class)
 */
#[ORM\Entity(repositoryClass: BazRepository::class)]
class Baz
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')] 
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2)]
    private string $name;

    /**
     * @ORM\ManyToOne(targetEntity=Foo::class, inversedBy="bazs")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    #[ORM\ManyToOne(targetEntity: Foo::class, inversedBy: 'bazs')]
    #[JoinColumn(nullable: false, onDelete: "CASCADE")]
    private ?Foo $foo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFoo(): ?Foo
    {
        return $this->foo;
    }

    public function setFoo(?Foo $foo): self
    {
        $this->foo = $foo;

        return $this;
    }
}