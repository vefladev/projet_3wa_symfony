<?php

namespace App\Entity;

use App\Entity\User;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TrainingRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=TrainingRepository::class)
 */
class Training
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
    private $nom;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $termine;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity=Coach::class, inversedBy="trainings")
     */
    private $coach;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="trainings", cascade={"persist"})
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->date = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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


    public function getTermine(): ?bool
    {
        return $this->termine;
    }

    public function setTermine(?bool $termine): self
    {
        $this->termine = $termine;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getCoach(): ?Coach
    {
        return $this->coach;
    }

    public function setCoach(?Coach $coach): self
    {
        $this->coach = $coach;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->users->removeElement($user);

        return $this;
    }

    public function __toString(): string
    {
        return $this->user;
    }
}
