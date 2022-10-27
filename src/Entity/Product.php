<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $shortLib = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $longLib = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reference = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(nullable: true)]
    private ?int $stock = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $stockMax = null;

    #[ORM\Column(nullable: true)]
    private ?int $stockAlert = null;

    #[ORM\Column(nullable: true)]
    private ?float $priceIncludedTaxes = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Supplier $supplier = null;

    #[ORM\ManyToMany(targetEntity: Subcategory::class, inversedBy: 'products')]
    private Collection $subcategory;

    #[ORM\ManyToOne(inversedBy: 'product')]
    private ?ComposedBy $composedBy = null;

    #[ORM\ManyToOne(inversedBy: 'product')]
    private ?Prepared $prepared = null;

    public function __construct()
    {
        $this->subcategory = new ArrayCollection();
    }

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

    public function getShortLib(): ?string
    {
        return $this->shortLib;
    }

    public function setShortLib(?string $shortLib): self
    {
        $this->shortLib = $shortLib;

        return $this;
    }

    public function getLongLib(): ?string
    {
        return $this->longLib;
    }

    public function setLongLib(?string $longLib): self
    {
        $this->longLib = $longLib;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStockMax(): ?string
    {
        return $this->stockMax;
    }

    public function setStockMax(?string $stockMax): self
    {
        $this->stockMax = $stockMax;

        return $this;
    }

    public function getStockAlert(): ?int
    {
        return $this->stockAlert;
    }

    public function setStockAlert(?int $stockAlert): self
    {
        $this->stockAlert = $stockAlert;

        return $this;
    }

    public function getPriceIncludedTaxes(): ?float
    {
        return $this->priceIncludedTaxes;
    }

    public function setPriceIncludedTaxes(?float $priceIncludedTaxes): self
    {
        $this->priceIncludedTaxes = $priceIncludedTaxes;

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(?Supplier $supplier): self
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * @return Collection<int, Subcategory>
     */
    public function getSubcategory(): Collection
    {
        return $this->subcategory;
    }

    public function addSubcategory(Subcategory $subcategory): self
    {
        if (!$this->subcategory->contains($subcategory)) {
            $this->subcategory->add($subcategory);
        }

        return $this;
    }

    public function removeSubcategory(Subcategory $subcategory): self
    {
        $this->subcategory->removeElement($subcategory);

        return $this;
    }

    public function getComposedBy(): ?ComposedBy
    {
        return $this->composedBy;
    }

    public function setComposedBy(?ComposedBy $composedBy): self
    {
        $this->composedBy = $composedBy;

        return $this;
    }

    public function getPrepared(): ?Prepared
    {
        return $this->prepared;
    }

    public function setPrepared(?Prepared $prepared): self
    {
        $this->prepared = $prepared;

        return $this;
    }
}
