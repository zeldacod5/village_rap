<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdersRepository::class)
 */
class Orders
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $orderDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $bilDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $paymentDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $shipDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $receptionDate;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deliveryInvoice;

    /**
     * @ORM\Column(type="text")
     */
    private $dNote;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $deliveryAdress;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deliveryCity;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deliveryCountries;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $deliveryZipcode;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $additionalReduction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    public function setOrderDate(\DateTimeInterface $orderDate): self
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getBilDate(): ?\DateTimeInterface
    {
        return $this->bilDate;
    }

    public function setBilDate(?\DateTimeInterface $bilDate): self
    {
        $this->bilDate = $bilDate;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function setPaymentDate(?\DateTimeInterface $paymentDate): self
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    public function getShipDate(): ?\DateTimeInterface
    {
        return $this->shipDate;
    }

    public function setShipDate(?\DateTimeInterface $shipDate): self
    {
        $this->shipDate = $shipDate;

        return $this;
    }

    public function getReceptionDate(): ?\DateTimeInterface
    {
        return $this->receptionDate;
    }

    public function setReceptionDate(?\DateTimeInterface $receptionDate): self
    {
        $this->receptionDate = $receptionDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDeliveryInvoice(): ?bool
    {
        return $this->deliveryInvoice;
    }

    public function setDeliveryInvoice(bool $deliveryInvoice): self
    {
        $this->deliveryInvoice = $deliveryInvoice;

        return $this;
    }

    public function getDNote(): ?string
    {
        return $this->dNote;
    }

    public function setDNote(string $dNote): self
    {
        $this->dNote = $dNote;

        return $this;
    }

    public function getDeliveryAdress(): ?string
    {
        return $this->deliveryAdress;
    }

    public function setDeliveryAdress(?string $deliveryAdress): self
    {
        $this->deliveryAdress = $deliveryAdress;

        return $this;
    }

    public function getDeliveryCity(): ?string
    {
        return $this->deliveryCity;
    }

    public function setDeliveryCity(?string $deliveryCity): self
    {
        $this->deliveryCity = $deliveryCity;

        return $this;
    }

    public function getDeliveryCountries(): ?string
    {
        return $this->deliveryCountries;
    }

    public function setDeliveryCountries(?string $deliveryCountries): self
    {
        $this->deliveryCountries = $deliveryCountries;

        return $this;
    }

    public function getDeliveryZipcode(): ?string
    {
        return $this->deliveryZipcode;
    }

    public function setDeliveryZipcode(?string $deliveryZipcode): self
    {
        $this->deliveryZipcode = $deliveryZipcode;

        return $this;
    }

    public function getAdditionalReduction(): ?string
    {
        return $this->additionalReduction;
    }

    public function setAdditionalReduction(?string $additionalReduction): self
    {
        $this->additionalReduction = $additionalReduction;

        return $this;
    }
}
