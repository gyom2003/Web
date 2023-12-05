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

    #[ORM\OneToMany(mappedBy: 'category_relation', targetEntity: Items::class)]
    private Collection $categorymain;

    public function __construct()
    {
        $this->categorymain = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Items>
     */
    public function getCategorymain(): Collection
    {
        return $this->categorymain;
    }

    public function addCategorymain(Items $categorymain): static
    {
        if (!$this->categorymain->contains($categorymain)) {
            $this->categorymain->add($categorymain);
            $categorymain->setCategoryRelation($this);
        }

        return $this;
    }

    public function removeCategorymain(Items $categorymain): static
    {
        if ($this->categorymain->removeElement($categorymain)) {
            // set the owning side to null (unless already changed)
            if ($categorymain->getCategoryRelation() === $this) {
                $categorymain->setCategoryRelation(null);
            }
        }

        return $this;
    }
}
