<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coeffficient = null;

    #[ORM\Column(nullable: true)]
    private ?float $reduction = null;

    #[ORM\Column(length: 255)]
    private ?string $deliveryAdress = null;

    #[ORM\Column(length: 255)]
    private ?string $deliveryZipcode = null;

    #[ORM\Column(length: 255)]
    private ?string $deliveryCity = null;

    #[ORM\Column(length: 255)]
    private ?string $deliveryCountry = null;

    #[ORM\Column(length: 255)]
    private ?string $billingAdress = null;

    #[ORM\Column(length: 255)]
    private ?string $billingZipcode = null;

    #[ORM\Column(length: 255)]
    private ?string $billingCity = null;

    #[ORM\Column(length: 255)]
    private ?string $billingCountry = null;

    #[ORM\Column(length: 255)]
    private ?string $methode = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $deleteDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $facturationNumber = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?Buyer $buyer = null;

    #[ORM\OneToMany(mappedBy: 'payment', targetEntity: Delivery::class)]
    private Collection $deliveries;

    #[ORM\OneToMany(mappedBy: 'payment', targetEntity: ComposedBy::class)]
    private Collection $composedBies;

    public function __construct()
    {
        $this->deliveries = new ArrayCollection();
        $this->composedBies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoeffficient(): ?string
    {
        return $this->coeffficient;
    }

    public function setCoeffficient(?string $coeffficient): self
    {
        $this->coeffficient = $coeffficient;

        return $this;
    }

    public function getReduction(): ?float
    {
        return $this->reduction;
    }

    public function setReduction(?float $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getDeliveryAdress(): ?string
    {
        return $this->deliveryAdress;
    }

    public function setDeliveryAdress(string $deliveryAdress): self
    {
        $this->deliveryAdress = $deliveryAdress;

        return $this;
    }

    public function getDeliveryZipcode(): ?string
    {
        return $this->deliveryZipcode;
    }

    public function setDeliveryZipcode(string $deliveryZipcode): self
    {
        $this->deliveryZipcode = $deliveryZipcode;

        return $this;
    }

    public function getDeliveryCity(): ?string
    {
        return $this->deliveryCity;
    }

    public function setDeliveryCity(string $deliveryCity): self
    {
        $this->deliveryCity = $deliveryCity;

        return $this;
    }

    public function getDeliveryCountry(): ?string
    {
        return $this->deliveryCountry;
    }

    public function setDeliveryCountry(string $deliveryCountry): self
    {
        $this->deliveryCountry = $deliveryCountry;

        return $this;
    }

    public function getBillingAdress(): ?string
    {
        return $this->billingAdress;
    }

    public function setBillingAdress(string $billingAdress): self
    {
        $this->billingAdress = $billingAdress;

        return $this;
    }

    public function getBillingZipcode(): ?string
    {
        return $this->billingZipcode;
    }

    public function setBillingZipcode(string $billingZipcode): self
    {
        $this->billingZipcode = $billingZipcode;

        return $this;
    }

    public function getBillingCity(): ?string
    {
        return $this->billingCity;
    }

    public function setBillingCity(string $billingCity): self
    {
        $this->billingCity = $billingCity;

        return $this;
    }

    public function getBillingCountry(): ?string
    {
        return $this->billingCountry;
    }

    public function setBillingCountry(string $billingCountry): self
    {
        $this->billingCountry = $billingCountry;

        return $this;
    }

    public function getMethode(): ?string
    {
        return $this->methode;
    }

    public function setMethode(string $methode): self
    {
        $this->methode = $methode;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDeleteDate(): ?\DateTimeInterface
    {
        return $this->deleteDate;
    }

    public function setDeleteDate(?\DateTimeInterface $deleteDate): self
    {
        $this->deleteDate = $deleteDate;

        return $this;
    }

    public function getFacturationNumber(): ?string
    {
        return $this->facturationNumber;
    }

    public function setFacturationNumber(?string $facturationNumber): self
    {
        $this->facturationNumber = $facturationNumber;

        return $this;
    }

    public function getBuyer(): ?Buyer
    {
        return $this->buyer;
    }

    public function setBuyer(?Buyer $buyer): self
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * @return Collection<int, Delivery>
     */
    public function getDeliveries(): Collection
    {
        return $this->deliveries;
    }

    public function addDelivery(Delivery $delivery): self
    {
        if (!$this->deliveries->contains($delivery)) {
            $this->deliveries->add($delivery);
            $delivery->setPayment($this);
        }

        return $this;
    }

    public function removeDelivery(Delivery $delivery): self
    {
        if ($this->deliveries->removeElement($delivery)) {
            // set the owning side to null (unless already changed)
            if ($delivery->getPayment() === $this) {
                $delivery->setPayment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ComposedBy>
     */
    public function getComposedBies(): Collection
    {
        return $this->composedBies;
    }

    public function addComposedBy(ComposedBy $composedBy): self
    {
        if (!$this->composedBies->contains($composedBy)) {
            $this->composedBies->add($composedBy);
            $composedBy->setPayment($this);
        }

        return $this;
    }

    public function removeComposedBy(ComposedBy $composedBy): self
    {
        if ($this->composedBies->removeElement($composedBy)) {
            // set the owning side to null (unless already changed)
            if ($composedBy->getPayment() === $this) {
                $composedBy->setPayment(null);
            }
        }

        return $this;
    }
}
