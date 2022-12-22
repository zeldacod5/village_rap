<?php

namespace App\Entity;

use App\Entity\Subcategory;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

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

    #[ORM\ManyToOne(targetEntity: Subcategory::class, inversedBy: 'products')]
    private ?Subcategory $subcategory;

    #[ORM\ManyToOne(inversedBy: 'product')]
    private ?ComposedBy $composedBy = null;

    #[ORM\ManyToOne(inversedBy: 'product')]
    private ?Prepared $prepared = null;

    #[ORM\Column(length: 255)]
    private ?string $artistname = null;

    #[ORM\ManyToMany(targetEntity: Label::class, mappedBy: 'Product')]
    private Collection $labels;

    #[ORM\ManyToMany(targetEntity: Artist::class, mappedBy: 'Products')]
    private Collection $artists;

    public function __construct()
    {
        $this->labels = new ArrayCollection();
        $this->artists = new ArrayCollection();
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
    public function getSubcategory(): ?Subcategory
    {
        return $this->subcategory;
    }

    public function setSubcategory(?Subcategory $subcategory): self
    {
        $this->subcategory = $subcategory;

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

    public function getArtistname(): ?string
    {
        return $this->artistname;
    }

    public function setArtistname(string $artistname): self
    {
        $this->artistname = $artistname;

        return $this;
    }

    /**
     * @return Collection<int, Label>
     */
    public function getLabels(): Collection
    {
        return $this->labels;
    }

    public function addLabel(Label $label): self
    {
        if (!$this->labels->contains($label)) {
            $this->labels->add($label);
            $label->addProduct($this);
        }

        return $this;
    }

    public function removeLabel(Label $label): self
    {
        if ($this->labels->removeElement($label)) {
            $label->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Artist>
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(Artist $artist): self
    {
        if (!$this->artists->contains($artist)) {
            $this->artists->add($artist);
            $artist->addProduct($this);
        }

        return $this;
    }

    public function removeArtist(Artist $artist): self
    {
        if ($this->artists->removeElement($artist)) {
            $artist->removeProduct($this);
        }

        return $this;
    }
}
