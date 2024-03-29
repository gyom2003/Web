<?php

namespace App\Entity;

use App\Repository\ItemsRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

#[ORM\Entity(repositoryClass: ItemsRepository::class)]
#[ApiResource]

class Items
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $category_id = null;

    #[ORM\Column(length: 255)]
    public ?string $title = null;

    #[ORM\Column(length: 255)]
    public ?string $description = null;

    #[ORM\Column]
    public ?bool $isAvailable = null;

    #[ORM\Column]
    public ?float $price = null;

    #[ORM\ManyToOne(inversedBy: 'categorymain')]

    // #[ORM\Column(name: "category_relation" )]
    public ?Category $category_relation = null;

    public function getCategory_id(): ?int
    {
        return $this->category_id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): static
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    // public function getCategoryRef()
    // {
    //     return $this->categoryRef;
    // }

    // public function setCategoryRef($categoryRef): static
    // {
    //     $this->categoryRef = $categoryRef;

    //     return $this;
    // }

        public function setCategory_id(int $category_id): static
    {
        $this->category_id = $category_id;

        return $this;
    }

        public function getCategoryRelation(): ?Category
        {
            return $this->category_relation;
        }

        public function setCategoryRelation(?Category $category_relation): static
        {
            $this->category_relation = $category_relation;

            return $this;
        }
}
