<?php

namespace App\Entity;

use App\Repository\ComposedByRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComposedByRepository::class)]
class ComposedBy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'composedBy', targetEntity: Product::class)]
    private Collection $product;

    #[ORM\ManyToOne(inversedBy: 'composedBies')]
    private ?Orders $payment = null;

    #[ORM\Column(nullable: true)]
    private ?float $composedTaxes = null;

    #[ORM\Column]
    private ?int $composedQuantity = null;

    #[ORM\Column]
    private ?float $composedSellPrice = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $composedWithDetails = null;

    public function __construct()
    {
        $this->product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product->add($product);
            $product->setComposedBy($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getComposedBy() === $this) {
                $product->setComposedBy(null);
            }
        }

        return $this;
    }

    public function getPayment(): ?Orders
    {
        return $this->payment;
    }

    public function setPayment(?Orders $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getComposedTaxes(): ?float
    {
        return $this->composedTaxes;
    }

    public function setComposedTaxes(?float $composedTaxes): self
    {
        $this->composedTaxes = $composedTaxes;

        return $this;
    }

    public function getComposedQuantity(): ?int
    {
        return $this->composedQuantity;
    }

    public function setComposedQuantity(int $composedQuantity): self
    {
        $this->composedQuantity = $composedQuantity;

        return $this;
    }

    public function getComposedSellPrice(): ?float
    {
        return $this->composedSellPrice;
    }

    public function setComposedSellPrice(float $composedSellPrice): self
    {
        $this->composedSellPrice = $composedSellPrice;

        return $this;
    }

    public function getComposedWithDetails(): ?string
    {
        return $this->composedWithDetails;
    }

    public function setComposedWithDetails(?string $composedWithDetails): self
    {
        $this->composedWithDetails = $composedWithDetails;

        return $this;
    }
}
