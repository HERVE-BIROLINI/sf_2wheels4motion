<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DriverRepository::class)
 */
class Driver
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // /**
    //  * @ORM\Column(type="date")
    //  */
    // private $registration_date;

    /**
     * @ORM\Column(type="date")
     */
    private $vmdtr_validity;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=0)
     */
    private $vmdtr_number;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $subscription_validity;

    // /**
    //  * @ORM\Column(type="decimal", precision=10, scale=0)
    //  */
    // private $phone;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $motomodel;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="Driver", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasconfirmedgoodstanding;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVmdtrValidity(): ?\DateTimeInterface
    {
        return $this->vmdtr_validity;
    }

    public function setVmdtrValidity(\DateTimeInterface $vmdtr_validity): self
    {
        $this->vmdtr_validity = $vmdtr_validity;

        return $this;
    }

    public function getVmdtrNumber(): ?string
    {
        return $this->vmdtr_number;
    }

    public function setVmdtrNumber(string $vmdtr_number): self
    {
        $this->vmdtr_number = $vmdtr_number;

        return $this;
    }

    public function getSubscriptionValidity(): ?\DateTimeInterface
    {
        return $this->subscription_validity;
    }

    public function setSubscriptionValidity(?\DateTimeInterface $subscription_validity): self
    {
        $this->subscription_validity = $subscription_validity;

        return $this;
    }

    public function getMotomodel(): ?string
    {
        return $this->motomodel;
    }

    public function setMotomodel(string $motomodel): self
    {
        $this->motomodel = $motomodel;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setDriver(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getDriver() !== $this) {
            $user->setDriver($this);
        }

        $this->user = $user;

        return $this;
    }

    public function getHasconfirmedgoodstanding(): ?bool
    {
        return $this->hasconfirmedgoodstanding;
    }

    public function setHasconfirmedgoodstanding(bool $hasconfirmedgoodstanding): self
    {
        $this->hasconfirmedgoodstanding = $hasconfirmedgoodstanding;

        return $this;
    }
}
