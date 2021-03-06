<?php

namespace App\Entity;

use App\Repository\SocialreasonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SocialreasonRepository::class)
 */
class Socialreason
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $label;

    /**
     * @ORM\ManyToMany(targetEntity=Tva::class, inversedBy="socialreasons")
     */
    private $tva;

    /**
     * @ORM\OneToMany(targetEntity=Company::class, mappedBy="socialreason")
     */
    private $companies;

    public function __construct()
    {
        $this->tva = new ArrayCollection();
        $this->companies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection|Tva[]
     */
    public function getTva(): Collection
    {
        return $this->tva;
    }

    public function addTva(Tva $tva): self
    {
        if (!$this->tva->contains($tva)) {
            $this->tva[] = $tva;
        }

        return $this;
    }

    public function removeTva(Tva $tva): self
    {
        $this->tva->removeElement($tva);

        return $this;
    }

    /**
     * @return Collection|Company[]
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): self
    {
        if (!$this->companies->contains($company)) {
            $this->companies[] = $company;
            $company->setSocialreason($this);
        }
        return $this;
    }

    public function removeCompany(Company $company): self
    {
        if ($this->companies->removeElement($company)) {
            // set the owning side to null (unless already changed)
            if ($company->getSocialreason() === $this) {
                $company->setSocialreason(null);
            }
        }
        return $this;
    }
}
