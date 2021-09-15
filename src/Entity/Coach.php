<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CoachRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CoachRepository::class)
 */
class Coach
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity=Training::class, mappedBy="coach")
     */
    private $trainings;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="coachs", cascade={"persist"})
     */
    private $images;

    public function __construct()
    {
        $this->training = new ArrayCollection();
        $this->trainings = new ArrayCollection();
        $this->images = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @see CoachInterface
     */
    public function getRoles(): ?array
    {
        return $this->roles;
        // guarantee every user at least has ROLE_COACH
        $roles[] = 'ROLE_COACH';
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
    public function __toString()
    {
        return $this->prenom . ' ' . $this->nom;
    }

    /**
     * @return Collection|Training[]
     */
    public function getTraining(): Collection
    {
        return $this->training;
    }

    public function addTraining(Training $training): self
    {
        if (!$this->training->contains($training)) {
            $this->training[] = $training;
            $training->setCoach($this);
        }

        return $this;
    }

    public function removeTraining(Training $training): self
    {
        if ($this->training->removeElement($training)) {
            // set the owning side to null (unless already changed)
            if ($training->getCoach() === $this) {
                $training->setCoach(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Training[]
     */
    public function getTrainings(): Collection
    {
        return $this->trainings;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setCoachs($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getCoachs() === $this) {
                $image->setCoachs(null);
            }
        }

        return $this;
    }
}
