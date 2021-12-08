<?php

namespace App\Entity;

use App\Repository\ComposeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComposeRepository::class)
 */
class Compose
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $orderQuantity;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $priceModified;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderQuantity(): ?int
    {
        return $this->orderQuantity;
    }

    public function setOrderQuantity(int $orderQuantity): self
    {
        $this->orderQuantity = $orderQuantity;

        return $this;
    }

    public function getPriceModified(): ?string
    {
        return $this->priceModified;
    }

    public function setPriceModified(?string $priceModified): self
    {
        $this->priceModified = $priceModified;

        return $this;
    }
}
