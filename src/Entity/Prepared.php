<?php

namespace App\Entity;

use App\Repository\PreparedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PreparedRepository::class)]
class Prepared
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'prepared', targetEntity: Product::class)]
    private Collection $product;

    #[ORM\ManyToOne(inversedBy: 'prepareds')]
    private ?Delivery $delivery = null;

    #[ORM\Column]
    private ?int $deliveryQuantity = null;

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
            $product->setPrepared($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getPrepared() === $this) {
                $product->setPrepared(null);
            }
        }

        return $this;
    }

    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    public function setDelivery(?Delivery $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    public function getDeliveryQuantity(): ?int
    {
        return $this->deliveryQuantity;
    }

    public function setDeliveryQuantity(int $deliveryQuantity): self
    {
        $this->deliveryQuantity = $deliveryQuantity;

        return $this;
    }
}
