<?php

namespace App\Entity;

use App\Repository\PointeuseRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\Table;
 
/**
 * @ORM\Entity(repositoryClass=PointeuseRepository::class)
 */
/**
 * @ORM\Entity
 * @UniqueEntity(
 *     fields={"user", "chantiers","date"},
 *     errorPath="user_id",
 *     message="L'utilisateur ne peut pas être pointé deux fois le même jour sur le même chantier."
 * )
 */
class Pointeuse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
    * @ORM\Column(type="string", length=255, nullable=true)
    * @Assert\Expression("this.getDuree() <= 36",message="Il ne faut pas dépasser 35 heure ")
    */
    private $duree;

    /**
     * @ORM\Column(type="integer")
     */
    private $week;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="pointeuses")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Chantier::class, inversedBy="pointeuses")
     * @ORM\JoinColumn(name="chantiers_id", referencedColumnName="id")
     */
    private $chantiers;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getChantiers(): ?Chantier
    {
        return $this->chantiers;
    }

    public function setChantiers(?Chantier $chantiers): self
    {
        $this->chantiers = $chantiers;

        return $this;
    }

    public function getWeek(): ?int
    {
        return $this->week;
    }

    public function setWeek(int $week): self
    {
        $this->week = $week;

        return $this;
    }
}
