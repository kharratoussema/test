<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lasename;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $registrationnumber;

    /**
     * @ORM\OneToMany(targetEntity=Pointeuse::class, mappedBy="user", orphanRemoval=true)
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

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLasename(): ?string
    {
        return $this->lasename;
    }

    public function setLasename(?string $lasename): self
    {
        $this->lasename = $lasename;

        return $this;
    }

    public function getRegistrationnumber(): ?string
    {
        return $this->registrationnumber;
    }

    public function setRegistrationnumber(?string $registrationnumber): self
    {
        $this->registrationnumber = $registrationnumber;

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
            $pointeus->setUser($this);
        }

        return $this;
    }

    public function removePointeus(Pointeuse $pointeus): self
    {
        if ($this->pointeuses->removeElement($pointeus)) {
            // set the owning side to null (unless already changed)
            if ($pointeus->getUser() === $this) {
                $pointeus->setUser(null);
            }
        }

        return $this;
    }

   
}
