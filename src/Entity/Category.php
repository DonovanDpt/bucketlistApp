<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Wish::class, orphanRemoval: true)]
    private Collection $Whishs;

    public function __construct()
    {
        $this->Whishs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $categories): self
    {
        $this->name = $categories;

        return $this;
    }

    /**
     * @return Collection<int, Wish>
     */
    public function getWhishs(): Collection
    {
        return $this->Whishs;
    }

    public function addWhish(Wish $whish): self
    {
        if (!$this->Whishs->contains($whish)) {
            $this->Whishs->add($whish);
            $whish->setCategory($this);
        }

        return $this;
    }

    public function removeWhish(Wish $whish): self
    {
        if ($this->Whishs->removeElement($whish)) {
            // set the owning side to null (unless already changed)
            if ($whish->getCategory() === $this) {
                $whish->setCategory(null);
            }
        }

        return $this;
    }
}
