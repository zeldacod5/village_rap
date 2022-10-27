<?php

namespace App\Entity;

use App\Repository\DeliveryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeliveryRepository::class)]
class Delivery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $number = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $followUp = null;

    #[ORM\ManyToOne(inversedBy: 'deliveries')]
    private ?Orders $payment = null;

    #[ORM\OneToMany(mappedBy: 'delivery', targetEntity: Prepared::class)]
    private Collection $prepareds;

    public function __construct()
    {
        $this->prepareds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getFollowUp(): ?string
    {
        return $this->followUp;
    }

    public function setFollowUp(?string $followUp): self
    {
        $this->followUp = $followUp;

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

    /**
     * @return Collection<int, Prepared>
     */
    public function getPrepareds(): Collection
    {
        return $this->prepareds;
    }

    public function addPrepared(Prepared $prepared): self
    {
        if (!$this->prepareds->contains($prepared)) {
            $this->prepareds->add($prepared);
            $prepared->setDelivery($this);
        }

        return $this;
    }

    public function removePrepared(Prepared $prepared): self
    {
        if ($this->prepareds->removeElement($prepared)) {
            // set the owning side to null (unless already changed)
            if ($prepared->getDelivery() === $this) {
                $prepared->setDelivery(null);
            }
        }

        return $this;
    }
}
