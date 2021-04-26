<?php

namespace App\Entity;

use App\Repository\ChantierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChantierRepository::class)
 */
class Chantier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=Pointeuse::class, mappedBy="chantiers")
     */
    private $pointeuses;

    public function __construct()
    {
        $this->pointeuses = new ArrayCollection();
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

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

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

    /**
     * @return Collection|Pointeuse[]
     */
    public function getPointeuses(): Collection
    {
        return $this->pointeuses;
    }

    public function addPointeus(Pointeuse $pointeus): self
    {
        if (!$this->pointeuses->contains($pointeus)) {
            $this->pointeuses[] = $pointeus;
            $pointeus->setChantiers($this);
        }

        return $this;
    }

    public function removePointeus(Pointeuse $pointeus): self
    {
        if ($this->pointeuses->removeElement($pointeus)) {
            // set the owning side to null (unless already changed)
            if ($pointeus->getChantiers() === $this) {
                $pointeus->setChantiers(null);
            }
        }

        return $this;
    }

  
}
